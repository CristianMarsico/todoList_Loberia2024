<?php

class Model {

    protected $conexion;
    
    public function __construct()
    {
        $this->conexion = $this->createConexion();
    }


    function createConexion(){
        $host = 'localhost';
        $database = 'db_tareas';
        $userName = 'root';
        $password = '';
        try{
            $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
    
        }catch(Exception $e){
            var_dump($e);
        }
    
        return $db;
    }


}