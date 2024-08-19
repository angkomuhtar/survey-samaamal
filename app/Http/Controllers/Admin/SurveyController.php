<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paslon;
use App\Models\Survey;
use App\Models\Pemilih;
use App\Models\Kecamatan;
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
            if ($request->kec) {
                $data->where('kec', $request->kec);
            }
            if ($request->desa) {
                $data->where('desa', $request->desa);
            }
            if ($request->filter) {
                if (in_array('V', $request->filter)) {
                    $data->whereHas('survey', function ($query){
                        $query->where('kec_verify', 'Y');
                      });
                }
                if (in_array('BV', $request->filter)) {
                    $data->whereHas('survey', function ($query){
                        $query->where('kec_verify', 'N');
                      });
                }
                if (in_array('BS', $request->filter)) {
                    $data->doesntHave('survey');
                }
                if (in_array('S', $request->filter)) {
                    $data->has('survey');
                }
            }
            return DataTables::eloquent($data)->toJson();
        }
        $paslon = Paslon::all();
        $tps = Pemilih::select('tps')->groupBy('tps')->get();
        $kecamatan = Kecamatan::where('id_kab', 1);
        if ($user->profile->level <= 2) {
            $kecamatan->where('id', $user->profile->lokasi);
        }
        return view('pages.dashboard.survey.index', [
            'pageTitle' => 'Daftar Pemilih Tetap',
            'paslon'=> $paslon,
            'tps'=> $tps,
            'kecamatan'=> $kecamatan->get(),
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
        $paslon = $request->paslon ? $request->paslon : '999';

        $data = Survey::create([
            'event_id' => 1,
            'dpt_id' => $request->dpt_id,
            'pilihan' => $request->pilihan,
            'paslon_id' => $paslon,
            'ket' => $request->ket,
            'relawan' => $request->relawan == 'on' ? 'Y' : 'N',
            'kec_verify' => 'N',
            'kordinator' => $request->kord
            ]);
        return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Disimpan'
            ]);

    }

    public function delete(String $id){
        $data = Survey::destroy($id);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Data Resetted'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ]);
        }
    }


    public function edit(String $id){
        $data = Survey::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Data get successfully',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $paslon = $request->paslon ? $request->paslon : '999';
        $update = Survey::find($id)->update([
            'event_id' => 1,
            'pilihan' => $request->pilihan,
            'paslon_id' => $paslon,
            'ket' => $request->ket,
            'relawan' => $request->relawan == 'on' ? 'Y' : 'N',
            'kec_verify' => 'N',
            'kordinator' => $request->kord
        ]);
        if($update){
            return response()->json([
                'success' => true,
                'message' => 'Survey di Update',
                'data' => $update
            ]);
        }
    }
}
