<?php

function getTasks(){
    $pdo = new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8', 'root', '');
    $resultado= $pdo->prepare("SELECT * FROM tareas ");
    $resultado->execute(); // ejecuta
    $tareas = $resultado->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    return $tareas;
}

function addTask($nombre, $descripcion, $prioridad){
    $pdo = new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8', 'root', '');
    $resultado= $pdo->prepare("INSERT INTO tareas (nombre, descripcion, prioridad) VALUES (?,?,?)");
    $resultado->execute([$nombre, $descripcion, $prioridad]); // ejecuta
}



