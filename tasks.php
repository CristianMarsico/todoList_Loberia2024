<?php

require_once "sql_tasks.php";
require_once "templates/htmlStar.php";
require_once "templates/htmlEnd.php";
require_once "templates/formAddTask.php";

function showTasks(){

  htmlStart();
  showFormAddTask();
  
  echo'
  <div class="container col-12">
  <table class="table table-success table-striped mt-2 text-center">
    <thead>
      <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Prioridad</th>
      <th scope="col">Finalizada</th>
      <th scope="col">Acciones</th>
    </tr>
    </thead>
  <tbody>';
  
  $tareas = getAllTasks();
  if(count($tareas) == 0){
     echo"<tr>
         <td colspan=5>No hay tareas para mostrar</td>
     </tr>";
  }
  foreach ($tareas as $tarea) {
    $col1 = "<td>$tarea->nombre</td>";
    $col2 = "<td>$tarea->descripcion</td>";
    $col3 = "<td>$tarea->prioridad</td>";
    $estado = $tarea->finalizada ? "Tarea finalizada": "Sin finalizar";
    $col4 = "<td>$estado</td>";
    $col5 = !$tarea->finalizada 
    ?
       "<td>
            <a href='show/$tarea->id' class='btn btn-primary'>Ver</a>
            <a href='finalize/$tarea->id' class='btn btn-success'>Finalizar</a>
        </td>"
    :
      "<td>            
          <a href='delete/$tarea->id' class='btn btn-danger'>Eliminar</a>
      </td>";

     $class = $tarea->finalizada ? "finalizada": "";

     echo"<tr class='$class'>$col1 $col2 $col3 $col4 $col5</tr>";
  }
 
echo'  
    </tbody>
  </table>
  </div>';

  htmlEnd();

}


function newTask(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
      if(!empty($_POST['nombre']) && !empty($_POST['descripcion'])&&
        isset($_POST['prioridad']) && $_POST['prioridad'] !== ""){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $prioridad = $_POST['prioridad'];
            insertTask($nombre, $descripcion, $prioridad);
            header("Location:".BASE_URL."task");
        }else{
            echo "faltan datos";    
        }
    }
}

function deleteTask($id){
  delete($id);
  header("Location:".BASE_URL."task");
}

function finalizeTask($id){
  finalize($id);
  header("Location:".BASE_URL."task");
}

function showTask($id){
  htmlStart();

  $tarea = getTask($id);
  echo '
      <div class="card mt-4" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Tarea: '.$tarea->nombre.'</li>
          <li class="list-group-item">Descrip: '.$tarea->descripcion.'</li>
          <li class="list-group-item">Prioridad:'.$tarea->prioridad.'</li>
        </ul>
      </div>
      <a href="tasks" class="btn btn-secondary mt-2">Ir a inicio</a>'
      ;

  htmlEnd();
}