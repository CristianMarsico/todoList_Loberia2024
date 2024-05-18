<?php
require_once "libs/Smarty.class.php";


class TaskView {

  private $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }

  function showTasks($tareas){
    // assign para asignar varibles a smarty clave -> valor
    $this->smarty->assign("base", BASE_URL);
    $this->smarty->assign("cantidad", count($tareas));
    $this->smarty->assign("tareas", $tareas);

    // display para mostrar el template
    $this->smarty->display('tableTask.tpl');
  }
      

  function showTask($tarea){
    $this->smarty->assign("base", BASE_URL);
    $this->smarty->assign("tarea", $tarea);

    $this->smarty->display('showTask.tpl');
  }


}