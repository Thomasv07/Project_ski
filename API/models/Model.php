<?php
abstract class Model {
    private static $_db;

    private static function setDb(){
        try {
            self::$_db = new PDO('mysql:host=localhost;dbname=ski;charset=utf8', 'root');
            self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    // Check if the databas is connected, if not open a connection
    protected function getDb(){
        if(self::$_db == null){
            self::setDb();
        }

        return self::$_db;
    }
}
