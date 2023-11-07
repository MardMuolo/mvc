<?php 
namespace models;

class User extends Model {
    protected $table = "user";

    public function create($nom, $email, $password) {
        $sql = "INSERT INTO user (nom, email, password) VALUES (?, ?, ?)";
        $result = $this->db->prepare($sql);
        $parametres =[$nom, $email, $password];

        if($result->execute($parametres)) {
            return $this->db->lastInsertId();
        }
        else {
            return false;
        }
    }

    public function login($email, $password) {
        $requete = $this->db->prepare('SELECT id FROM user WHERE email = ? and password = ?');
        $requete->execute([$email, $password]);

        if($requete->rowCount() > 0) {
            return $requete->fetchColumn();
        }
        else {
            return false;
        }
    }

    public function check($email) {
        $requete = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $requete->execute([$email]);
        
        if($requete->rowCount() > 0) {
            return $requete->fetch();
        }
        else {
            return false;
        }
    }
}