@extends('layouts.app')

@section('content')
<h2>Agregar Ejercicio a: {{ $routine->name }}</h2>

<form action="{{ route('routines.exercises.store', $routine) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Ejercicio</label>
        <select name="exercise_id" class="form-select @error('exercise_id') is-invalid @enderror">
            <option value="">-- Selecciona un ejercicio --</option>
            @foreach($exercises as $exercise)
                <option value="{{ $exercise->id }}">{{ $exercise->name }} ({{ $exercise->muscle_group }})</option>
            @endforeach
        </select>
        @error('exercise_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Series</label>
            <input type="number" name="sets" class="form-control" value="{{ old('sets', 3) }}" min="1">
        </div>
        <div class="col mb-3">
            <label class="form-label">Repeticiones</label>
            <input type="number" name="reps" class="form-control" value="{{ old('reps', 10) }}" min="1">
        </div>
        <div class="col mb-3">
            <label class="form-label">Descanso (segundos)</label>
            <input type="number" name="rest_seconds" class="form-control" value="{{ old('rest_seconds', 60) }}" min="0">
        </div>
        <div class="col mb-3">
            <label class="form-label">Orden</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', 1) }}" min="1">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
    <a href="{{ route('routines.show', $routine) }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection