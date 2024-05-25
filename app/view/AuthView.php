<?php

require_once "app/view/View.php";


class AuthView extends View
{


  function showLogin($msj = null)
  {
    
    
    $this->smarty->assign("msj", $msj);
    $this->smarty->display('login.tpl');

 

  }
}
