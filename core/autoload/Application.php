<?php

namespace core\autoload;

use core\routes\Route;
use core\database\SourceConnect;
use configs\Consts;

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
        SourceConnect::connect();
        
        $isRun = (Route::getInstance())->routing();
        
        SourceConnect::close();
        
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
