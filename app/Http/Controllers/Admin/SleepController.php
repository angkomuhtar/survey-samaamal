<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Clock;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Contracts\Database\Query\Builder;

class SleepController extends Controller
{
    public function index(Request $request)
    {

      $user = Auth::guard('web')->user();
      $dept = Division::all();
      $today = Carbon::now()->setTimeZone('Asia/Makassar')->format('Y-m-d');
      $start =Carbon::now()->setTimeZone('Asia/Makassar')->subDays(1)->format('Y-m-d 19:00:00'); 
      $end =Carbon::now()->setTimeZone('Asia/Makassar')->format('Y-m-d 19:00:00'); 

      if ($request->ajax()) {
        $data = User::where('roles','<>', 'superadmin')
          ->with('employee','absen', 'absen.shift', 'profile', 'employee.division', 'employee.position', 'employee.category', 'employee.work_schedule', 'sleep')
          ->whereHas('profile', function ($query) use ($request){
            $query->where('name', 'LIKE', '%'.$request->name.'%');
          })
          ->whereHas('employee', function ($query) use ($request){
            $query->where('category_id',  'HAU')->where('contract_status', 'ACTIVE');
          })
          ->with(['absen' => function ($query) use ($today) {
            $query->where('date', $today);
          }])
          ->with(['sleep'=> function ($query) use ($today){
            $query->where('date', $today);
          }]);
          if ($request->division != null || $request->departement != '') {
            $data->whereHas('employee', function ($query) use ($request){
              $query->where('division_id', $request->division);
            });
          }
        $dt = DataTables::of($data->get());
        return $dt->make(true);
      }

      return view('pages.dashboard.sleep.index', [
        'pageTitle' => 'Data Tidur karyawan',
        'dept' => $dept,
      ]);
    }

    public function export(Request $request)
    {
      ini_set('max_execution_time', '300');
      $date = $request->tanggal;
      $data = User::where('roles','<>', 'superadmin')
        ->with('employee','absen', 'absen.shift', 'profile', 'employee.division', 'employee.position', 'employee.category', 'employee.work_schedule', 'sleep')
        ->whereHas('employee', function ($query) use ($request){
          $query->where('category_id',  'HAU')->where('contract_status', 'ACTIVE');
        })
        // ->whereHas('profile', function ($query) use ($request){
        //   $query->where('name', 'LIKE', '%alwi%');
        // })
        ->with(['absen' => function ($query) use ($date) {
          $query->where('date', $date);
        }])
        ->with(['sleep'=> function ($query) use ($date){
          $query->where('date', $date);
        }])->get();
      

        // return $data;
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

      $spreadsheet = new Spreadsheet();
      $activeWorksheet = $spreadsheet->getActiveSheet();

      // HEADER
      $activeWorksheet->setCellValue('A2', 'REKAP DATA TIDUR OPERATOR');
      $activeWorksheet->getStyle('A2')->applyFromArray($HeaderStyle);
      $activeWorksheet->mergeCells('A2:G2');


      $activeWorksheet->setCellValue('A4', 'Shift : ');
      $activeWorksheet->setCellValue('B4', 'Semua Shift');
      $activeWorksheet->setCellValue('C4', 'Tanggal : ');
      $activeWorksheet->setCellValue('D4', $date);
      $activeWorksheet->getStyle('A4:D4')->applyFromArray($SubStyle);

      $num=5;
      $num++;

      $activeWorksheet->setCellValue('A'.$num, 'No')->getStyle('A'.$num)->applyFromArray($HeaderStyle);
      $activeWorksheet->setCellValue('B'.$num, 'Nama')->getStyle('B'.$num)->applyFromArray($HeaderStyle);
      $activeWorksheet->setCellValue('C'.$num, 'NRP')->getStyle('C'.$num)->applyFromArray($HeaderStyle);
      $activeWorksheet->setCellValue('D'.$num, 'Departement')->getStyle('D'.$num)->applyFromArray($HeaderStyle);
      $activeWorksheet->setCellValue('E'.$num, 'Position')->getStyle('E'.$num)->applyFromArray($HeaderStyle);
      $activeWorksheet->setCellValue('F'.$num, 'Shift')->getStyle('F'.$num)->applyFromArray($HeaderStyle);
      $activeWorksheet->setCellValue('G'.$num, 'Jumlah Jam Tidur')->getStyle('G'.$num)->applyFromArray($HeaderStyle);
      $activeWorksheet->setCellValue('H'.$num, 'Kesiapan Kerja')->getStyle('G'.$num)->applyFromArray($HeaderStyle);
      $activeWorksheet->getStyle('A6:H6')->applyFromArray($HeaderStyle);
      $activeWorksheet->getRowDimension(6)->setRowHeight(40, 'pt');

      
      $activeWorksheet->getStyle('A6'.':H'.$num)->applyFromArray([
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


      // Data

      foreach ($data as $key => $value) {
        $num++;
        $activeWorksheet->setCellValue('A'.$num, $num - 6);
        $activeWorksheet->setCellValue('B'.$num, $value->profile->name);
        $activeWorksheet->setCellValue('C'.$num, $value->employee->nip);
        $activeWorksheet->setCellValue('D'.$num, $value->employee->division->division);
        $activeWorksheet->setCellValue('E'.$num, $value->employee->position->position);
        if (count($value->absen) > 0) {
          $activeWorksheet->setCellValue('F'.$num, $value->absen[0]->shift->name);
        }else{
          $activeWorksheet->setCellValue('F'.$num, '-');
        }
        if (count($value->sleep) > 0) {
          $duration = 0;
          foreach ($value->sleep as $key => $sleep) {
            $duration += Carbon::parse($sleep->end)->diffInMinutes(Carbon::parse($sleep->start));
          }
          $activeWorksheet->setCellValue('G'.$num, floor($duration / 60) . ' Jam '. $duration % 60 . ' Menit');
          if ($duration < 5*60) {
              $activeWorksheet->setCellValue('H'.$num, 'Tidak Boleh Bekerja');
              $activeWorksheet->getStyle('G'.$num.':H'.$num)
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FFFF0000');
          }elseif ($duration < 6*60) {
            $activeWorksheet->setCellValue('H'.$num, 'Bekerja Dalam Pengawasan');
              $activeWorksheet->getStyle('G'.$num.':H'.$num)
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FFFFFF00');
          }else{
            $activeWorksheet->setCellValue('H'.$num, 'Fit To Work');
              $activeWorksheet->getStyle('G'.$num.':H'.$num)
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FF00FF00');
          }
        }else{
          $activeWorksheet->setCellValue('G'.$num, '-');
          $activeWorksheet->setCellValue('H'.$num, 'Data Tidur Kosong');
          $activeWorksheet->getStyle('G'.$num.':H'.$num)
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FFFF0000');
        }

        $activeWorksheet->getRowDimension($num)->setRowHeight(30, 'pt');
         $activeWorksheet->getStyle('A7'.':H'.$num)->applyFromArray([
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
         // $num++;
     };

     foreach(range('A','H') as $columnID) {
      $activeWorksheet->getColumnDimension($columnID)
          ->setAutoSize(true);
    }
      
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="Sleep Duration ('.$date.').xlsx"');
      header('Cache-Control: max-age=0');
      $writer = new Xlsx($spreadsheet);
      $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->save('php://output');
    }
}
