<?php

class AuthHelpers{


    static public function getSession(){
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }
     
    /*Barrera de seguridad*/
    static public function checkLogged() {
       self::getSession();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header('Location: ' . BASE_URL . "login");
            die();  
        } else{

            return true;
        } 
    }

    /*Función o médoto que usado para determinar si el usuario está logeado*/
    static public function isLogged() {
        self::getSession();
        if (!isset($_SESSION['IS_LOGGED'])) {
            return false;
        } 
        return true;
    }   


    //UDS. AQUÍ PUEDEN CREAR FUNCIONES O METODOS QUE PRECISEN PARA SU SITIO, POR EJ., RETORNAR EL ROL DEL USUARIO.
}