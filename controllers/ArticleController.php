<?php 
namespace controllers;

class ArticleController extends Controller {

    protected $modelName = "\\models\\Article";
   
    public function index() {
       
        $tab = $this->model->all();
        require "views/articles/index.php";
    } 

    public function show($id) {
        $data = $this->model->find($id);
        require "views/articles/single.php";
    }
    
    public function edit($id) {
        $data = $this->model->find($id);
        require "views/articles/edit.php";
    } 

    public function create() {
        require "views/articles/create.php";
    }


    public function store() {
        if(!empty($_POST['title']) & !empty($_POST['auteur']) & !empty($_POST['slug']) & !empty($_POST['content'])) {
            $title = htmlspecialchars($_POST['title']);
            $slug = htmlspecialchars($_POST['slug']);
            $content = htmlspecialchars($_POST['content']);
            $auteur = htmlspecialchars($_POST['auteur']);
            
            if(!empty($_FILES['pic']['name'])) {
                $tmp = $_FILES['pic']['tmp_name'];
                $extension = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
                $nom_image = date('Ymdhis').".".$extension;
                $chemin = "views/images/".$nom_image;
        
                move_uploaded_file($tmp, $chemin);
        
                
            }
            else {
                $nom_image = null;
            }
        
            $result = $this->model->create($title, $slug, $content, $auteur, $nom_image);
        
            if($result) {
                header('location:index.php?controller=article');
            }
            else {
                header('location:index.php?controller=article&action=create');
            }
        
        
        }
    }

    public function update($id) { 
        if(!empty($_POST['title']) & !empty($_POST['auteur']) & !empty($_POST['slug']) & !empty($_POST['content'])) {
            $title = htmlspecialchars($_POST['title']);
            $slug = htmlspecialchars($_POST['slug']);
            $content = htmlspecialchars($_POST['content']);
            $auteur = htmlspecialchars($_POST['auteur']);
           
        
            $result = $this->model->update($id, $title, $slug, $content, $auteur);
        
            if($result) {
                header("location:index.php?controller=article&action=show&id=$id");
            }
            else {
                header("location:index.php?controller=article&action=edit&id=$id");
            }
        }
    }

    public function destroy($id) {
        $result = $this->model->delete($id);
        
        if($result) {
            echo json_encode(['status'=>'ok']);
        }
        else {
            echo json_encode(['status'=>'ko']);
        }
    }
}