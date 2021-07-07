<?php

class ControllerParticipant
{

    public function getAll(){

        $manager = new ParticipantManager();
        $participant = $manager->listAllJson();
        echo $participant;
    }

    public function insertParticipant()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        
        var_dump($data);
        $nb = count($data->firstname);
        for ($i = 0; $i < $nb; $i++) {    
            $insert = new Participant(array('firstname' => $data->firstname[$i], 'lastname' => $data->lastname[$i], 'dob' => $data->dob[$i], 'email' => $data->email[$i], 'picture' => $_FILES['picture']['name'][$i], 'id_category' => $data->category[$i]));

            $manager = new ParticipantManager();
            $participant = $manager->insertionParticipant($insert);
        }
    }

    public function exportExcel()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $manager = new ParticipantManager();
        $participants = $manager->listAllExcel();

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('C1', $data->city . '-' . $data->date);
        $sheet->setCellValue('A3', 'Numéro de dossard');
        $sheet->setCellValue('B3', 'Nom');
        $sheet->setCellValue('C3', 'Prénom');
        $sheet->setCellValue('D3', '1er passage');
        $sheet->setCellValue('E3', '2eme passage');
        $sheet->setCellValue('F3', 'Moyenne');

        $rowcount = 4;
        foreach ($participants as $participant) {
            $paticipantArray = [$participant->getNumber_sign(), $participant->getLastname(), $participant->getFirstname()];
            $rowparticipant = array_chunk($paticipantArray, 3);
            $sheet->fromArray($rowparticipant, NULL, 'A' . $rowcount);
            $sheet->setCellValue('D' . $rowcount, 'mm:ss,00');
            $sheet->setCellValue('E' . $rowcount, 'mm:ss,00');
            $sheet->setCellValue('F' . $rowcount, '=MOYENNE(D'.$rowcount.', E'.$rowcount.' )');
            $rowcount++;
        }

        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($data->city . '-' . $data->date . '.xlsx');

        echo "<meta http-equiv='refresh' content='0;url=" . $data->city . '-' . $data->date . ".xlsx'/>";
    }
}
