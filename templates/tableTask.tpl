{include 'htmlStart.tpl'}

{include 'formAddTask.tpl'}

<table class="table table-success table-striped mt-2">
    <thead>
    <tr>
    <th scope="col">Nombre</th>
    <th scope="col">Descripción</th>
    <th scope="col">Prioridad</th>
    <th scope="col">Finalizada</th>
    <th scope="col">Acciones</th>
    </tr>
</thead>

<tbody>

{if $cantidad == 0}
    <tr>
        <td colspan=5>No hay tareas para mostrar</td>
    </tr> 
{/if}

{foreach $tareas as $tarea}
    {$class = ($tarea->finalizada) ? "finalizada": ""}
    <tr class={$class}>
        <td>{$tarea->nombre}</td>
        <td>{$tarea->descripcion}</td>
        <td>{$tarea->prioridad}</td>
        {$estado = ($tarea->finalizada) ? "Tarea finalizada": "Sin finalizar"}
        <td>{$estado}</td>
        {if !$tarea->finalizada}
            <td>
                <a href='show/{$tarea->id}' class='btn btn-primary'>Ver</a>
                <a href='finalize/{$tarea->id}' class='btn btn-success'>Finalizar</a>
            </td>
        {else}    
            <td>            
              <a href='delete/{$tarea->id}' class='btn btn-danger'>Eliminar</a>
            </td>

        {/if}
    
    </tr>
{/foreach}


{include 'htmlEnd.tpl'}
