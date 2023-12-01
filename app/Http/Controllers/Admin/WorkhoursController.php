<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkSchedule;
use App\Models\Shift;
use App\Models\Division;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ResponseHelper;

class WorkhoursController extends Controller
{
    public function index(Request $request)
    {
        $shift = Shift::All();
        if ($request->ajax()) {
            $data = WorkSchedule::query();
            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.absensi.workhours', [
            'pageTitle' => 'Users',
            'shift'=>$shift
        ]);
    }

    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(), [
            'code'     => 'required|unique:work_schedule',
            'name'     => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
                'stsCode' => 422
            ]);
        }
        $data = WorkSchedule::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return response()->json([
                'success' => true,
                'message' => 'Data berhasil di tambahkan'
            ]);

    }

    public function destroy($id) 
    {
        $delete = WorkSchedule::destroy($id);
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
        $data = Division::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $update = Division::find($id);
        $update->division = $request->division;
        if($update->save()){
            return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Update',
                'data' => $update
            ]);
        }
    }

    public function index_shift(Request $request)
    {
        $wh = WorkSchedule::All();
        if ($request->ajax()) {
            $data = Shift::with('schedule');
            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.absensi.shift', [
            'pageTitle' => 'Users',
            'shift'=>$wh
        ]);
    }
}
