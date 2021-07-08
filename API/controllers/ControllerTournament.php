<?php

class ControllerTournament
{ 
    public function insertTournament(){

        $json = file_get_contents('php://input');
        $data = json_decode($json);
        
        $insert = new Tournament(array('city' =>  $data->city, 'date' => $data->date));
        $manager = new TournamentManager();
        $tournament = $manager->insertionTournament($insert);

    }
}