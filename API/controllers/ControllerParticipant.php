<?php

class ControllerParticipant
{

    public function getAll()
    {

        $manager = new ParticipantManager();
        $participant = $manager->listAllJson();
        echo $participant;
    }

    public function insertParticipant()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        // Define the Base64 value you need to save as an image
        $b64 = explode(',', $data->picture);

        // Obtain the original content (usually binary data)
        $bin = base64_decode($b64[1]);

        // Load GD resource from binary data
        $im = imageCreateFromString($bin);

        // Make sure that the GD library was able to load the image
        // This is important, because you should not miss corrupted or unsupported images
        if (!$im) {
            die('Base64 value is not a valid image');
        }

        // Rename the file and Specify the location where you want to save the image
        $prefix = substr($data->firstname, 0, 1) . substr($data->lastname, 0, 1);
        $uniq = uniqid($prefix);
        $img_file = '../src/assets/'.$uniq.'.png';
        $rename = $uniq.'.png';

        // Save the GD resource as PNG in the best possible quality (no compression)
        // This will strip any metadata or invalid contents (including, the PHP backdoor)
        // To block any possible exploits, consider increasing the compression level
        imagepng($im, $img_file, 0);



        $insert = new Participant(array('firstname' => $data->firstname, 'lastname' => $data->lastname, 'dob' => $data->dob, 'email' => $data->email, 'picture' => $rename, 'id_category' => $data->category));

        $manager = new ParticipantManager();
        $participant = $manager->insertionParticipant($insert);
    }

    public function exportExcel()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $manager = new ParticipantManager();
        $participants = $manager->listAllExcel();

        $managerevent = new TournamentManager();
        $tournaments = $managerevent->listTournament();

        var_dump($tournaments);

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // $sheet->setCellValue('C1', $tournaments->getCity() . '-' . $tournaments->getDate());
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
            $sheet->setCellValue('F' . $rowcount, '=MOYENNE(D' . $rowcount . ', E' . $rowcount . ' )');
            $rowcount++;
        }

        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('../src/assets/evenement.xlsx');
        echo "<meta http-equiv='refresh' content='0;url=evenement.xlsx'/>";

        $excel = file_get_contents('../src/assets/evenement.xlsx');
        return  base64_encode($excel);
    }

    public function deletepax($id)
    {

        $manager = new ParticipantManager();
        $participant = $manager->delete($id);
    }
}
