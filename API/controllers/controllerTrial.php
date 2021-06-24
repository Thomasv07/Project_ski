<?php

class ControllerTrial
{
    // Fonction d'insert paticipant dans Excel
    public function insertExcel()
    {
        $allowed_ext = ['xls', 'csv', 'xlsx'];
        $filename = $_FILES['import_file']['name'];
        $check_ext = explode(".", $filename);
        $file_ext = end($check_ext);
        

        if (in_array($file_ext, $allowed_ext)) {
            $targetPath = $_FILES['import_file']['tmp_name'];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
            $data = $spreadsheet->getActiveSheet()->toArray();
            
            $highestColumn = $data->getHighestColumn();
            var_dump($data);
            
            for($i=3; $i < $highestColumn ; $i++){
                
                $number_sign = [$i => $row['0']];
                $first_time = [$i =>$row['3']];
                $second_time = [$i =>$row['4']];

                $insertTrial = new Trial(array('number_sign' => $number_sign, 'first_time' => $first_time, 'second_time' => $second_time));
                $manager = new TrialManager();
                $trials = $manager->insertionTrial($insertTrial);
            }
        } else {
            echo 'invalid file';
        }
    }
}
