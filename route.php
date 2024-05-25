<?php
require_once "app/controller/AuthController.php";
require_once "app/controller/TaskController.php";
require_once "app/controller/ErrController.php";

// definimos la base url de forma dinamica
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


if (empty($_GET['action'])) {
    $_GET['action'] = 'login';
}

$action = $_GET['action'];
$parametro = explode('/', $action);

//  print_r($parametro);
switch ($parametro[0]) {

    // LO CORRESPONDIENTE A TAREAS
    case 'tasks':
        $controller = new TaskController();
        $controller->showTasks();
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

    // CORRESPONDIETE A LOGIN-AUTENTICACIÓN
    case 'login':
            $controller = new AuthController();
            $controller->showLogin();
            break;


    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'verify':
        $controller = new AuthController();
        $controller->verify();
        break;

    // CASOS DE EJEMPLO
    case 'hash':
        // CASO DE EJEMPLO
        $pass = "12345";
        echo md5($pass);
        echo "<br>";
        echo "<br>";
        // PARA EL MOMENTO DE REGISTRAR UN USUARIO UDS. DEBEN USAR ÉSTE ÚLTIMO
        echo password_hash ($pass, PASSWORD_DEFAULT);  
        break;

    case 'about':
        echo "about";
        break;


    default:
        $err = new ErrController();
        $err->showErr("404 not found");
}
