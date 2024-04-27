<?php

require_once "tasks.php";

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
            showTasks();
            break;

        case 'about':
            echo "about";
            break;

        case 'login':
            echo "login";
            break;

        case 'addTask':
            newTask();
            break;

        case 'delete':
            deleteTask($parametro[1]);
            break;

    
        case 'finalize':
            finalizeTask($parametro[1]);
            break;

        case 'show':
            showTask($parametro[1]);
            break;

        default:
        //    TODO:: hacer algo
    }