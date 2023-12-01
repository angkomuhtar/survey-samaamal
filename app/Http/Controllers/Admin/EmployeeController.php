<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Options;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
          $data = User::where('roles','<>', 'superadmin')->with('employee','profile', 'employee.division', 'employee.position', 'employee.work_shedule');
          return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.employee.index', [
            'pageTitle' => 'Data Karyawan',
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
    
    public function edit(string $id)
    {
        //
    }
    
    public function update(Request $request, string $id)
    {
        //
    }
    
    public function destroy()
    {
      // Employee::create([
      //   'company_id' => 1,
      //   'division_id' => 1,
      //   'position_id' => 1,
      //   'doh' => '2022-06-04',
      //   'status' => 'Permanent',
      //   'shift_id' => 1,
      //   'user_id' => 1,
      // ]);
      return 'tre';
    }
}
