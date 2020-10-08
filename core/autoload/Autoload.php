<?php

namespace core\autoload;

class Autoload {
    
    private static $instance;
    
    private function __construct(){
        
    }
    
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Autoload();
        }
        
        return self::$instance;
    }
    
    public function register(){
        spl_autoload_register([self::$instance, "load"], true, true);
    }
    
    private function load($className){
        
        require_once(str_replace("\\", "/", $className) . ".php");
    }
    
    private function __clone(){
        
    }
    
    private function __sleep(){
        
    }
    
    private function __wakeup(){
        
    }
    
}
