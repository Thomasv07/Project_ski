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

        $nb = count($_POST['lastname']);
        for ($i = 0; $i < $nb; $i++) {
            $insert = new Participant(array('firstname' => $_POST['firstname'][$i], 'lastname' => $_POST['lastname'][$i], 'dob' => $_POST['dob'][$i], 'email' => $_POST['email'][$i], 'picture' => $_FILES['picture']['name'][$i], 'id_category' => $_POST['category'][$i]));

            $manager = new ParticipantManager();
            $participant = $manager->insertionParticipant($insert);
        }
    }

    public function exportExcel()
    {
        $manager = new ParticipantManager();
        $participants = $manager->listAllExcel();

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('C1', $_POST['city'] . '-' . $_POST['date']);
        $sheet->setCellValue('A3', 'Numéro de dossard');
        $sheet->setCellValue('B3', 'Nom');
        $sheet->setCellValue('C3', 'Prénom');
        $sheet->setCellValue('D3', '1er passage');
        $sheet->setCellValue('E3', '2eme passage');

        $rowcount = 4;
        foreach ($participants as $participant) {
            $paticipantArray = [$participant->getNumber_sign(), $participant->getLastname(), $participant->getFirstname()];
            $rowparticipant = array_chunk($paticipantArray, 3);
            $sheet->fromArray($rowparticipant, NULL, 'A' . $rowcount);
            $rowcount++;
        }

        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($_POST['city'] . '-' . $_POST['date'] . '.xlsx');

        echo "<meta http-equiv='refresh' content='0;url=" . $_POST['city'] . '-' . $_POST['date'] . ".xlsx'/>";
    }
}
