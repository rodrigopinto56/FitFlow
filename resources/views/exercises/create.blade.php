@extends('layouts.app')

@section('content')
<h2>Nuevo Ejercicio</h2>

<form action="{{ route('exercises.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Grupo Muscular</label>
        <input type="text" name="muscle_group" class="form-control @error('muscle_group') is-invalid @enderror" value="{{ old('muscle_group') }}">
        @error('muscle_group') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Dificultad</label>
        <select name="difficulty" class="form-select @error('difficulty') is-invalid @enderror">
            <option value="beginner">Principiante</option>
            <option value="intermediate">Intermedio</option>
            <option value="advanced">Avanzado</option>
        </select>
        @error('difficulty') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection