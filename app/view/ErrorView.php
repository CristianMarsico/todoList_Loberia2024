<?php
require_once "app/view/View.php";





class ErrorView extends View{

    function showErr($msj){
      
        $this->smarty->assign("msj", $msj);
        $this->smarty->display('Error.tpl');
    }
}