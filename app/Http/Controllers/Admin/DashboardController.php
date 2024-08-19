<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Paslon;
use App\Models\Pemilih;
use App\Models\Profile;
use App\Models\Employee;
use App\Models\ViewClock;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{

    public function index ()
    {
        $user = Auth::guard('web')->user();
        $data = Pemilih::with('kelurahan', 'kecamatan', 'survey', 'survey.paslon');
            if ($user->profile->level == 1) {
                $data->where('desa', $user->profile->lokasi);
            }elseif ($user->profile->level == 2) {
                $data->where('kec', $user->profile->lokasi);
            }elseif ($user->profile->level <= 6) {
                $data->where('kab', $user->profile->lokasi);
            }
        $totalCount = $data->count();
        $totalSurvey = $data->has('survey')->count();
        $totalVerified = $data->whereHas('survey', function ($query){
            $query->where('kec_verify', 'Y');
          })->count();
        $paslon = Paslon::all();
        $paslonArray = array();
        foreach ($paslon as $key) {
            array_push($paslonArray, $key->nama);
        }

        $now = Carbon::now()->format('Y');
        $genz = $now - 2012;
        $millenial = $now - 1996;
        $genx = $now - 1980;
        $boomer = $now - 1964;

        $byGen = DB::table('view_survey')
        ->select('nama_paslon', 'pilihan', DB::raw('count(*) as total'));
        if ($user->profile->level == 1) {
            $byGen->where('desa', $user->profile->lokasi);
        }elseif ($user->profile->level == 2) {
            $byGen->where('kec', $user->profile->lokasi);
        }elseif ($user->profile->level <= 6) {
            $byGen->where('kab', $user->profile->lokasi);
        }

        $totalboomer = $byGen->groupBy('nama_paslon', 'pilihan')->get();
        // return $totalboomer;
        
        $chartData = [
            'countDpt' =>[
                'total' => $totalCount,
                'verified'=> $totalVerified,
                'survey'=> $totalSurvey,
            ],
            'byGeneration' => [
                'paslon' => $paslonArray,
                'genZ' => [
                    'title' => 'Gen Z',
                    'data' => [116, 85, 101, 98],
                ],
                'millenial' => [
                    'title' => 'Millenial',
                    'data' => [35, 41, 36, 26],
                ],
                'genX' => [
                    'title' => 'Gen X',
                    'data' => [44, 55, 57, 56],
                ],
                'boomer' => [
                    'title' => 'Boomer',
                    'data' => [44, 55, 57, 56],
                ],
            ],
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

    public function profile(){
        $user = Auth::guard('web')->user();
        $data = Pemilih::with('kelurahan', 'kecamatan', 'survey', 'survey.paslon');
            if ($user->profile->level == 1) {
                $data->where('desa', $user->profile->lokasi);
            }elseif ($user->profile->level == 2) {
                $data->where('kec', $user->profile->lokasi);
            }elseif ($user->profile->level <= 6) {
                $data->where('kab', $user->profile->lokasi);
            }
        $totalCount = $data->count();
        $totalSurvey = $data->has('survey')->count();
        $totalVerified = $data->whereHas('survey', function ($query){
            $query->where('kec_verify', 'Y');
          })->count();
        $chartData = [
            'countDpt' =>[
                'total' => $totalCount,
                'verified'=> $totalVerified,
                'survey'=> $totalSurvey,
            ]
        ];
        return view('pages.dashboard.profile', [
            'pageTitle' => 'Analytic Dashboard',
            'data' => collect($chartData),
        ]);
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
