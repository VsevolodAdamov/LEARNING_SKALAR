<?php

namespace configs;

class Config {
        
    private function __construct(){
        
    }
    
    public static function getDatabase(){
        return [
            "host" => "localhost",
            "port" => 3306,
            "username" => "bitrix0",
            "password" => "9RAxx!xNIkc=OdlE7z0H",
            "charset" => "utf-8",
            "database" => "sitemanager",
        ];
    }
    
    public static function getRouting(){
        return [
            [
                "uri" => "/",
                "method" => "GET",
                "controller" => "\\controllers\\HomeController",
                "action" => "home",
            ],[
                "uri" => "/users/",
                "method" => "GET",
                "controller" => "\\controllers\\HomeController",
                "action" => "listUsers",
            ],
        ];
    }
    
    private function __clone(){
        
    }
    
    private function __sleep(){
        
    }
    
    private function __wakeup(){
        
    }
    
}
