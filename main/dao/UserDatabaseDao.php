<?php

namespace main\dao;

use main\models\User;
use core\database\DatabaseAccessors;

class UserDatabaseDao extends DatabaseAccessors implements UserDao{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getList(){
        $result = [];
        
        return $result;
    }
    
    public function getByDatebirthToday(){
         $result = [];
        
        return $result;
    }
    
    public function getByLoginAndPassword($login, $password){
        $prepare = [
            [
                "value" => $login,
                "statement" => ":login",
            ],[
                "value" => $password,
                "statement" => ":password",
            ],
        ];
        
        $users = $this->query("SELECT `ID`, `NAME`, `LAST_NAME`
                              FROM `b_user`
                              WHERE `LOGIN`=':login' AND `PASSWORD`=':password'
                              LIMIT 1", $prepare);

        $result = [];
        
        for($i = 0, $count = count($users); $i < $count; $i++){
            $user = new User();
            $user->setId((int)$users[$i]["ID"]);
            $user->setFirstname($users[$i]["NAME"]);
            $user->setLastname($users[$i]["LAST_NAME"]);
            $result[] = $user;
        }

        return $result;
    }
    
}
