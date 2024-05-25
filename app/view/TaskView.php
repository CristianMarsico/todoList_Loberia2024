<?php

require_once "app/view/View.php";



class TaskView extends View{

 
  function showTasks($tareas){
   
    // assign para asignar varibles a smarty clave -> valor
  
    $this->smarty->assign("cantidad", count($tareas));
    $this->smarty->assign("tareas", $tareas);

    // display para mostrar el template
    $this->smarty->display('tableTask.tpl');
  }
      

  function showTask($tarea){
  
    $this->smarty->assign("tarea", $tarea);

    $this->smarty->display('showTask.tpl');
  }


}