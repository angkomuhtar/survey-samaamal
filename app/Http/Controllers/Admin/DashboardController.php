<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Employee;
use App\Models\ViewClock;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{

    public function index ()
    {
        $chartData = [
            'yearlyRevenue' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'revenue' => [350, 500, 950, 700, 900],
                'total' => 3500,
                'currencySymbol' => '$',
            ],
            'productSold' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'quantity' => [800, 600, 1000, 800, 900],
                'total' => 4000,
            ],
            'growth' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'perYearRate' => [10, 20, 30, 40, 100],
                'total' => 10,
                'preSymbol' => '+',
                'postSymbol' => '%',
            ],
            'revenueReport' => [
                'month' => ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
                'revenue' => [
                    'title' => 'Revenue',
                    'data' => [76, 85, 101, 98, 87, 105, 91, 114, 94],
                ],
                'netProfit' => [
                    'title' => 'Net Profit',
                    'data' => [35, 41, 36, 26, 45, 48, 52, 53, 41],
                ],
                'cashFlow' => [
                    'title' => 'Cash Flow',
                    'data' => [44, 55, 57, 56, 61, 58, 63, 60, 66],
                ],
            ],
            'productGrowthOverview' => [
                'productNames' => ["Books", "Pens", "Pencils", "Box"],
                'data' => [88, 77, 66, 55],
            ],
            'thisYearGrowth' => [
                'label' => ['Yearly Growth'],
                'data' => [66],
            ],
            'investmentAmount' => [
                [
                    'title' => 'Investment',
                    'amount' => 1000,
                    'currencySymbol' => '$',
                    'profit' => 10,
                    'profitPercentage' => 50,
                    'loss' => 0,
                    'lossPercentage' => 0,
                ],
                [
                    'title' => 'Investment',
                    'amount' => 1000,
                    'currencySymbol' => '$',
                    'profit' => 10,
                    'profitPercentage' => 50,
                    'loss' => 0,
                    'lossPercentage' => 0,
                ],
                [
                    'title' => 'Investment',
                    'amount' => 1000,
                    'currencySymbol' => '$',
                    'profit' => 0,
                    'profitPercentage' => 0,
                    'loss' => 20,
                    'lossPercentage' => 30,
                ]
            ],
            'users' => User::latest()->paginate(5),
        ];
        return view('pages.dashboard.index', [
                'pageTitle' => 'Analytic Dashboard',
                'data' => collect($chartData),
            ]);
        // $users =  User::get();
        // dd(DB::getQueryLog());
        // $today = Carbon::now()->format('Y-m-d');
        // $employee= Employee::select('division_id', DB::raw('count(*) as post_count'))->with('division')
        // ->whereNotIn('division_id', [11, 11001])
        // ->whereHas('user', function($query){
        //     $query->where('status','Y');
        // })
        // ->groupBy('division_id')
        // ->get();

        // $hadir=  DB::table('v_clock')
        // ->select('shift','value', 'site','division', DB::raw('count(*) as total'))
        // ->where('date', $today)
        // ->groupBy('shift', 'value', 'site', 'division')
        // ->orderBy('division')
        // ->get();

        // $data = $hadir->map(function($item){
        //     if ($item->shift == 'Day Shift') {
        //         $item->type = 'day';
        //     }else if($item->shift == 'Night Shift'){
        //         $item->type = 'night';
        //     }else{
        //         $item->type = 'office';
        //     }
        //     return $item;
        // });
        // $groupped= $data->groupBy('type');

        // return view('pages.dashboard.index', [
        //     'pageTitle' => 'Analytic Dashboard',
        //     'division_count' => $employee,
        //     'day_count' => $groupped['day'] ?? [],
        //     'night_count' => $groupped['night'] ?? [],
        //     'office_count' => $groupped['office'] ?? [],
        // ]);
    }

    public function rekap_hadir(Request $request){
        $hadir=  DB::table('v_clock')
        ->select('shift','value', 'site','division', DB::raw('count(*) as total'))
        ->where('date', $request->tanggal)
        ->where('site', $request->project)
        ->where('shift','LIKE', '%'.$request->shift.'%')
        ->groupBy('shift', 'value', 'site', 'division')
        ->orderBy('division')->get();
        return DataTables::of($hadir)->toJson();
    }

    public function import_data(Request $request){
        // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
        $file = public_path('images/BBEDATA.xlsx');
        $import = new UsersImport;
        Excel::import($import, $file);
        $data_double = [];
        $data_null = [];

        // return $request->id;
        $offset = $request->offset;
        $start = ($request->page - 1) * $offset;
        $item = $import->data;
        for ($i=$start; $i < $start+$offset; $i++) { 
         
            // echo $i." ";
            if ($i + 1 >= count($item)) {
                break;
            }
            $data = Profile::where('name', '=',$item[$i]['nama'])->with('user')
                ->whereHas('user', function($query){
                    $query->where('status','Y');
                })->get();
            if (count($data) > 1) {
               array_push($data_double,[count($data), $item[$i]['nama']]);
            }else if (count($data) == 0) {
                array_push($data_null,[count($data), $item[$i]['nama']]);
            }else if (count($data) == 1) {
                // return $data[0]->user_id;
                $employee = Employee::where('user_id', $data[0]->user_id)->update([
                    'nip' => $item[$i]['nik'],
                    'doh' => gmdate( 'Y-m-d', (($item[$i]['doh'] - 25569) * 86400))
                ]);
                $profile = Profile::find($data[0]->id)->update([
                    'card_id' => $item[$i]['card_id'],
                    'kk' => $item[$i]['kk'],
                    'tmp_lahir' => $item[$i]['tmp'],
                    'tgl_lahir' => gmdate( 'Y-m-d', (($item[$i]['tgl'] - 25569) * 86400)) ,
                    'gender' => $item[$i]['gender'],
                    'religion' => $item[$i]['religion'],
                    'marriage' => $item[$i]['marriage'],
                    'id_addr' => $item[$i]['id_addr'],
                    'live_addr' => $item[$i]['live_addr'],
                    'phone' => $item[$i]['phone']
                ]);
            }
        }

        return [$data_double, $data_null];

    }
}
