<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $data =  User::all();
        $kec =  Kecamatan::all();

        if ($request->ajax()) {
            $data = User::with('profile')
            ->whereHas('profile', function($query) use($request) {
                    $query->where('name','LIKE','%'.$request->name.'%');
            });
            if ($request->level) {
                $data->whereHas('profile', function ($query) use ($request){
                    $query->where('level', $request->level);
                  });
            }
            $data = $data->get()->map(function ($data) {
                $data['lokasi'] = $data->lokasi;
                $data['type'] = $data->leveltype;
                return $data;
            });
            return DataTables::of($data)->make(true);
        }

        return view('pages.dashboard.master.users', [
            'pageTitle' => 'Users',
            'kec' => $kec,
        ]);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'     => 'required|string|unique:users',
            'email'     => 'required|email:rfc|string|unique:users',
            'password'  => 'required|min:6',
            'name'     => 'required',
            'level'  => 'required|numeric',
            'kecamatan'  => 'required_if:level,<=,2',
            'desa'  => 'required_if:level,<=,1',
            ],[
                'required' => 'tidak boleh kosong',
                'min' => 'minimal :min karakter',
            ]
        );
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

            $lokasi = '';
            switch ($request->level) {
                case '1':
                   $lokasi = $request->desa;
                    break;
                case '2':
                    $lokasi = $request->kecamatan;
                        break;                
                default:
                   $lokasi = '1';
                    break;
            };

            $profile = $users->profile()->create([
                'name'=> $request->name,
                'level'=> $request->level,
                'lokasi'=> $lokasi
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
                'message' => 'Data Berhasil Disimpan'
            ]);
    }
}
