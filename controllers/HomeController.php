<?php

namespace controllers;

use database\MysqlConnection;
use dao\UserDatabaseDao;

class HomeController {
    
    public function __construct(){
        
    }
    
    public function home(){
        
        $my = new MysqlConnection("localhost", 3306, "bitrix0", "9RAxx!xNIkc=OdlE7z0H", "utf8", "sitemanager");
        $my->connect();
        
        $userDao = new UserDatabaseDao($my);
        
        $users = $userDao->getByLoginAndPassword("admin", "bbKjJ9Kb54a7843022a34bac21200362f0991b14");
        
        $my->close();
        print_r($users);
        echo "It is main page";
    }
    
    public function listUsers(){
        echo "It is list users";
    }
    
}
