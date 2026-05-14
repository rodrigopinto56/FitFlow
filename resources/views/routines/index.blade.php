@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Mis Rutinas</h2>
    <a href="{{ route('routines.create') }}" class="btn btn-primary">+ Nueva Rutina</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Objetivo</th>
            <th>Día</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($routines as $routine)
        <tr>
            <td>{{ $routine->name }}</td>
            <td>{{ $routine->goal }}</td>
            <td>{{ $routine->day_of_week ?? 'Sin día' }}</td>
            <td>
                <span class="badge {{ $routine->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $routine->is_active ? 'Activa' : 'Inactiva' }}
                </span>
            </td>
            <td>
                <a href="{{ route('routines.show', $routine) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('routines.edit', $routine) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('routines.destroy', $routine) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('¿Eliminar esta rutina?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">No tienes rutinas registradas.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection