<?php
class TournamentManager extends Model
{
    public function insertionTournament($insert){

        $db = $this->getDb();

        $req = $db->prepare('INSERT INTO `tournament`(`city`, `date`) VALUES (:city, :date)');
        $req->bindValue(':city', $insert->getCity());
        $req->bindValue(':date', $insert->getDate());
        $req->execute();

        $req->closeCursor();
        
    }
}