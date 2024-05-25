<?php
require_once 'app/view/AuthView.php';
require_once 'app/model/AuthModel.php';
class AuthController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new AuthView();
        $this->model = new AuthModel();
    }

    function showLogin()
    {
        $this->view->showLogin();
    }

    function verify()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $usuario = $this->model->getUser($email);

                if ($usuario && password_verify($password, $usuario->password)) {

                    session_start();
                    $_SESSION['IS_LOGGED'] = true;
                    $_SESSION['USERNAME'] = $usuario->email;
                    $_SESSION['ROLE'] = $usuario->rol;
                    
                    header("Location:" . BASE_URL . "tasks");die();
                } else {
                    $this->view->showLogin("Usuario incorrecto");
                }
            } else {
                $this->view->showLogin("faltan datos obligatorios");
            }
        }
    }

    function logout(){
        session_start();
        session_destroy();
        header("Location:" . BASE_URL . "login");die();

    }


}
