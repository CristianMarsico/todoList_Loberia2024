<?php

 require_once "tasks.php";
// definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


    if (empty($_GET['action'])) {       
        $_GET['action'] = 'tasks';
    }

    //  print_r($GLOBALS);
    // echo __LINE__;
    $action = $_GET['action'];
    $parametro = explode('/', $action);
   
    //  print_r($parametro);
    switch ($parametro[0]) {
        case 'tasks':
            showTasks();
            break; 

        case 'addTask':
            newTask();
            break;   
        
         case 'about':
            echo "about";
            break;  
        
        case 'login':
            echo "login";
            break;        
            
        default:
            echo '404 not found';
            break;
    }