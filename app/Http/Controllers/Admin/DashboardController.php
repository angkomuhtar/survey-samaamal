<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Clock;
use App\Models\Profile;
use App\Models\Employee;
use App\Models\ViewClock;
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
        $today = Carbon::now()->format('Y-m-d');
        $employee= Employee::select('division_id', DB::raw('count(*) as post_count'))->with('division')
        ->whereNotIn('division_id', [11, 11001])
        ->whereHas('user', function($query){
            $query->where('status','Y');
        })
        ->groupBy('division_id')
        ->get();

        $hadir=  DB::table('v_clock')
        ->select('shift','value', 'site','division', DB::raw('count(*) as total'))
        ->where('date', $today)
        ->groupBy('shift', 'value', 'site', 'division')
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
            'day_count' => $groupped['day'] ?? [],
            'night_count' => $groupped['night'] ?? [],
            'office_count' => $groupped['office'] ?? [],
        ]);
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

    public function import_data(){
        // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
        $file = public_path('images/BBEDATA.xlsx');
        $import = new UsersImport;
        Excel::import($import, $file);
        $data_double = [];
        $data_null = [];

        foreach ($import->data as $item) {
            $data = Profile::where('name', '=',$item['nama'])->with('user')
                ->whereHas('user', function($query){
                    $query->where('status','Y');
                })->get();
            if (count($data) > 1) {
               array_push($data_double,[count($data), $item['nama']]);
            }else if (count($data) == 0) {
                array_push($data_null,[count($data), $item['nama']]);
            }else if (count($data) == 1) {
                // return $data[0]->user_id;
                $employee = Employee::where('user_id', $data[0]->user_id)->update([
                    'nip' => $item['nik'],
                    'doh' => gmdate( 'Y-m-d', (($item['doh'] - 25569) * 86400))
                ]);
                $profile = Profile::find($data[0]->id)->update([
                    'card_id' => $item['card_id'],
                    'kk' => $item['kk'],
                    'tmp_lahir' => $item['tmp'],
                    'tgl_lahir' => gmdate( 'Y-m-d', (($item['tgl'] - 25569) * 86400)) ,
                    'gender' => $item['gender'],
                    'religion' => $item['religion'],
                    'marriage' => $item['marriage'],
                    'id_addr' => $item['id_addr'],
                    'live_addr' => $item['live_addr'],
                    'phone' => $item['phone']
                ]);
            }
        }

        return [$data_double, $data_null];

    }
}
