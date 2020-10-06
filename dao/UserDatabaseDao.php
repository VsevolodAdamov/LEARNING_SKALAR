<?php

namespace dao;

use models\User;

class UserDatabaseDao extends DatabaseAccessors implements UserDao{
    
    public function __constrtuct($connection){
        parent::__construct($connection);
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
        
        $users = $this->query("SELECT `NAME`, `LAST_NAME`
                              FROM `b_user`
                              WHERE `LOGIN`=':login' AND `PASSWORD`=':password'
                              LIMIT 1", $prepare);
        print_R($users); exit;
        $result = [];
        
        for($i = 0, $count = count($users); $i < $count; $i++){
            $user = new User();
            $user->setFirstname($users[$i]["NAME"]);
            $user->setLastname($users[$i]["LAST_NAME"]);
        }
        
        return $result;
    }
    
}
