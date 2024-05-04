<?php
 require_once "app/view/ErrorView.php";
class ErrController{

private $err;

public function __construct()
{
    $this->err = new ErrorView;
}

function showErr($msj){
    $this->err->showErr($msj);
}

}