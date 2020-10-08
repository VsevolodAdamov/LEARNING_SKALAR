<?php

namespace core\database;

interface Connection {
    
    public function connect();
    
    public function query($sql);
    
    public function prepare($value);
    
    public function close();
}