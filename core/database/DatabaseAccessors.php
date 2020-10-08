<?php

namespace core\database;

abstract class DatabaseAccessors {
    
    private $connection;
    
    public function __construct(){
        $this->connection = SourceConnect::getCurrentConnect();
    }
    
    public function query($sql, $prepare = []){
        $prepareSql = $sql;
        
        for($i = 0, $count = count($prepare); $i < $count; $i++){
            $value = $this->connection->prepare($prepare[$i]["value"]);
            $prepareSql = str_replace($prepare[$i]["statement"], $value, $prepareSql);
        }

        return $this->connection->query($prepareSql);
    }
    
}
