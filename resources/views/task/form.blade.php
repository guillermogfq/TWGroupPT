<form action="{{route('create')}}" method="POST">
    @csrf
    <div class="form-group" style="margin-bottom: 30px;">
        <label for="description">Decripción</label>
        <input type="text" class="form-control @error('description') is-invalid @else is_valid @enderror" id="description" name="description" value="{{old('description', '')}}">
        <div class="invalid-feedback">
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 30px;">
        <label for="max_date_execution">Fecha Máxima de Ejecución</label>
        <input type="date" class="form-control @error('max_date_execution') is-invalid @else is_valid @enderror" id="max_date_execution" name="max_date_execution" value="{{old('max_date_execution', '')}}">
        <div class="invalid-feedback">
            @error('max_date_execution')
                <p>{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 30px;">
        <label for="user_assign_id">Usario asignado a la tarea</label>
        <select class="form-control @error('user_assign_id') is-invalid @else is_valid @enderror" id="user_assign_id" name="user_assign_id" value="{{old('user_assign_id', '')}}">
            <option value="-1">Eliga una opción</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('user_assign_id')
                <p>{{ $message }}</p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Crear Tarea</button>
</form>
