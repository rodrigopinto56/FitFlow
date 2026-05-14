@extends('layouts.guest')

@section('content')
<div class="badge-demo">✦ Bienvenido de vuelta</div>

@if ($errors->any())
    <div class="alert alert-danger mb-3">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Correo electrónico</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
               placeholder="tu@correo.com" required autofocus>
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
    </div>
    <div class="form-check mb-2">
        <input type="checkbox" name="remember" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Recordarme</label>
    </div>
    <button type="submit" class="btn-primary-custom">Iniciar sesión →</button>
</form>

<div class="auth-link">
    ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate gratis</a>
</div>
@endsection