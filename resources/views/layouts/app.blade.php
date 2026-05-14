<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutinas de Ejercicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }

        .navbar-custom {
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            padding: 0.9rem 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .navbar-brand-custom {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none;
        }
        .navbar-brand-custom .logo-box {
            background: linear-gradient(135deg, #e94560, #c23152);
            width: 36px; height: 36px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
        }
        .navbar-brand-custom span {
            color: #fff; font-weight: 700; font-size: 1.1rem; letter-spacing: 0.03em;
        }
        .nav-links { display: flex; align-items: center; gap: 0.5rem; }
        .nav-links a {
            color: rgba(255,255,255,0.7); text-decoration: none;
            padding: 0.45rem 1rem; border-radius: 8px;
            font-size: 0.9rem; transition: all 0.2s;
        }
        .nav-links a:hover { background: rgba(255,255,255,0.1); color: #fff; }
        .nav-links a.admin-link { color: #ffc107; }
        .nav-links a.admin-link:hover { background: rgba(255,193,7,0.15); color: #ffc107; }
        .btn-logout {
            background: rgba(233,69,96,0.2); border: 1px solid rgba(233,69,96,0.4);
            color: #e94560; padding: 0.4rem 1rem; border-radius: 8px;
            font-size: 0.9rem; cursor: pointer; transition: all 0.2s;
        }
        .btn-logout:hover { background: rgba(233,69,96,0.35); color: #e94560; }

        .alert-success-custom {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            border: none; border-left: 4px solid #28a745;
            border-radius: 12px; color: #155724;
            padding: 0.85rem 1.25rem; margin-bottom: 1.5rem;
        }

        @yield('extra-styles')
    </style>
</head>
<body>

<nav class="navbar-custom d-flex justify-content-between align-items-center">
    <a href="{{ route('dashboard') }}" class="navbar-brand-custom">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px; margin-bottom: 1rem;">
    </a>
    <div class="nav-links">
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('exercises.index') }}" class="admin-link">⚡ Ejercicios</a>
            @endif
            <a href="{{ route('routines.index') }}">Mis Rutinas</a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn-logout">Salir →</button>
            </form>
        @endauth
    </div>
</nav>

<div class="container-fluid px-4 py-4" style="max-width:1200px; margin:0 auto;">
    @if(session('success'))
        <div class="alert-success-custom">
            ✓ {{ session('success') }}
        </div>
    @endif
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>