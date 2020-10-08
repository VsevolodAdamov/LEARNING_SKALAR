<?php

namespace core\database;

use configs\Config;

class SourceConnect {
    
    private static $default;
    private static $connections;
    
    private function __construct(){
        
    }
    
    public static function connect(){
        $configs = Config::getDB();
        for($i = 0, $count = count($configs); $i < $count; $i++){
            if($configs[$i]["is_default"]){
                self::$default = $configs[$i]["name"];
            }
            
            $className = $configs[$i]["class_connection"];
            $connection = new $className($configs[$i]["host"], $configs[$i]["port"],
                                         $configs[$i]["username"], $configs[$i]["password"],
                                         $configs[$i]["charset"], $configs[$i]["database"]);
            $connection->connect();

            self::$connections[$configs[$i]["name"]] = $connection;
        }
    }
    
    public static function getCurrentConnect(){
        return self::$connections[self::$default];
    }
    
    public static function changeConnection($newDefault){
        if(!isset(self::connections[$newDefault])){
            return new \Exception("connection not found");
        }
        
        self::$default = $newDefault;
    }
    
    public static function close(){
        $connects = array_values(self::$connections);
        for($i = 0, $count = count($connects); $i < $count; $i++){
            $connects[$i]->close();
        }
    }

}
