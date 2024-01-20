<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use App\Models\Clock;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ResponseHelper;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('web')->user();
        $dept;

        if ($user->roles == 'superadmin' || $user->employee->division_id == 2 || $user->employee->division_id == 7 ) {
          $dept = Division::where('id', '<>' , 11)->get();
        }else{
          $dept = Division::where('id', $user->employee->division_id)->get(); 
        }

        if ($request->ajax()) {
            $data = User::where('username', '!=', 'Admin')->with('employee', 'employee.division', 'profile')
                ->with('absen', function ($query) use ($request) {
                    $query->where('date', '=', $request->tanggal)
                    ->with('shift');
                })
                ->whereHas('employee', function($query) {
                    $query->where('division_id', '<>', 11);
                });

            if ($request->name != '') {
                $data->whereHas('profile', function($query) use ($request) {
                    $query->where('name', 'LIKE', '%'. $request->name.'%');
                });
            }
            if ($request->division != '') {
                $data->whereHas('employee', function($query) use ($request) {
                    $query->where('division_id', $request->division);
                });
            }


            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.absensi.attendance', [
            'departement' => $dept
        ]);
    }
    
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'company'     => 'required',
            'division'     => 'required',
            'position'     => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }
        $data = Position::create([
            'company_id' => $request->company,
            'division_id' => $request->division,
            'position' => $request->position,
        ]);

        return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Disimpan'
            ]);

    }

    public function destroy($id) 
    {
        $delete = Position::destroy($id);
        if ($delete){
            return response()->json([
                'success' => true,
                'message' => 'Data divisi berhasil disimpan'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "error saat menghapus data"
            ]);
        }
    }

    public function edit($id)
    {
        $data = Position::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company'     => 'required',
            'division'     => 'required',
            'position'     => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }
        $update = Position::find($id);
        $update->division_id = $request->division;
        $update->position = $request->position;
        if($update->save()){
            return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Update',
                'data' => $update
            ]);
        }
    }


    public function export(Request $request)
    {
        $date = explode(' to ', $request->tanggal);
        $start = $date[0];
        $end = $date[1] ?? $date[0];

        $HeaderStyle = [
            'font' => [
                'bold' => true,
                'size' => 14
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $SubStyle = [
            'font' => [
                'bold' => true,
                'size' => 14
            ]
        ];

        $data = '';
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $activeWorksheet->setCellValue('A2', 'ABSENSI HARIAN EMPAPPS');
        $activeWorksheet->getStyle('A2')->applyFromArray($HeaderStyle);
        $activeWorksheet->mergeCells('A2:J2');

        $num=3;
        $num++;

        $activeWorksheet->setCellValue('A'.$num, 'Tanggal')->getStyle('A'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('B'.$num, 'Nama')->getStyle('B'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('C'.$num, 'Project')->getStyle('C'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('D'.$num, 'Departement')->getStyle('D'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('E'.$num, 'Position')->getStyle('E'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('F'.$num, 'Jam Masuk')->getStyle('F'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('G'.$num, 'Telat Masuk')->getStyle('G'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('H'.$num, 'Jam Pulang')->getStyle('H'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('I'.$num, 'Cepat Pulang')->getStyle('I'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->setCellValue('J'.$num, 'Jenis Shift')->getStyle('J'.$num)->applyFromArray($HeaderStyle);
        $activeWorksheet->getStyle('A4:J2')->applyFromArray($HeaderStyle);
        $activeWorksheet->getRowDimension(4)->setRowHeight(40, 'pt');


        foreach(range('A','J') as $columnID) {
            $activeWorksheet->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        $activeWorksheet->getStyle('A4'.':J'.$num)->applyFromArray([
            'font' => [
                'size' => 12
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ]
        ]);

        
        $startDate = Carbon::parse($start);
        $endDate = Carbon::parse($end);
        $currentDate = $startDate;
        
        while ($currentDate->lte($endDate)) {
            $data = User::where('username', '!=', 'Admin')
                ->with('employee', 'employee.division', 'profile', 'employee.position' , 'employee.project' )
                ->with('absen', function ($query) use ($currentDate) {
                    $query->where('date', $currentDate->toDateString());
                });
    
            $data->whereHas('employee', function ($query) use ($request){
                $query->whereIn('division_id', $request->dept)->with('shift');
              });
            $absen = $data->orderby('username')->get();
            foreach ($absen as $key => $value) {
               $num++;
                $activeWorksheet->setCellValue('A'.$num, $value->absen[0]->date ?? $currentDate->toDateString());
                $activeWorksheet->setCellValue('B'.$num, $value->profile->name);
                $activeWorksheet->setCellValue('C'.$num, $value->employee->project->name);
                $activeWorksheet->setCellValue('D'.$num, $value->employee->division->division);
                $activeWorksheet->setCellValue('E'.$num, $value->employee->position->position);
                $activeWorksheet->setCellValue('F'.$num, $value->absen[0]->clock_in ?? '');
                if (count($value->absen) > 0) {
                    $startTime = Carbon::parse($value->absen[0]->shift->start);
                    $finishTime = Carbon::parse($value->absen[0]->clock_in);
                    if($startTime->lte($finishTime)){
                        $totalDuration = $finishTime->diffInSeconds($startTime);
                        $activeWorksheet->setCellValue('G'.$num, gmdate('H:i',$totalDuration));
                    }else{
                        $activeWorksheet->setCellValue('G'.$num, '');
                    }
                }
                $activeWorksheet->setCellValue('H'.$num, $value->absen[0]->clock_out ?? '');
                if (count($value->absen) > 0 && $value->absen[0]->clock_out) {
                    $startTime = Carbon::parse($value->absen[0]->clock_out);
                    $finishTime = Carbon::parse($value->absen[0]->shift->end);
                    if($startTime->lte($finishTime)){
                        $totalDuration = $finishTime->diffInSeconds($startTime);
                        $activeWorksheet->setCellValue('I'.$num, gmdate('H:i',$totalDuration));
                    }else{
                        $activeWorksheet->setCellValue('I'.$num, '');
                    }
                }
                $activeWorksheet->setCellValue('J'.$num, count($value->absen) > 0 ? $value->absen[0]->shift->name ." (".$value->absen[0]->shift->start ." - ".$value->absen[0]->shift->end.")" : '');
                $activeWorksheet->getRowDimension($num)->setRowHeight(30, 'pt');
                $activeWorksheet->getStyle('B5'.':J'.$num)->applyFromArray([
                    'font' => [
                        'size' => 12
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                    // 'borders' => [
                    //     'allBorders' => [
                    //         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    //         'color' => ['argb' => 'FF000000'],
                    //     ],
                    // ]
                ]);
                // $num++;
            };
            $currentDate->addDay();
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Rekap Absensi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    } 
}
