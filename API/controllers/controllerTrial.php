<?php

class ControllerTrial
{
    // Fonction d'insert paticipant dans Excel
    public function insertExcel()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        // Define the Base64 value you need to save as an image
        $b64 = explode(',', $data);

        // Obtain the original content (usually binary data)
        $bin = base64_decode($b64[1]);
        $filecontent = file_put_contents('evenement.xlsx', $bin);


        $allowed_ext = ['xls', 'csv', 'xlsx'];
        $filename = 'evenement.xlsx';
        $check_ext = explode(".", $filename);
        $file_ext = end($check_ext);
        

        if (in_array($file_ext, $allowed_ext)) {
            $targetPath = './evenement.xlsx';
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
            $data = $spreadsheet->getActiveSheet();
            
            $highestRow = $data->getHighestRow();

            for($row=4; $row < $highestRow ; $row++){
                
                $number_sign = $data->getCellByColumnAndRow(1, $row)->getValue(); 

                $first_time = $data->getCellByColumnAndRow(4, $row)->getValue();
                $min = $first_time * 24 * 60;
                $seconds = $min *60;
                $milliseconds = $seconds * 1000;
                $timefirst = ($min%60). ':'.($seconds%60).(($milliseconds===0)?'':'.'.rtrim($milliseconds%1000, '0'));
                
                $second_time = $data->getCellByColumnAndRow(5, $row)->getValue();
                $min = $second_time * 24 * 60;
                $seconds = $min *60;
                $milliseconds = $seconds * 1000;
                $timesecond = ($min%60). ':'.($seconds%60).(($milliseconds===0)?'':'.'.rtrim($milliseconds%1000, '0'));

                $average = $data->getCellByColumnAndRow(6, $row)->getCalculatedValue();
                $min = $average * 24 * 60;
                $seconds = $min *60;
                $milliseconds = $seconds * 1000;
                $timeaverage = ($min%60). ':'.($seconds%60).(($milliseconds===0)?'':'.'.rtrim($milliseconds%1000, '0'));
                
                $insertTrial = new Trial(array('number_sign' => $number_sign, 'first_time' => $timefirst, 'second_time' => $timesecond, 'average' => $timeaverage));
                $manager = new TrialManager();
                $trials = $manager->insertionTrial($insertTrial);
              
            }
        } else {
            echo 'invalid file';
        }
    }
}
