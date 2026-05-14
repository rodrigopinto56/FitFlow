@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h2>Bienvenido/a, {{ Auth::user()->name }} 👋</h2>
        <span class="badge bg-{{ Auth::user()->role === 'admin' ? 'danger' : 'primary' }} fs-6">
            {{ Auth::user()->role === 'admin' ? 'Administrador' : 'Usuario' }}
        </span>
    </div>
</div>

{{-- Tarjetas de resumen --}}
<div class="row mb-4">
    @if(Auth::user()->role === 'admin')
    <div class="col-md-4 mb-3">
        <div class="card border-warning text-center">
            <div class="card-body">
                <h1 class="display-4">{{ $totalExercises }}</h1>
                <p class="card-text text-muted">Ejercicios en catálogo</p>
                <a href="{{ route('exercises.index') }}" class="btn btn-warning btn-sm">Gestionar</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-info text-center">
            <div class="card-body">
                <h1 class="display-4">{{ $totalUsers }}</h1>
                <p class="card-text text-muted">Usuarios registrados</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-success text-center">
            <div class="card-body">
                <h1 class="display-4">{{ $totalRoutines }}</h1>
                <p class="card-text text-muted">Rutinas en el sistema</p>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6 mb-3">
        <div class="card border-success text-center">
            <div class="card-body">
                <h1 class="display-4">{{ $myRoutines }}</h1>
                <p class="card-text text-muted">Mis rutinas activas</p>
                <a href="{{ route('routines.index') }}" class="btn btn-success btn-sm">Ver rutinas</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-primary text-center">
            <div class="card-body">
                <h1 class="display-4">{{ $totalExercises }}</h1>
                <p class="card-text text-muted">Ejercicios disponibles</p>
            </div>
        </div>
    </div>
    @endif
</div>

{{-- Rutinas recientes --}}
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Rutinas recientes</strong>
        <a href="{{ route('routines.create') }}" class="btn btn-sm btn-primary">+ Nueva</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Objetivo</th>
                    <th>Día</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentRoutines as $routine)
                <tr>
                    <td>{{ $routine->name }}</td>
                    <td>{{ $routine->goal }}</td>
                    <td>{{ $routine->day_of_week ?? '—' }}</td>
                    <td>
                        <span class="badge {{ $routine->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $routine->is_active ? 'Activa' : 'Inactiva' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('routines.show', $routine) }}" class="btn btn-sm btn-outline-info">Ver</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-3">No hay rutinas aún. ¡Crea una!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection