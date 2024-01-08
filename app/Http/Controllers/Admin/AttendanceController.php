<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use App\Models\Clock;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ResponseHelper;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::with('employee')->with('absen', function ($query) {
        //     $query->where('date', '=', '2023-12-01');
        // })->get();
        // dd($users);
        if ($request->ajax()) {
            $data = User::where('username', '!=', 'Admin')->with('employee', 'employee.division', 'profile')->with('absen', function ($query) use ($request) {
                $query->where('date', '=', $request->tanggal)
                ->with('shift');
            });
            return DataTables::eloquent($data)->toJson();
        }
        $division = Division::all();
        return view('pages.dashboard.absensi.attendance', [
            'division' => $division,
        ]);
    }
    
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'company'     => 'required',
            'division'     => 'required',
            'position'     => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }
        $data = Position::create([
            'company_id' => $request->company,
            'division_id' => $request->division,
            'position' => $request->position,
        ]);

        return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Disimpan'
            ]);

    }

    public function destroy($id) 
    {
        $delete = Position::destroy($id);
        if ($delete){
            return response()->json([
                'success' => true,
                'message' => 'Data divisi berhasil disimpan'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "error saat menghapus data"
            ]);
        }
    }

    public function edit($id)
    {
        $data = Position::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company'     => 'required',
            'division'     => 'required',
            'position'     => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }
        $update = Position::find($id);
        $update->division_id = $request->division;
        $update->position = $request->position;
        if($update->save()){
            return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Update',
                'data' => $update
            ]);
        }
    }
}
