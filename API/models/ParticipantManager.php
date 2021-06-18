<?php
class ParticipantManager extends Model
{

    public function insertionParticipant($insert){

        // Insert image
            $dossier = './medias\\';
            $allowed = array('JPG', 'JPEG', 'PNG', 'GIF', 'JFIF');
            $filename = basename($_FILES['picture']['name']);
            $filesize = $_FILES['picture']['size'];
            $ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
            $file_tmp = $_FILES['picture']['name'];
            $prefix = substr($insert->getFirstname(),-1). substr($insert->getlastname(),-1);
            $rename = $filename . uniqid($prefix) . '.' . $ext;
            $file = $dossier . $filename;
            $file_rename = $dossier . $rename;

            // check size 
            if ($filesize > 2000000) {
                echo "Erreur: La taille du fichier est supérieure à la limite autorisée.";
            } else {
                // check the extension
                if (!in_array($ext, $allowed)) {
                    echo "Erreur : Veuillez sélectionner un format de fichier valide.";
                } else {
                    // check if the file already exist
                    if (file_exists("./medias/" . $_FILES["picture"]["name"])) {
                        move_uploaded_file($file_tmp, $file_rename);
                        $return_name = $file_rename;
                    } else {
                        move_uploaded_file($file_tmp, $file);
                        $return_name = $dossier . $file_rename;
                    }
                }
            }
    
        $db = $this->getDb();
        $last_id = $db->lastInsertId();
        $prefix = substr($insert->getFirstname(),0). substr($insert->getlastname(),0);
        $uniq = uniqid($prefix);

        $req = $db->prepare('INSERT INTO `participant`(`firstname`, `lastname`, `dob`, `email`, `picture`, `id_category`,`number_sign`, `id_tournament`) VALUES (:firstname, :lastname, :dob, :email, :picture, :id_category, :number_sign, :id_tournament)');
        $req->bindValue(':firstname', $insert->getFirstname());
        $req->bindValue(':lastname', $insert->getLastname());
        $req->bindValue(':dob', $insert->getDob());
        $req->bindValue(':email', $insert->getEmail());
        $req->bindValue(':picture', $file_rename);
        $req->bindValue(':id_category', $insert->getId_category());
        $req->bindValue(':number_sign', $uniq);
        $req->bindValue(':id_tournament', $last_id);
        $req->execute();

        $req->closeCursor();
           var_dump($insert); 
    }

    public function listAll(){
        $db = $this->getDb();

        $list=[];
        $listing = $db->query('SELECT * FROM `participant`');
        while ($data = $listing->fetch(PDO::FETCH_ASSOC)){
          $list[] = new Participant($data);
        }
        $listing->closeCursor();
        return $list; 
    }
}