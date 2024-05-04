<?php
 require_once "app/model/TaskModel.php";
 require_once "app/view/TaskView.php";
 require_once "app/view/ErrorView.php";

class TaskController {

    private $model;
    private $view;
    private $err;

    public function __construct()
    {
        $this->model = new TaskModel();
        $this->view = new TaskView();
        $this->err = new ErrorView();
    }

    function showTasks(){
        $tareas = $this->model->getAllTasks();
        $this->view->showTasks($tareas);
    }

    function showTask($id){
        $tarea = $this->model->getTask($id);
        if($tarea){
            $this->view->showTask($tarea);
        }else{
            $this->err->showErr("No existe la tarea con id: $id");
        }
    }

    function deleteTask($id){
        $this->model->delete($id);
        header("Location:".BASE_URL."tasks");
    }
      

    function finalizeTask($id){
        $this->model->finalize($id);
        header("Location:".BASE_URL."tasks");
    }


    function newTask(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['nombre']) && !empty($_POST['descripcion'])&&
            isset($_POST['prioridad']) && $_POST['prioridad'] !== ""
            ){
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $prioridad = $_POST['prioridad'];
                $this->model->insertTask($nombre, $descripcion, $prioridad);
                header("Location:".BASE_URL."tasks");             

            }else{
                $this->err->showErr("Faltan datos");   
            }
        }
    }
      



}