<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paslon;
use App\Models\Survey;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class VerifyController extends Controller
{
    public function index(Request $request) {
        $user = Auth::guard('web')->user();
        if ($request->ajax()) {
            $data = Pemilih::with('kelurahan', 'kecamatan', 'survey', 'survey.paslon')->where('nama','LIKE','%'.$request->name.'%');
            $data->has('survey');
            if ($user->profile->level == 1) {
                $data->where('desa', $user->profile->lokasi);
            }
            if ($user->profile->level == 2) {
                $data->where('kec', $user->profile->lokasi);
            }
            if ($request->tps) {
                $data->where('tps', $request->tps);
            }
            return DataTables::eloquent($data)->toJson();
        }
        $paslon = Paslon::all();
        $tps = Pemilih::select('tps')->groupBy('tps')->get();

        return view('pages.dashboard.survey.verify', [
            'pageTitle' => 'Daftar Pemilih Tetap',
            'paslon'=> $paslon,
            'tps'=> $tps,
        ]);
    }

    public function verify(String $id){
        $data= Survey::find($id)->update([
            'kec_verify' => 'Y'
        ]);

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }
    }
}

