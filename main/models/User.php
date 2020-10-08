<?php

namespace main\models;

class User extends Entity {
    
    private $firstname;
    private $lastname;
    private $datebirth;
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getFirstname(){
        return $this->firstname;
    }
    
    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }
    
    public function getLastname(){
        return $this->lastname;
    }
    
    public function setLastname($lastname){
        $this->lastname = $lastname;
    }
    
    public function getDatabirth(){
        return $this->datebirth;
    }
    
    public function setDatabirth($datebirth){
        $this->datebirth = $datebirth;
    }
}
