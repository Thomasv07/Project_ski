<?php
class CategoryManager extends Model
{
    public function insertionCategory($insert){

        $db = $this->getDb();
        $lastid = $db->lastInsertId();

        $req = $db->prepare('INSERT INTO `category`(`type`, `id_participant`) VALUES (:type, :id_participant)');
        $req->bindValue(':type', $insert->getType());
        $req->bindValue(':id_participant', $lastid);
        $req->execute();

        $req->closeCursor();
        
    }

    public function listCategoryJson(){
        $db = $this->getDb();
        
        $list = [];
        $listing = $db->query('SELECT * FROM `category`');
        while ($data = $listing->fetch(PDO::FETCH_ASSOC)) {
        $list[] = new Category($data);
        }
        
        $listing->closeCursor();
        return json_encode($list);
        
        }
}