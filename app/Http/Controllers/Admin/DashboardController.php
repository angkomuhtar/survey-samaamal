<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardController extends Controller
{

    public function index ()
    {
        $data= Employee::select('division_id', DB::raw('count(*) as post_count'))->with('division')
        ->where('division_id','<=', 200)
        ->groupBy('division_id')
        ->get();

        // return Carbon::createFromFormat('Y-m-d', '2024-01-07')->format('N');
        return view('pages.dashboard.index', [
            'pageTitle' => 'Analytic Dashboard',
            'division_count' => $data,
        ]);
    }
}
