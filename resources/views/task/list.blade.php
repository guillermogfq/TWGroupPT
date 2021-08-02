<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descripción</th>
      <th scope="col">Usuario Asignado</th>
      <th scope="col">Fecha Máxima de Ejecución</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
      @if ($tasks->count() > 0)
          @foreach ($tasks as $task)
            <tr class="@if($task->max_date_execution < now()) table-danger @endif">
                <td>{{$task->id}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->userAssign->name}}</td>
                <td>{{$task->max_date_execution}}</td>
                <td>
                    <a href="{{route('show', ['task' => $task->id])}}" class="btn btn-success">Mostrar</a>
                </td>
            </tr>
        @endforeach
      @else
        <tr>
            <td colspan="5">
                No hay registros para mostrar.
            </td>
        </tr>
      @endif
  </tbody>
</table>
