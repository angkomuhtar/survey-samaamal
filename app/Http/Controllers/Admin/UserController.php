<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $data =  User::all();

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
            'tableData' => $data,
        ]);
    }
}
