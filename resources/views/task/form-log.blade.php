<form action="{{route('create-log', ['task' => $task->id])}}" method="POST">
    @csrf
    <div class="form-group" style="margin-bottom: 30px;">
        <label for="comments">Comentario</label>
        <input type="text" class="form-control @error('comments') is-invalid @else is_valid @enderror" id="comments" name="comments" value="{{old('comments', '')}}">
        <div class="invalid-feedback">
            @error('comments')
                <p>{{ $message }}</p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Crear Tarea</button>
</form>
