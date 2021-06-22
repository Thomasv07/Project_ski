<?php

class ControllerTournament
{ 
    public function insertTournament(){
        
        $insert = new Tournament(array('city' =>  $_POST['city'], 'date' => $_POST['date']));
        $manager = new TournamentManager();
        $tournament = $manager->insertionTournament($insert);

    }
}