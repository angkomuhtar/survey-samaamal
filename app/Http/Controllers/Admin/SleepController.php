<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SleepController extends Controller
{
    public function index(Request $request)
    {

      $user = Auth::guard('web')->user();
      $dept = Division::all();
      $start =Carbon::now()->setTimeZone('Asia/Makassar')->subDays(1)->format('Y-m-d 19:00:00'); 
      $end =Carbon::now()->setTimeZone('Asia/Makassar')->format('Y-m-d 19:00:00'); 

      // return $start;
      
      // return $data;
      if ($request->ajax()) {
        $data = User::where('roles','<>', 'superadmin')
          ->with('employee','profile', 'employee.division', 'employee.position', 'employee.category', 'employee.work_schedule', 'sleep')
          ->whereHas('profile', function ($query) use ($request){
            $query->where('name', 'LIKE', '%'.$request->name.'%');
          })
          ->whereHas('employee', function ($query) use ($request){
            $query->where('category_id',  'HAU')->where('contract_status', 'ACTIVE');
          })
          ->get();
        $data->map(function($det) use ($start, $end){
          $count = 0;
          $filter = $det->sleep->filter(function($item) use ($start, $end, $count){
            if (Carbon::parse($item->start)->gte($start) && Carbon::parse($item->end)->lte($end)) {
              $sec =Carbon::parse($item->end)->diffInSeconds(Carbon::parse($item->start));
              $item['duration'] =$sec / 60;
              return $item;
            }
          });
          $det['f_sleep'] = $filter;
        });

        $dt = DataTables::of($data);
        return $dt->make(true);
      }

      return view('pages.dashboard.sleep.index', [
        'pageTitle' => 'Data Tidur karyawan',
        'dept' => $dept,
      ]);
    }
}
