<?php

class ControllerParticipant
{

    public function insertParticipant()
    {

        $insert = new Participant(array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'dob' => $_POST['dob'], 'email' => $_POST['email'], 'picture' => $_FILES['picture'], 'id_category' => $_POST['category']));
        foreach ($insert as $key => $value) {
        
            
        }
            $manager = new ParticipantManager();
            $participant = $manager->insertionParticipant($key);
        
        var_dump($participant);
    }

    public function listParticipant()
    {
        $manager = new ParticipantManager();
        $participant = $manager->listAll();
    }
}
