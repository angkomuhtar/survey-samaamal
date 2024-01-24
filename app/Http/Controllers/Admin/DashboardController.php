<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Clock;
use App\Models\ViewClock;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;


class DashboardController extends Controller
{

    public function index ()
    {
        $today = Carbon::now()->format('Y-m-d');
        $employee= Employee::select('division_id', DB::raw('count(*) as post_count'))->with('division')
        ->where('division_id','<=', 200)
        ->groupBy('division_id')
        ->get();

        $hadir=  DB::table('v_clock')
        ->select('shift','value','division', DB::raw('count(*) as total'))
        ->where('date', $today)
        ->groupBy('shift', 'value', 'division')
        ->orderBy('division')
        ->get();

        $data = $hadir->map(function($item){
            if ($item->shift == 'Day Shift') {
                $item->type = 'day';
            }else if($item->shift == 'Night Shift'){
                $item->type = 'night';
            }else{
                $item->type = 'office';
            }
            return $item;
        });
        $groupped= $data->groupBy('type');

        return view('pages.dashboard.index', [
            'pageTitle' => 'Analytic Dashboard',
            'division_count' => $employee,
            'day_count' => $groupped['day'],
            'night_count' => $groupped['night'],
            'office_count' => $groupped['office'],
        ]);
    }
}
