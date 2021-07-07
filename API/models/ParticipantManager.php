<?php
class ParticipantManager extends Model
{

    public function insertionParticipant($insert)
    {
        $db = $this->getDb();
        $prefix = substr($insert->getFirstname(), 0, 1) . substr($insert->getlastname(), 0, 1);
        $uniq = uniqid($prefix);

        $req = $db->prepare('INSERT INTO `participant`(`firstname`, `lastname`, `dob`, `email`, `picture`, `id_category`,`number_sign`) VALUES (:firstname, :lastname, :dob, :email, :picture, :id_category, :number_sign)');
        $req->bindValue(':firstname', $insert->getFirstname());
        $req->bindValue(':lastname', $insert->getLastname());
        $req->bindValue(':dob', $insert->getDob());
        $req->bindValue(':email', $insert->getEmail());
        $req->bindValue(':picture', $insert->getPicture());
        $req->bindValue(':id_category', $insert->getId_category());
        $req->bindValue(':number_sign', $uniq);
        $req->execute();
        $req->closeCursor();
    }

    public function listAllJson()
    {
        $db = $this->getDb();

        $list = [];
        $listing = $db->query('SELECT * FROM `participant` INNER JOIN `trial` ON participant.number_sign = trial.number_sign ORDER BY `average` ASC');
        while ($data = $listing->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new Participant($data);
        }
        $listing->closeCursor();
        echo json_encode($list);
    }

    public function listAllExcel()
    {
        $db = $this->getDb();

        $list = [];
        $listing = $db->query('SELECT * FROM `participant`');
        while ($data = $listing->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new Participant($data);
        }
        $listing->closeCursor();
        return $list;
    }
}
