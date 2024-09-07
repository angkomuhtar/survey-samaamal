<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Paslon;
use App\Models\Pemilih;
use App\Models\Profile;
use App\Models\Employee;
use App\Models\ViewClock;
use App\Models\SurveyCount;
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

        $dataCount = SurveyCount::where('usia','>', '10');
        if ($user->profile->level == 1) {
            $dataCount->where('desa', $user->profile->lokasi);
        }elseif ($user->profile->level == 2) {
            $dataCount->where('kec', $user->profile->lokasi);
        }elseif ($user->profile->level <= 6) {
            $dataCount->where('kab', $user->profile->lokasi);
        }
        
        $gengroupbypaslon = $dataCount->orderBy('no_urut')->get()->groupBy('nama_paslon')->all();


        $paslonData = array();
        $genz = array();
        $milenial = array();
        $genx = array();
        $boomer = array();
        $abu = array();
        $fix = array();
        foreach ($gengroupbypaslon as $key => $value) {
            array_push($paslonData, $key);
            if (count($value) > 0) {
                $data = $value->groupBy('kategori_usia')->all();
                array_push($genz, isset($data['Generasi Z']) ? $data['Generasi Z']->count() : 0);
                array_push($milenial, isset($data['Millenial']) ? $data['Millenial']->count() : 0);
                array_push($genx, isset($data['Generasi X']) ? $data['Generasi X']->count() : 0);
                array_push($boomer, isset($data['Boomer']) ? $data['Boomer']->count() : 0);
                $datafix = $value->groupBy('pilihan')->all();
                if ($key == 'NETRAL') {
                    array_push($abu, 0);
                    array_push($fix, count($value));
                }else{
                    array_push($abu, isset($datafix['5']) ? $datafix['5']->count() : 0);
                    array_push($fix, isset($datafix['1']) ? $datafix['1']->count() : 0);
                }
            }else{
                array_push($genz, 0);
                array_push($milenial, 0);
                array_push($genx, 0);
                array_push($boomer, 0);
                array_push($abu, 0);
                array_push($fix, 0);
            }
        }

        $chartData = [
            'countDpt' =>[
                'total' => $totalCount,
                'verified'=> $totalVerified,
                'survey'=> $totalSurvey,
            ],
            'byGeneration' => [
                'paslon' => $paslonData,
                'genZ' => [
                    'title' => 'Gen Z',
                    'data' => $genz,
                ],
                'millenial' => [
                    'title' => 'Millenial',
                    'data' => $milenial,
                ],
                'genX' => [
                    'title' => 'Gen X',
                    'data' => $genx,
                ],
                'boomer' => [
                    'title' => 'Boomer',
                    'data' => $boomer,
                ],
            ],
            'byPasti' => [
                'fix' => $fix,
                'abu' => $abu
            ]
        ];
        return view('pages.dashboard.index', [
                'pageTitle' => 'Analytic Dashboard',
                'data' => collect($chartData),
            ]);
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
