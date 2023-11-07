<?php 
namespace controllers; 
use models\User;

class AuthController {
  
    public static function user() {
        if(!empty($_COOKIE['compte'])) {
            $_SESSION['compte'] = $_COOKIE['compte'];
        }
        
        if(!empty($_SESSION['compte'])) {
            $id = $_SESSION['compte'];
            $model = new User();
            $data = $model->find($id);
            
            if($data) {
                return (object)$data;
                
            }
            else {
                
                header('location:?controller=auth&action=logout');
            }
        }
        else {
            header('location:index.php');
        }
    }

    public function logout() {
        session_destroy();

        setcookie('compte', '', time()-3600);

        header('location:index.php');
    }

}