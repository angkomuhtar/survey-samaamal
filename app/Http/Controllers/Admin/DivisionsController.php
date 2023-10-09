<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ResponseHelper;

class DivisionsController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Division::with('company')->select('divisions.*');
            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.master.division', [
            'pageTitle' => 'Users',
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(), [
            'division'     => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }
        $data = Division::create([
            'company_id' => 1,
            'division' => $request->division
        ]);

        return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Disimpan'
            ]);

    }

    public function destroy($id) 
    {
        $delete = Division::destroy($id);
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
}
