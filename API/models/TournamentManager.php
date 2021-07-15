<?php
class TournamentManager extends Model
{
    public function insertionTournament($insert){

        $db = $this->getDb();
        $tc= $db->query('TRUNCATE TABLE `tournament`');
        $tc->closeCursor();

        $req = $db->prepare('INSERT INTO `tournament`(`city`, `date`) VALUES (:city, :date)');
        $req->bindValue(':city', $insert->getCity());
        $req->bindValue(':date', $insert->getDate());
        $req->execute();

        $req->closeCursor();
        
    }

    public function listTournament()
    {
        $db = $this->getDb();
       
        $list = [];
        $listing = $db->query('SELECT * FROM `tournament`');
        while ($data = $listing->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new Tournament($data);
        }
        $listing->closeCursor();
        return $list;
    }
}