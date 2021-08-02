<div class="card">
    <div class="card-body">
        <h5 class="card-title">Descripción</h5>
        <p class="card-text">{{$task->description}}</p>
        <h5 class="card-title">Usuario Asignado</h5>
        <p class="card-text">{{$task->userAssign->name}}</p>
        <h5 class="card-title">Usuario Creador</h5>
        <p class="card-text">{{$task->userCreator->name}}</p>
        <h5 class="card-title">Fecha Máxima de Ejecución</h5>
        <p class="card-text">{{$task->max_date_execution}}</p>
        <h5 class="card-title">Fecha de Creación de Tarea</h5>
        <p class="card-text">{{$task->created_at}}</p>
    </div>
</div>
<div style="margin: 30px;"></div>
<div class="card">
    <div class="card-header">
        Registros  <a href="{{route('form-log', ['task' => $task->id])}}" class="btn btn-primary">Agregar Registro</a>
    </div>
    <ul class="list-group list-group-flush">
        @if ($task->logs->count() > 0)
            @foreach ($task->logs as $log)
            <li class="list-group-item"><b>Comentario: </b>{{$log->comments}} - <b>Fecha Creación: </b> {{$log->created_at}}</li>
            @endforeach
        @else
            <li class="list-group-item">Sin Información</li>
        @endif
    </ul>
</div>
