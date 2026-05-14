@extends('layouts.app')

@section('content')
<h2>Nueva Rutina</h2>

<form action="{{ route('routines.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Objetivo</label>
        <input type="text" name="goal" placeholder="Ej: Fuerza, Cardio, Resistencia"
               class="form-control @error('goal') is-invalid @enderror" value="{{ old('goal') }}">
        @error('goal') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Día de la semana</label>
        <select name="day_of_week" class="form-select">
            <option value="">-- Sin día asignado --</option>
            @foreach(['lunes','martes','miercoles','jueves','viernes','sabado','domingo'] as $dia)
                <option value="{{ $dia }}" {{ old('day_of_week') == $dia ? 'selected' : '' }}>
                    {{ ucfirst($dia) }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('routines.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection