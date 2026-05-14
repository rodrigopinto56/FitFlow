@extends('layouts.app')

@section('content')
<h2>{{ $exercise->name }}</h2>
<p><strong>Grupo Muscular:</strong> {{ $exercise->muscle_group }}</p>
<p><strong>Dificultad:</strong> {{ $exercise->difficulty }}</p>
<p><strong>Descripción:</strong> {{ $exercise->description ?? 'Sin descripción' }}</p>
<a href="{{ route('exercises.index') }}" class="btn btn-secondary">Volver</a>
@endsection