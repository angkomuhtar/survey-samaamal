<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kecamatan;
use App\Models\UserProfile;
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
                    $query->where('name','LIKE','%'.$request->name.'%')->where('level', '<>', '9');
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
            'password'  => 'required|min:6',
            'alamat'     => 'required|string',
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
                'alamat'=> $request->alamat,
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

    public function update (Request $request, String $id)
    {
        $validator = Validator::make($request->all(), [
            // 'username'     => 'required|string|unique:users',
            'password'  => ($request->password != '') ? 'min:6' : '',
            'alamat'     => 'required|string',
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
            $users = User::find($id)->update([
              // 'username' => $request->username, 
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

            $profile = UserProfile::where('user_id',$id)->update([
                'name'=> $request->name,
                'alamat'=> $request->alamat,
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

  

    public function reset($id)
    {
        // return User::find($id);
        $user = User::find($id);

        $user->password = bcrypt('secret123');

          if ($user->save()) {
            return response()->json([
                'success' => true,
                'data' => 'Data Reset'
            ]);
          }else{
            return response()->json([
              'success' => false,
              'msg' => 'Errorki tolo'
            ]);
          }
    }

    public function status($id)
    {
        // return User::find($id);
        $user = User::find($id);

        $user->status = $user->status == 'Y' ? 'N' : 'Y';

          if ($user->save()) {
            return response()->json([
                'success' => true,
                'data' => 'Data Reset'
            ]);
          }else{
            return response()->json([
              'success' => false,
              'msg' => 'Errorki tolo'
            ]);
          }
    }

    public function delete($id)
    {
        // return User::find($id);
        $user = User::find($id);

        DB::beginTransaction();
          try {
            $users = User::destroy($id);
            $profile = UserProfile::where('user_id', $id)->delete();
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

    public function edit($id)
    {
      $data = User::with('profile')->where('id', $id)->first();
      
      return response()->json([
          'success' => true,
          'message' => 'Data get successfully',
          'data' => $data->append('lokasi')->toArray()
      ]);
    }
}
