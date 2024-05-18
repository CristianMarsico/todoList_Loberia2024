<?php

require_once "libs/Smarty.class.php";

class ErrorView{

     private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
  
    function showErr($msj){
      
        $this->smarty->assign("base", BASE_URL);
        $this->smarty->assign("msj", $msj);
        $this->smarty->display('Error.tpl');
    }
}