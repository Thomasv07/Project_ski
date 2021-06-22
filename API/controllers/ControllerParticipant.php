<?php

class ControllerParticipant
{

    public function insertParticipant()
    {

        $nb = count($_POST['lastname']);
        for($i=0; $i<$nb; $i++){
            $insert = new Participant(array('firstname' => $_POST['firstname'][$i], 'lastname' => $_POST['lastname'][$i], 'dob' => $_POST['dob'][$i], 'email' => $_POST['email'][$i], 'picture' => $_FILES['picture']['name'][$i], 'id_category' => $_POST['category'][$i]));

            $manager = new ParticipantManager();
            $participant = $manager->insertionParticipant($insert); 
        }
       
    }

    public function insertExcel(){
        
        require 'vendor/autoload.php';

            use PhpOffice\PhpSpreadsheet\Spreadsheet;
            use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'coucou !');

            $writer = new Xlsx($spreadsheet);
            $writer->save('hello.xlsx');

            echo "<meta http-equiv='refresh' content='0;url=hello.xlsx'/>";
    }

    public function listParticipant()
    {
        $manager = new ParticipantManager();
        $participant = $manager->listAll();
    }
}
