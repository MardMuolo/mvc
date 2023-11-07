<?php 
namespace controllers;


class UserController extends Controller {

  protected $modelName = "\\models\\User";  

    public function index() {
        require "views/users/index.php";
    } 

    public function register() {
        require "views/users/create.php";
    }

    public function connexionUser() {
        if(!empty($_POST['email']) & !empty($_POST['password'])) {
    
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));
            $password = md5($password);
        
            $user_id = $this->model->login($email, $password);

            if($user_id) {
                
                if(isset($_POST['remember'])) {
                    setcookie('compte', $user_id, time()+3600);
                }
                else {
                    $_SESSION['compte'] = $user_id;
                }
                header('location:index.php?controller=article');
            }
            else {
                header('location:index.php?noexist');
            } 
        }
    }

    public function store() {
        if(!empty($_POST['nom']) & !empty($_POST['email']) & !empty($_POST['password'])) {
            $nom = htmlspecialchars(trim($_POST['nom'])); 
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));
            $password = md5($password);
        
            $check = $this->model->check($email);
            
            if($check) {
                header('location:?controller=user&action=register&exist'); 
            }
            else {
                $result = $this->model->create($nom, $email, $password);
        
                if($result) {
                    header("location:index.php");
                }
                else {
                    echo "Erreur";
                }
            }
            
        }
    }
    
}