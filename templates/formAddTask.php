<?php

function showFormAddTask(){
    echo '  
    <form class="col-3 m-auto formAddTask" action="addTask" method="POST">
    
      <legend class="text-center">Agregar Tareas</legend>
      <div class="mb-3">
        <label class="form-label">Nombre de Tarea</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre">
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción de Tarea</label>
        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese descripción">
      </div>
      <div class="mb-3">
        <label class="form-label">Prioridad de Tarea</label>
        <select  name="prioridad" class="form-select">
          <option value="">Seleccione una prioridad</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary col-12">Submit</button>
  </form>
     ';
}