<?php
require_once "libs/Smarty.class.php";

class AuthView
{

  private $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }
  

  function showLogin($msj = null)
  {

    $this->smarty->assign("base", BASE_URL);
    $this->smarty->assign("msj", $msj);
    $this->smarty->display('login.tpl');

 

  }
}
