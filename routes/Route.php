<?php

namespace routes;

use \configs\Config;

class Route {
    
    private static $instance;
    
    private function __construct(){
        
    }
    
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Route();
        }
        
        return self::$instance;
    }
    
    public function routing(){
        $configs = Config::getRouting();
        
        for($i = 0, $count = count($configs); $i < $count; $i++){
            if($_SERVER["REQUEST_METHOD"] === $configs[$i]["method"] &&
               $_SERVER["REQUEST_URI"] === $configs[$i]["uri"]){
                $nameController = $configs[$i]["controller"];
                $nameAction = $configs[$i]["action"];

                if(class_exists($nameController)){
                    $controller = new $nameController();
                    if(method_exists($controller, $nameAction)){
                        $controller->$nameAction();
                        return true;
                    }
                }
            }
        }
        echo 9; exit;
        return false;
    }
    
    private function __clone(){
        
    }
    
    private function __sleep(){
        
    }
    
    private function __wakeup(){
        
    }
    
}
