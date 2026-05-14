@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>{{ $routine->name }}</h2>
    <a href="{{ route('routines.exercises.create', $routine) }}" class="btn btn-primary">+ Agregar Ejercicio</a>
</div>

<p><strong>Objetivo:</strong> {{ $routine->goal }}</p>
<p><strong>Día:</strong> {{ $routine->day_of_week ?? 'Sin día asignado' }}</p>
<p><strong>Estado:</strong>
    <span class="badge {{ $routine->is_active ? 'bg-success' : 'bg-secondary' }}">
        {{ $routine->is_active ? 'Activa' : 'Inactiva' }}
    </span>
</p>

<h4 class="mt-4">Ejercicios en esta rutina</h4>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Ejercicio</th>
            <th>Series</th>
            <th>Reps</th>
            <th>Descanso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($routine->routineExercises as $re)
        <tr>
            <td>{{ $re->order }}</td>
            <td>{{ $re->exercise->name }}</td>
            <td>{{ $re->sets }}</td>
            <td>{{ $re->reps }}</td>
            <td>{{ $re->rest_seconds }}s</td>
            <td>
                <form action="{{ route('routines.exercises.destroy', [$routine, $re]) }}" method="POST"
                      onsubmit="return confirm('¿Quitar este ejercicio?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Quitar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No hay ejercicios en esta rutina.</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('routines.index') }}" class="btn btn-secondary">Volver</a>
@endsection