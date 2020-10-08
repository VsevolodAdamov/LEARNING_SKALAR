<?php

namespace core\database;

class MysqlConnection implements Connection{
    
    private $host;
    private $port;
    private $username;
    private $password;
    private $charset;
    private $database;
    
    private $resource;
    
    public function __construct($host, $port, $username, $password, $charset, $database){
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->charset = $charset;
        $this->database = $database;
    }
    
    public function connect(){
        $this->resource = mysqli_connect($this->host, $this->username,
                                   $this->password, $this->database);
        
        mysqli_set_charset($this->resource, $this->charset);
    }
    
    public function query($sql){
        $query = mysqli_query($this->resource, $sql, MYSQLI_USE_RESULT);
        
        $result = [];
        for(;$row = mysqli_fetch_assoc($query);){
            $result[] = $row;
        }
        
        mysqli_free_result($query);
        
        return $result;
    }
    
    public function prepare($value){
        return mysqli_real_escape_string($this->resource, $value);
    }
    
    public function close(){
        mysqli_close($this->resource);
    }
}
