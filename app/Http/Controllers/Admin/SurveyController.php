<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paslon;
use App\Models\Survey;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    //
    public function index(Request $request) {
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


    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'pilihan'     => 'required',
          ],[
              'required' => 'tidak boleh kosong',
          ]);

        if ($validator->fails()) {
              return response()->json([
                  'success' => false,
                  'data' => $validator->errors()
              ]);
        }
        $paslon = $request->paslon ? $request->paslon : '1';

        $data = Survey::create([
            'event_id' => 1,
            'dpt_id' => $request->id,
            'pilihan' => $request->pilihan,
            'paslon_id' => $paslon,
            'ket' => $request->ket,
            'kec_verify' => 'N',
            'kordinator' => $request->kord
            ]);
        return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Disimpan'
            ]);

    }
}
