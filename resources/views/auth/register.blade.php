@extends('layouts.guest')

@section('content')
<div class="badge-demo">✦ Crea tu cuenta</div>

@if ($errors->any())
    <div class="alert alert-danger mb-3">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre completo</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
               placeholder="Tu nombre" required autofocus>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo electrónico</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
               placeholder="tu@correo.com" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="Mínimo 8 caracteres" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña" required>
    </div>
    <button type="submit" class="btn-primary-custom">Crear cuenta →</button>
</form>

<div class="auth-link">
    ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
</div>
@endsection