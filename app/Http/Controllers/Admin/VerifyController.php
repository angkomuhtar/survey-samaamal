<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paslon;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    public function index(Request $request) {
        $user = Auth::guard('web')->user();
        if ($request->ajax()) {
            $data = Pemilih::with('kelurahan', 'kecamatan', 'survey', 'survey.paslon')->where('nama','LIKE','%'.$request->name.'%');
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

        return view('pages.dashboard.survey.index', [
            'pageTitle' => 'Daftar Pemilih Tetap',
            'paslon'=> $paslon,
            'tps'=> $tps,
        ]);
    }
}
