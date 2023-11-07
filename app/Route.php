<?php
namespace app;

class Route {
    public static function process() {
        
        if(!empty($_GET['controller'])) {
            $controller = ucfirst($_GET['controller']);
            $controllerName = "\\controllers\\$controller"."Controller";

            $objet = new $controllerName();

            if(!empty($_GET['action'])) {
                $method = $_GET['action'];

                if(!empty($_GET['id'])) {
                    $id = $_GET['id'];

                    $objet->$method($id);
                }
                else {
                    $objet->$method();
                }
            }
            else { 
                $objet->index();
            }
        }
        else {
          
            $login = new \controllers\UserController();
            $login->index();
        }
    }
}

//http://localhost:8888/mvc/?controller=user&action=register

//UserController

//User
//new \controllers\UserController()