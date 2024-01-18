<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Options;
use App\Models\User;
use App\Models\Employee;
use App\Models\Profile;
use App\Models\Division;
use App\Models\Project;
use App\Models\Position;
use App\Models\WorkSchedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::guard('web')->user();
        $dept;
        if ($user->roles != 'superadmin' || $user->employee->division_id != 2 || $user->employee->division_id != 7 ) {
          $dept = Division::where('id', $user->employee->division_id)->get(); 
        }else{
          $dept = Division::all();
        }
        if ($request->ajax()) {
          $data = User::where('roles','<>', 'superadmin')
            ->with('employee','profile', 'employee.division', 'employee.position', 'employee.work_shedule')
            ->whereHas('profile', function ($query) use ($request){
              $query->where('name', 'LIKE', '%'.$request->name.'%');
            });

          if ($request->division != null || $request->departement != '') {
            $data->whereHas('employee', function ($query) use ($request){
              $query->where('division_id', $request->division);
            });
          }

          if ($user->roles != 'superadmin') {
            $data->whereHas('employee', function ($query) use ($user){
              $query->where('division_id', $user->employee->division_id);
            });
          }
          return DataTables::eloquent($data)->toJson();
        }

        return view('pages.dashboard.employee.index', [
            'pageTitle' => 'Data Karyawan',
            'departement' => $dept 
        ]);
    }

    public function create()
    {

      $education =  Options::where("type","education")->get();
      $religion =  Options::where("type","religion")->get();
      $marriage =  Options::where("type","marriage")->get();

      return view('pages.dashboard.employee.create', [
        'pageTitle' => 'Tambah Karyawan',
        'education'=> $education,
        'religion'=> $religion,
        'marriage'=> $marriage,
    ]);
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'company_id'     => 'required',
        'division_id'     => 'required',
        'position_id'  => 'required',
        'doh'  => 'required|date',
        'wh_code'  => 'required',
        'project_id'  => 'required',
        'doh'  => 'required|date',
        'status'  => 'required',
      ],[
          'required' => 'tidak boleh kosong',
          'date' => 'Harus tanggal dengan format YYYY/MM/DD'
      ]);
      if ($validator->fails()) {
          return response()->json([
              'success' => false,
              'data' => $validator->errors()
          ]);
      }
      DB::beginTransaction();
      try {
        $users = User::create([
          'username' => $request->username, 
          'email' => $request->email,
          'email_verified_at' => now(),
          'password' => bcrypt($request->password)
        ]);

        $profile = $users->profile()->create($request->only([
          'name', 
          'card_id', 
          'kk', 
          'education', 
          'tmp_lahir', 
          'tgl_lahir',
          'gender',
          'religion',
          'marriage',
          'id_addr',
          'live_addr',
          'phone'
        ]));

        $employee = $users->employee()->create([
          'company_id' => $request->company_id,
          'division_id' => $request->division_id,
          'position_id' => $request->position_id,
          'doh' => $request->doh,
          'status' => $request->status,
        ]);
        DB::commit();
      } catch (Exception $th) {
        DB::rollBack();
        return response()->json([
          'success' => false,
          'type' => 'err',
          'data' => $th
      ]);
      }

      
      return response()->json([
          'success' => true,
          'data' => 'Data Created'
      ]);
    }

    public function show(string $id)
    {
        //
    }
    
    public function edit_profile(string $id)
    {
      $education =  Options::where("type","education")->get();
      $religion =  Options::where("type","religion")->get();
      $marriage =  Options::where("type","marriage")->get();

      $profile = Profile::where("user_id", $id)->first();

      // dd($profile);
      return view('pages.dashboard.employee.profile_edit', [
        'pageTitle' => 'Tambah Karyawan',
        'education'=> $education,
        'religion'=> $religion,
        'marriage'=> $marriage,
        'profile' => $profile
      ]);
    }
    
    public function update_profile(Request $request, string $id)
    {
      $validator = Validator::make($request->all(), [
        'name'=> 'required',
        "phone"=> 'required',
        "gender"=> 'required',
        "card_id"=> 'required|min:14|numeric',
        "kk"=> 'required',
        "tmp_lahir"=> 'required',
        "tgl_lahir"=> 'required|date',
        "education"=> 'required',
        "religion"=> 'required',
        "marriage"=> 'required',
        "id_addr"=> 'required',
        "live_addr"=> 'required',

      ], [
          'required' => 'tidak boleh kosong',
          'min' => 'minimal :min karakter',
          'numeric' => 'hanya boleh angka',
          'tgl_lahir.date' => 'Harus tanggal dengan format YYYY/MM/DD'
      ]);
      if ($validator->fails()) {
          return response()->json([
              'success' => false,
              'data' => $validator->errors()
          ]);
      }

      $update = Profile::find($id)->update($request->all());

      if($update){
        return response()->json([
          'success' => true,
          'msg'
      ]);
      }
    }

    public function edit_employee(string $id)
    {

      $project = Project::all();
      $whcode = WorkSchedule::all();
      $departement = Division::all();
      $employee = Employee::where("user_id", $id)->first();
      $position = Position::where("division_id", $employee->division_id)->get();

      // dd($profile);
      return view('pages.dashboard.employee.employee_edit', [
        'pageTitle' => 'Tambah Karyawan',
        'employee' => $employee,
        'project' => $project,
        'whcode' => $whcode,
        'departement' => $departement,
        'position' => $position,
      ]);
    }
    
    public function update_employee(Request $request, string $id)
    {
      $validator = Validator::make($request->all(), [
        'company_id'     => 'required',
        'division_id'     => 'required',
        'position_id'  => 'required',
        'doh'  => 'required|date',
        'wh_code'  => 'required',
        'project_id'  => 'required',
        'doh'  => 'required|date',
        'status'  => 'required',
      ],[
          'required' => 'tidak boleh kosong',
          'date' => 'Harus tanggal dengan format YYYY/MM/DD'
      ]);
      if ($validator->fails()) {
          return response()->json([
              'success' => false,
              'data' => $validator->errors()
          ]);
      }

      $update = Employee::find($id)->update($request->all());
      if($update){
        return response()->json([
          'success' => true,
          'msg' => 'success'
      ]);
      }
    }
    
    public function destroy()
    {
      return 'tre';
    }
}
