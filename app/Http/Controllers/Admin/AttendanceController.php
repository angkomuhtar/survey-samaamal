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
          $dept = Division::all();
        }else{
          $dept = Division::where('id', $user->employee->division_id)->get(); 
        }

        if ($request->ajax()) {
            $data = User::where('username', '!=', 'Admin')->with('employee', 'employee.division', 'profile')->with('absen', function ($query) use ($request) {
                $query->where('date', '=', $request->tanggal)
                ->with('shift');
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
        $division = Division::all();
        return view('pages.dashboard.absensi.attendance', [
            'division' => $division,
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

        // if ($request->type == 'date') {
        //     $validator = Validator::make($request->all(), [
        //         'start' => 'required',
        //         'end' => 'required',
        //     ], [
        //         'required' => 'tidak boleh kosong',
        //     ]);
    
        //     if ($validator->fails()) {
        //         return back()
        //         ->withErrors($validator)
        //         ->withInput();
        //     }
        // }
        $data = '';

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        //header
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

        
        $data = User::where('username', '!=', 'Admin')
            ->with('employee', 'employee.division', 'profile', 'employee.position' , 'employee.project' )
            ->with('absen', function ($query) use ($request) {
                $query->where('date', '2024-01-17');
            });

        $data->whereHas('employee', function ($query) use ($request){
            $query->whereIn('division_id', [5, 3, 4])->with('shift');
          });
        
        $absen = $data->orderby('username')->get();
        foreach ($absen as $key => $value) {
           $num++;
            $activeWorksheet->setCellValue('A'.$num, $value->absen[0]->date ?? '2024-01-18');
            $activeWorksheet->setCellValue('B'.$num, $value->profile->name);
            $activeWorksheet->setCellValue('C'.$num, $value->employee->project->name);
            $activeWorksheet->setCellValue('D'.$num, $value->employee->division->division);
            $activeWorksheet->setCellValue('E'.$num, $value->employee->position->position);
            $activeWorksheet->setCellValue('F'.$num, $value->absen[0]->clock_in ?? '');
            $activeWorksheet->setCellValue('G'.$num, $value->absen[0]->shift->start ?? '');
            $activeWorksheet->setCellValue('H'.$num, $value->absen[0]->clock_out ?? '');
            $activeWorksheet->setCellValue('I'.$num, $value->absen[0]->shift->end ?? '');
            $activeWorksheet->setCellValue('J'.$num, $value->absen[0]->shift->name ?? '');
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

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Rekap Absensi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    } 
}
