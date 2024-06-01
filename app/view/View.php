<?php

require_once "libs/Smarty.class.php";
require_once "helpers/AuthHelpers.php";

class View {


    protected $smarty;
   
    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign("base", BASE_URL);
        $this->smarty->assign("logeado", $this->isLogged());
    
    }

    private function isLogged(){
        return AuthHelpers::isLogged();
    }   
  
}