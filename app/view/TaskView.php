<?php
// require_once "sql_tasks.php";
require_once "templates/formAddTask.php";
require_once "templates/htmlStar.php";
require_once "templates/htmlEnd.php";

class TaskView {

  function showTasks($tareas){

      htmlStart();
      showFormAddTask();
      
      echo'
      <table class="table table-success table-striped mt-2">
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
      $col5 = !$tarea->finalizada ?
      
      "<td>
                <a href='show/$tarea->id' class='btn btn-primary'>Ver</a>
                <a href='finalize/$tarea->id' class='btn btn-success'>Finalizar</a>
            </td>"
        :
          "<td>            
              <a href='delete/$tarea->id' class='btn btn-danger'>Eliminar</a>
            </td>"
            ;
    
      $class = $tarea->finalizada ? "finalizada": "";
    
        echo"<tr class='$class'>$col1 $col2 $col3 $col4 $col5</tr>";
    }
      
    echo'  
      </tbody>
    </table>
      ';
    
      htmlEnd();
    
  }
      

  function showTask($tarea){
    htmlStart();

    echo '
      <div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">'.$tarea->nombre.'</li>
          <li class="list-group-item">'.$tarea->descripcion.'</li>
          <li class="list-group-item">Prioridad:'.$tarea->prioridad.'</li>
        </ul>
      </div>
      <a href="tasks" class="btn btn-primary mt-3">Volver</a>
    ';
    htmlEnd();
  }


}