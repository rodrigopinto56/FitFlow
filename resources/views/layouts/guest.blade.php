<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutinas de Ejercicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
        }
        .auth-logo {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }
        .auth-title {
            color: #fff;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 0.2rem;
        }
        .auth-subtitle {
            color: rgba(255,255,255,0.5);
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }
        .form-label {
            color: rgba(255,255,255,0.8);
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .form-control {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px;
            color: #fff;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.12);
            border-color: #e94560;
            box-shadow: 0 0 0 3px rgba(233,69,96,0.2);
            color: #fff;
        }
        .form-control::placeholder { color: rgba(255,255,255,0.3); }
        .form-check-input {
            background-color: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.3);
        }
        .form-check-label { color: rgba(255,255,255,0.6); font-size: 0.9rem; }
        .btn-primary-custom {
            background: linear-gradient(135deg, #e94560, #c23152);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-weight: 600;
            padding: 0.75rem;
            width: 100%;
            font-size: 1rem;
            letter-spacing: 0.05em;
            transition: all 0.3s;
            margin-top: 0.5rem;
        }
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(233,69,96,0.4);
            color: #fff;
        }
        .auth-link {
            color: rgba(255,255,255,0.5);
            font-size: 0.9rem;
            text-align: center;
            margin-top: 1.5rem;
        }
        .auth-link a {
            color: #e94560;
            text-decoration: none;
            font-weight: 600;
        }
        .auth-link a:hover { text-decoration: underline; }
        .divider {
            border-color: rgba(255,255,255,0.1);
            margin: 1.5rem 0;
        }
        .alert-danger {
            background: rgba(233,69,96,0.15);
            border: 1px solid rgba(233,69,96,0.3);
            color: #ff8fa3;
            border-radius: 10px;
        }
        .badge-demo {
            background: rgba(233,69,96,0.2);
            border: 1px solid rgba(233,69,96,0.3);
            color: #e94560;
            border-radius: 20px;
            padding: 0.3rem 0.8rem;
            font-size: 0.75rem;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
<div class="auth-card">
    <div class="text-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 150px; margin-bottom: 1rem;">
    </div>
    <hr class="divider">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>