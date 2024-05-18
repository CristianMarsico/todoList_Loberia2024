{include 'htmlStart.tpl'}

<div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{$tarea->nombre}</li>
          <li class="list-group-item">{$tarea->descripcion}</li>
          <li class="list-group-item">Prioridad:{$tarea->prioridad}</li>
        </ul>
      </div>
<a href="tasks" class="btn btn-primary mt-3">Volver</a>

{include 'htmlEnd.tpl'}
