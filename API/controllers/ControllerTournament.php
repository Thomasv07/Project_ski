<?php

class ControllerTournament
{ 
    public function insertTournment(){
        
        $insert = new Tournament(array('city' =>  $_POST['city'], 'date' => $_POST['date']));
        $manager = new TournamentManager();
        $participant = $manager->insertionTournament($insert);

    }
}