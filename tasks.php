<?php

require_once "sql_tasks.php";

function showTasks(){
    echo ' 
    <!DOCTYPE html>
        <html lang="en">
        <head>
        <base href="'.BASE_URL.'">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </head>
        <body>';
        
        echo'
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TodoList</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="tareas">Tareas</a>
                    <a class="nav-link" href="about">About</a>
                    <a class="nav-link" href="login">Login</a>            
                </div>
                </div>
            </div>
        </nav>
        
        <form class="col-3 m-auto" action="addTask" method="POST">
            
            <legend class="text-center">Agregar tareas</legend>
            <div class="mb-3">
                <label class="form-label">Nombre de Tarea</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre de tarea">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción de Tarea</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Ingrese descripcion de tarea">
            </div>
            <div class="mb-3">
                <label class="form-label">Prioridad</label>
                <select class="form-select" name="prioridad">
                    <option value="">Seleccione una opcion</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary col-12">Submit</button>
        </form>';

        $tasks = getTasks();

         echo'
         <div class="container mt-2">
        
            <table class="table table-success table-hover text-center">
                <thead>
                    <tr>               
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Prioridad</th>
                        <th scope="col">Finalizada</th>
                    </tr>
                </thead>
                <tbody>';

                    foreach ($tasks as $task) {
                    
                        $col1 = "<td>$task->nombre</td>";
                        $col2 = "<td>$task->descripcion</td>";
                        $col3= "<td>$task->prioridad</td>";                
                        $col4 ="<td>$task->finalizada</td>";   
                        echo"</tr>$col1 $col2 $col3 $col4 </tr>";
                    }
                    
            echo' 
                </tbody>
            </table>
       
         </div>
         </body>
        </html>
    ';
}

function newTask(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && isset($_POST['prioridad']) && $_POST['prioridad'] !== ""){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $prioridad = $_POST['prioridad'];
            addTask($nombre, $descripcion, $prioridad);
            header("Location:" .BASE_URL. "tasks" ); //REDIRIJO A LA PAGINA DE TAREAS
        }else{
            echo"Faltan datos obligatorios";
        }
    }
}