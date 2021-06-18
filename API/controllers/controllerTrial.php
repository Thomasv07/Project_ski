<?php

class ControllerTrial
{ 
    // Fonction d'insert paticipant dans Excel
    public function insertExcel()
    {

    // use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    global $router;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'coucou !');

    $writer = new Xlsx($spreadsheet);
    $writer->save('hello.xlsx');

    echo "<meta http-equiv='refresh' content='0;url=hello.xlsx'/>";
        
    }

}