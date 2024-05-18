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
                    header("Location:" . BASE_URL . "tasks");
                } else {
                    $this->view->showLogin("Usuario incorrecto");
                }
            } else {
                $this->view->showLogin("faltan datos obligatorios");
            }
        }
    }
}
