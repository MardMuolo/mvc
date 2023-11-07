<?php 
namespace models;

class Article extends Model {
    protected $table = "article";

    public function create($title, $slug, $content, $auteur, $nom_image) {
        $sql = "INSERT INTO article (title,slug,content,auteur, pic) VALUES (?, ?, ?, ?, ?)";
        $result = $this->db->prepare($sql);
        $parametres =[$title, $slug, $content, $auteur, $nom_image];

        if($result->execute($parametres)) {
            return $this->db->lastInsertId();
        }
        else {
            return false;
        }
    }

    public function update($id, $title, $slug, $content, $auteur) {
        $sql = "UPDATE article SET title= ?, slug=?, content=?, auteur=? WHERE id = ?";
        $result = $this->db->prepare($sql);
        $parametres =[$title, $slug, $content, $auteur, $id];

        if($result->execute($parametres)) {
            return true;
        }
        else {
            return false;
        }
    }
}