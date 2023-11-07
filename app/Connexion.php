<?php 
namespace app;
use PDO;

class Connexion {
    public static function getConnexion() {
        $db = new PDO("mysql:host=localhost;dbname=blog1", "root", "root");
        return $db;
    }
}