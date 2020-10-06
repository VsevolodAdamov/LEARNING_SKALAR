<?php

namespace models;

class Entity {
    private $id;
    
    public function __construct(){
        
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
}
