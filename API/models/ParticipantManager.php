<?php
class ParticipantManager extends Model
{

    public function insertionParticipant($insert)
    {

        // Insert image
        $file = $_FILES['picture'];

        $nb = count($file['name']);
        $folder = '../medias/';
        

        for ($i = 0; $i < $nb; $i++) {

            $filename = basename($file['name'][$i]);
            $filetype = $file['type'][$i];
            $allowed = array("JPG" => "image/jpg", "JPEG" => "image/jpeg", "JFIF" => "image/jfif", "PNG" => "image/png");
            $filesize = $file['size'][$i];
            $ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
        //    $rename =  uniqid() . '.' . $ext;

            // Vérifie l'extension du fichier
            if (!array_key_exists($ext, $allowed)) {
                echo "Erreur : Veuillez sélectionner un format de fichier valide.";
            }

            // Vérifie la taille du fichier - 2Mo maximum
            if ($filesize > 20000000) {
                echo "Erreur: La taille du fichier est supérieure à la limite autorisée.";
            }

            // Vérifie le type MIME du fichier
            if (in_array($filetype, $allowed)) {
                move_uploaded_file($file['tmp_name'][$i], $folder . $filename);
               
            } else {
                echo "Erreur: Il y a eu un problème de téléchargement de votre" . $filename . " Veuillez réessayer.";
            }
        }
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
        $listing = $db->query('SELECT * FROM `participant` INNER JOIN `trial` ON trial.number_sign = participant.number_sign ORDER BY `average` ASC');
        while ($data = $listing->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new Participant($data);
            $asc[] = new Trial($data);
        }
        var_dump($list);
        $listing->closeCursor();
        return json_encode($list);
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
