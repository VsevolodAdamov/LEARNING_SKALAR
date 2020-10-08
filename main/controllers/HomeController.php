<?php

namespace main\controllers;

use core\controllers\Controller;
use core\database\MysqlConnection;
use main\dao\UserDatabaseDao;

class HomeController extends Controller {
    
    public function __construct(){
        
    }
    
    public function home(){
        $this->loadDao("UserDatabaseDao", "userDatabaseDao");
        
        $users = $this->userDatabaseDao->getByLoginAndPassword("admin",
                                                "bbKjJ9Kb54a7843022a34bac21200362f0991b14");
        $aa = 'hgfhgdh';
        $this->data("users", $users);
        
        $this->display("home");
    }
    
    public function listUsers(){
        echo "It is list users";
    }
}
