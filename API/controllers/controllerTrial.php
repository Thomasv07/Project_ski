<?php

class ControllerTrial
{
    // Fonction d'insert paticipant dans Excel
    public function insertExcel()
    {
        var_dump($_FILES);
        $allowed_ext = ['xls', 'csv', 'xlsx'];
        $filename =  $data->name;
        
        
        $check_ext = explode(".", $filename);
        $file_ext = end($check_ext);
        

        if (in_array($file_ext, $allowed_ext)) {
            $targetPath = $_FILES['import_file']['tmp_name'];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
            $data = $spreadsheet->getActiveSheet();
            
            $highestRow = $data->getHighestRow();
            var_dump($highestRow);
            for($row=4; $row < $highestRow ; $row++){
                var_dump($row);
                $number_sign = $data->getCellByColumnAndRow(4, $row)->getValue(); 
                $first_time = $data->getCellByColumnAndRow(1, $row)->getValue(); 
                $second_time = $data->getCellByColumnAndRow(5, $row)->getValue(); 
                var_dump($number_sign);
                $insertTrial = new Trial(array('number_sign' => $number_sign, 'first_time' => $first_time, 'second_time' => $second_time));
                $manager = new TrialManager();
                $trials = $manager->insertionTrial($insertTrial);
            }
        } else {
            echo 'invalid file';
        }
    }
}
