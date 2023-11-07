<?php 
namespace models;
use app\Connexion;

abstract class Model {
    protected $table;
    protected $db;

    public function __construct() {
        $this->db = Connexion::getConnexion();
    }

    public function all() {
        $requete = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        $data = $requete->fetchAll();

        return $data;
    }

    public function find($id) {
        $requete = $this->db->prepare("SELECT * FROM $this->table WHERE id = ?");
        $requete->execute([$id]);
        $data = $requete->fetch();

        return $data;
    }

    public function delete($id) {
        $requete = $this->db->prepare("DELETE FROM $this->table WHERE id = ?");
        $result = $requete->execute([$id]);
        
        return $result;
    }
}