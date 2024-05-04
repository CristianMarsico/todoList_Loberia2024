<?php

require_once "app/controller/TaskController.php";
require_once "app/controller/ErrController.php";

// definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    
    if (empty($_GET['action'])) {       
        $_GET['action'] = 'tasks';
    }

    $action = $_GET['action'];
    $parametro = explode('/', $action);
   
    //  print_r($parametro);
    switch ($parametro[0]) {
        case 'tasks':
            $controller = new TaskController();
            $controller->showTasks();
            break;

        case 'about':
            echo "about";
            break;

        case 'login':
            echo "login";
            break;

        case 'addTask':
            $controller = new TaskController();
            $controller->newTask();
            break;

        case 'delete':
            $controller = new TaskController();
            $controller->deleteTask($parametro[1]);
            break;

    
         case 'finalize':
            $controller = new TaskController();
            $controller->finalizeTask($parametro[1]);
            break;

        case 'show':
            $controller = new TaskController();
            $controller->showTask($parametro[1]);
            break;

        default:
           $err = new ErrController();
           $err->showErr("404 not found");
    }