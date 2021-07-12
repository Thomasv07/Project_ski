<?php
class TrialManager extends Model
{
    public function insertionTrial($insertTrial)
    {
        $db = $this->getDb();

        $req = $db->prepare('INSERT INTO `trial`(`number_sign`, `first_time`, `second_time`,`average`) VALUES (:number_sign, :first_time, :second_time, :average)');
        $req->bindValue(':number_sign', $insertTrial->getNumber_sign());
        $req->bindValue(':first_time', $insertTrial->getFirst_time());
        $req->bindValue(':second_time', $insertTrial->getSecond_time());
        $req->bindValue(':average', $insertTrial->getAverage());
        $req->execute();

        $req->closeCursor();
    }
}
