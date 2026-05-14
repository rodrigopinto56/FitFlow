@extends('layouts.app')

@section('content')
<h2>Editar Ejercicio</h2>

<form action="{{ route('exercises.update', $exercise) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $exercise->name) }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Grupo Muscular</label>
        <input type="text" name="muscle_group" class="form-control @error('muscle_group') is-invalid @enderror" value="{{ old('muscle_group', $exercise->muscle_group) }}">
        @error('muscle_group') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description', $exercise->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Dificultad</label>
        <select name="difficulty" class="form-select">
            <option value="beginner" {{ $exercise->difficulty == 'beginner' ? 'selected' : '' }}>Principiante</option>
            <option value="intermediate" {{ $exercise->difficulty == 'intermediate' ? 'selected' : '' }}>Intermedio</option>
            <option value="advanced" {{ $exercise->difficulty == 'advanced' ? 'selected' : '' }}>Avanzado</option>
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar</button>
    <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection