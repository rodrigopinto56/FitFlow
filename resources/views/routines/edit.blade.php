@extends('layouts.app')

@section('content')
<h2>Editar Rutina</h2>

<form action="{{ route('routines.update', $routine) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $routine->name) }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Objetivo</label>
        <input type="text" name="goal" class="form-control @error('goal') is-invalid @enderror"
               value="{{ old('goal', $routine->goal) }}">
        @error('goal') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Día de la semana</label>
        <select name="day_of_week" class="form-select">
            <option value="">-- Sin día asignado --</option>
            @foreach(['lunes','martes','miercoles','jueves','viernes','sabado','domingo'] as $dia)
                <option value="{{ $dia }}" {{ $routine->day_of_week == $dia ? 'selected' : '' }}>
                    {{ ucfirst($dia) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado</label>
        <select name="is_active" class="form-select">
            <option value="1" {{ $routine->is_active ? 'selected' : '' }}>Activa</option>
            <option value="0" {{ !$routine->is_active ? 'selected' : '' }}>Inactiva</option>
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar</button>
    <a href="{{ route('routines.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection