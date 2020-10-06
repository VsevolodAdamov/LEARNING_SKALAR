<?php

namespace autoload;

use routes\Route;

class Application {
    
        private static $instance;
    
    private function __construct(){
        
    }
    
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Application();
        }
        
        return self::$instance;
    }
    
    public function run(){
        (Autoload::getInstance())->register();
        $isRun = (Route::getInstance())->routing();
        
        if(!$isRun){
            echo "error 404";
            exit();
        }
    }
    
    private function __clone(){
        
    }
    
    private function __sleep(){
        
    }
    
    private function __wakeup(){
        
    }
    
}
