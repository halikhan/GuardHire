<?php

namespace App\Exports;

use App\User;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use RegistersEventListeners;
use Carbon\Carbon;

class CustomersExport implements FromCollection, WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = User::select('users.registration_number', 'users.name','users.user_type','users.personal_cell_1','users.email','organizations.title','users.personal_cell_2', )
        ->join('organizations','organizations.id','users.organization')
        ->where('user_type','customer')
        ->get();

        $index = 1;
        foreach($data as $d){
            $keyed[] = [
                'serial_no' => $index++,
                'registration_number' => $d->registration_number,
                'name' => $d->name,
                'user_type' => $d->user_type,
                'personal_cell_1' => $d->personal_cell_1,
                'email' => $d->email,
                'title' => $d->title,
                'personal_cell_2' => $d->personal_cell_2,
            ];
        }
        $keyed = new Collection($keyed);
        return $keyed;

    }

    public function headings(): array
    {
        return [
         [$date = Carbon::now()->format('d-M-Y h:i A')],
         ['Customer Report'],
         [
            'Sr.No#',
            'ID Number',
            'Account Name',
            'Sub Account',
            'Phone',
            'Email',
            'Organization',
            'Phone 2'],
            [],
            [],
        ];
    }

    public function registerEvents(): array
    {
 // $sheet->mergeCells('A1:E1');


      //border style
       $styleArray = [
        'borders' => [
         'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                //'color' => ['argb' => 'FFFF0000'],
      ],
  ],
];

    //font style
$styleArray1 = [
  'font' => [
   'bold' => true,
]
];

$styleArray11 = [
  'font' => array(
    'name'      =>  'Calibri',
    'size'      =>  25,
    'bold'      =>  true,
                    // 'date' =>  PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dateFromExcel)

)

];

    //column  text alignment
$styleArray2 = array(
  'alignment' => array(
   'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
)
);


$styleArray20 = array(
  'alignment' => array(
   'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
)
);


$styleArray21 = array(
  'alignment' => array(
   'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
)
);

    //$styleArray3 used for vertical alignment
$styleArray3 = array(
  'alignment' => array(
   'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
)
);


$styleArray4 = array(
  'fill' => [
   'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
   'startColor' => [
    'argb' => '327fab',
]]
);

$styleArray5 = array(
  'fill' => [
   'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,

   'startColor' => [
    'argb' => 'f0bf60',
]]);
$styleArray8 = array(
  'font'  => array(
   'color' => array('rgb' => '006400'),

));
$styleArray9 = array(
  'font'  => array(
   'color' => array('rgb' => 'FF0000'),

));
$styleArray10 = array(
  'font'  => array(
   'color' => array('rgb' => 'FF0000'),

));

$styleArray14 = array(
  'font'  => array(
   'color' => array('rgb' => 'ffffff'),

));


$styleArray15 = array(
  'fill' => [
   'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
   'startColor' => [
    'argb' => '6c6d70',
]]
);

return [
  AfterSheet::class => function(AfterSheet $event) use ($styleArray, $styleArray1, $styleArray2,
    $styleArray3, $styleArray4 , $styleArray5 , $styleArray8 , $styleArray9 , $styleArray10,$styleArray15,$styleArray11,$styleArray14,$styleArray20,$styleArray21)
  {
   $event->sheet->getDelegate()->mergeCells('A1:H1');
   $event->sheet->getDelegate()->mergeCells('A2:H2');

                    $cellRange = 'A1:H1'; // All headers
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                    // $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
                    $cellRange = 'A2:H2'; // All headers
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                    // $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);


                 //Heading formatting...
                    $event->getSheet()->getDelegate()->getStyle('A2:H2')->applyFromArray($styleArray11);
                    $event->getSheet()->getDelegate()->getStyle('A1:H1')->applyFromArray($styleArray14);
                    $event->getSheet()->getDelegate()->getStyle('A2:H2')->applyFromArray($styleArray14);

                    $event->getSheet()->getDelegate()->getStyle('A1:H1')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A1:H1')->applyFromArray($styleArray20);
                    $event->getSheet()->getDelegate()->getStyle('A3:H3')->applyFromArray($styleArray);
                    $event->getSheet()->getDelegate()->getStyle('A3:H3')->applyFromArray($styleArray1);


                        //used for making bold
                    $event->getSheet()->getDelegate()->getStyle('A1:H1')->applyFromArray($styleArray15);
                    $event->getSheet()->getDelegate()->getStyle('A2:H2')->applyFromArray($styleArray15);
                    $event->getSheet()->getDelegate()->getStyle('A2:H2')->applyFromArray($styleArray15);
                    $event->getSheet()->getDelegate()->getStyle('A2:H2')->applyFromArray($styleArray15);
                    $event->getSheet()->getDelegate()->getStyle('A9:H9')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A12:H12')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A19:H19')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A27:H27')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A31:H31')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A35:H35')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A36:H36')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A42:H42')->applyFromArray($styleArray1);
                    $event->getSheet()->getDelegate()->getStyle('A43:H43')->applyFromArray($styleArray1);


                        //column width set
                    $event ->sheet-> getDelegate()->getColumnDimension('A')->setWidth(17);
                    $event ->sheet-> getDelegate()->getColumnDimension('B')->setWidth(17);
                    $event ->sheet-> getDelegate()->getColumnDimension('C')->setWidth(17);
                    $event ->sheet-> getDelegate()->getColumnDimension('D')->setWidth(17);
                    $event ->sheet-> getDelegate()->getColumnDimension('E')->setWidth(27);
                    $event ->sheet-> getDelegate()->getColumnDimension('F')->setWidth(17);
                    $event ->sheet-> getDelegate()->getColumnDimension('G')->setWidth(17);
                    $event ->sheet-> getDelegate()->getColumnDimension('H')->setWidth(17);





                        //D & E column width set to 17
                    $columns = ['A', 'H'];
                    foreach ($columns as $column) {
                      $event ->sheet-> getDelegate()->getColumnDimension($column)->setWidth(30);
                  }

                        //D1 & E1 text wrapping...
            // $event ->sheet->getStyle('D1')->getAlignment()->setWrapText(true);
            // $event ->sheet->getStyle('E1')->getAlignment()->setWrapText(true);

                        //text center columns...
                  $event ->sheet->getStyle('A2:A43')->applyFromArray($styleArray21);
                  $event ->sheet->getStyle('A3:A1000')->applyFromArray($styleArray2);
                  $event ->sheet->getStyle('B2:B43')->applyFromArray($styleArray2);

                  $event ->sheet->getStyle('C2:C43')->applyFromArray($styleArray2);
                  $event ->sheet->getStyle('D2:D43')->applyFromArray($styleArray2);
                  $event ->sheet->getStyle('E2:E43')->applyFromArray($styleArray2);
                  $event ->sheet->getStyle('F2:F43')->applyFromArray($styleArray2);
                  $event ->sheet->getStyle('G2:G43')->applyFromArray($styleArray2);
                  $event ->sheet->getStyle('H2:H1000')->applyFromArray($styleArray2);






        $event ->sheet->getStyle('A3:H3')->applyFromArray($styleArray5);  //headings vertical alignment
// $phpExcel->getActiveSheet()->getCell('A1')->setValue('Some text');
        // $event->sheet->getStyle('G4:G1000')->applyFromArray($styleArray8);
        // $event->sheet->getStyle('H4:H1000')->applyFromArray($styleArray9);

        // $borders = ['A', 'T'];
        // foreach ($borders as $border) {
        //     $event ->sheet->getStyle('A:T')->applyFromArray($styleArray);
        //         }

                        //sums color formatting...

                //$row->setBackground('#CCCCCC');



    },
];
}

}
