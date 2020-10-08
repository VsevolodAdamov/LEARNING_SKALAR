<?php

namespace configs;

class Config {
        
    private function __construct(){
        
    }
    
    public static function getDB(){
        return [
            [
                "name" => "maindb",
                "host" => "localhost",
                "port" => 3306,
                "username" => "bitrix0",
                "password" => "9RAxx!xNIkc=OdlE7z0H",
                "charset" => "utf-8",
                "database" => "sitemanager",
                "class_connection" => "\\core\\database\\MysqlConnection",
                "is_default" => true,
            ],[
                "name" => "notMaindb",
                "host" => "localhost",
                "port" => 3306,
                "username" => "bitrix0",
                "password" => "9RAxx!xNIkc=OdlE7z0H",
                "charset" => "utf-8",
                "database" => "sitemanager",
                "class_connection" => "\\core\\database\\MysqlConnection",
                "is_default" => false,
            ],
        ];
    }
    
    public static function getRouting(){
        return [
            [
                "uri" => "/",
                "method" => "GET",
                "controller" => "\\main\\controllers\\HomeController",
                "action" => "home",
            ],[
                "uri" => "/users/",
                "method" => "GET",
                "controller" => "\\main\\controllers\\HomeController",
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
