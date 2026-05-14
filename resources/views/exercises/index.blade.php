@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Ejercicios</h2>
    <a href="{{ route('exercises.create') }}" class="btn btn-primary">+ Nuevo Ejercicio</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Grupo Muscular</th>
            <th>Dificultad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($exercises as $exercise)
        <tr>
            <td>{{ $exercise->name }}</td>
            <td>{{ $exercise->muscle_group }}</td>
            <td>{{ $exercise->difficulty }}</td>
            <td>
                <a href="{{ route('exercises.show', $exercise) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('exercises.edit', $exercise) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('exercises.destroy', $exercise) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('¿Eliminar este ejercicio?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">No hay ejercicios registrados.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection