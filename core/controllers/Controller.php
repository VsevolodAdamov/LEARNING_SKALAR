<?php

namespace core\controllers;

use configs\Consts;
use core\database\SourceConnect;

abstract class Controller {
    
    private $data;
    
    public function __construct(){
        $this->data = [];
    }
    
    public function display($titleView){
        
        $path = Consts::DOCUMENT_ROOT . "/" . Consts::NAME_SECTION . "/views/" . $titleView . ".php";

        if(file_exists($path)){
            for($i = 0, $count = count($this->data); $i < $count; $i++){
                ${$this->data[$i]["variable"]} = $this->data[$i]["value"];
            }

            require_once($path);
        }else{
            return new \Exception("Views with name: " . $titleView . " not found.");
        }
    }
    
    public function data($variable, $value){
        $this->data[] = [
            "variable" => $variable,
            "value" => $value,
        ];
    }
    
    public function loadDao($titleModel, $alias = ""){
        $className = Consts::NAME_SECTION . "\\dao\\" . $titleModel;
        if(class_exists($className)){
            $dao = new $className();
            if($alias === ""){
                $this->{$titleModel} = $dao;
            }else{
                $this->{$alias} = $dao;
            }
        }else{
            return new \Exception("Views with name: " . $titleView . " not found.");
        }
    }
    
}
