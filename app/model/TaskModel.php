<?php
require_once "app/model/Model.php";

class TaskModel extends Model{

    function getAllTasks(){
        //abrimos la conexion;
        $db = $this->createConexion();
       
        //Enviar la consulta
        $sentencia = $db->prepare("SELECT * FROM tarea");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }
    
    function insertTask($nombre, $descr, $prioridad){
        //abrimos la conexion;
        $db = $this->createConexion();
       
        //Enviar la consulta
        $resultado= $db->prepare("INSERT INTO tarea (nombre, descripcion, prioridad) VALUES (?,?,?)");
        $resultado->execute([$nombre, $descr, $prioridad]); // ejecuta
    }
    
    
    function delete($id){
        $db = $this->createConexion();
        $resultado= $db->prepare("DELETE FROM tarea WHERE id = ?");
        $resultado->execute([$id]); // ejecuta
    }
    
    function finalize($id){
        $db = $this->createConexion();
        $resultado= $db->prepare("UPDATE tarea SET finalizada = ? WHERE id = ?");
        $resultado->execute([1,$id]); // ejecuta
    }
    
    function getTask($id){
        //abrimos la conexion;
        $db = $this->createConexion();
       
        //Enviar la consulta
        $sentencia = $db->prepare("SELECT * FROM tarea WHERE id = ?");
        $sentencia->execute([$id]);
        $tarea = $sentencia->fetch(PDO::FETCH_OBJ);
        return $tarea;
    }
}