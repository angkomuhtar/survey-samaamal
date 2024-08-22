<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemilih;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DptController extends Controller
{
    //
    public function index(Request $request)
    {

        $user = Auth::guard('web')->user();
        if ($request->ajax()) {
            $data = Pemilih::with('kelurahan', 'kecamatan', 'survey', 'survey.paslon')->where('nama','LIKE','%'.$request->name.'%');
            
            if ($user->profile->level == 1) {
                $data->where('desa', $user->profile->lokasi);
            }elseif ($user->profile->level == 2) {
                $data->where('kec', $user->profile->lokasi);
            }elseif ($user->profile->level <= 6) {
                $data->where('kab', $user->profile->lokasi);
            }

            if ($request->tps) {
                $data->where('tps', $request->tps);
            }
            if ($request->kec) {
                $data->where('kec', $request->kec);
            }
            if ($request->desa) {
                $data->where('desa', $request->desa);
            }
            return DataTables::eloquent($data)->toJson();
        }
        $tps = Pemilih::select('tps')->groupBy('tps')->get();
        $kecamatan = Kecamatan::where('id_kab', 1);
        if ($user->profile->level <= 2) {
            $kecamatan->where('id', $user->profile->lokasi);
        }
        return view('pages.dashboard.master.dpt', [
            'pageTitle' => 'Daftar Pemilih Tetap',
            'tps'=> $tps,
            'kecamatan'=> $kecamatan->get(),
        ]);
    } 


    public function relawan(Request $request)
    {

        $user = Auth::guard('web')->user();
        if ($request->ajax()) {
            $data = Pemilih::with('kelurahan', 'kecamatan', 'survey', 'survey.paslon')->where('nama','LIKE','%'.$request->name.'%');
            $data->whereHas('survey', function ($query){
                $query->where('relawan', 'Y');
              });
            
            if ($user->profile->level == 1) {
                $data->where('desa', $user->profile->lokasi);
            }elseif ($user->profile->level == 2) {
                $data->where('kec', $user->profile->lokasi);
            }elseif ($user->profile->level <= 6) {
                $data->where('kab', $user->profile->lokasi);
            }

            if ($request->tps) {
                $data->where('tps', $request->tps);
            }
            if ($request->kec) {
                $data->where('kec', $request->kec);
            }
            if ($request->desa) {
                $data->where('desa', $request->desa);
            }
            return DataTables::eloquent($data)->toJson();
        }
        $tps = Pemilih::select('tps')->groupBy('tps')->get();
        $kecamatan = Kecamatan::where('id_kab', 1);
        if ($user->profile->level <= 2) {
            $kecamatan->where('id', $user->profile->lokasi);
        }
        return view('pages.dashboard.master.relawan', [
            'pageTitle' => 'Daftar Pemilih Tetap',
            'tps'=> $tps,
            'kecamatan'=> $kecamatan->get(),
        ]);
    } 
}
