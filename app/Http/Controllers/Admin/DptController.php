<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemilih;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DptController extends Controller
{
    //
    public function index(Request $request)
    {

        // return $data->kelurahan;
        if ($request->ajax()) {
            $data = Pemilih::with('kelurahan', 'kecamatan')->where('nama','LIKE','%'.$request->name.'%');
            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.master.dpt', [
            'pageTitle' => 'Daftar Pemilih Tetap',
        ]);
    } 
}
