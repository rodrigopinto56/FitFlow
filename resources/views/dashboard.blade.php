@extends('layouts.app')

@section('content')

{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 style="font-weight:700; color:#1a1a2e; margin:0;">
            Hola, {{ Auth::user()->name }} 👋
        </h2>
        <p style="color:#6c757d; margin:4px 0 0; font-size:0.95rem;">
            {{ now()->isoFormat('dddd, D [de] MMMM YYYY') }}
        </p>
    </div>
    <span style="background:{{ Auth::user()->role === 'admin' ? 'linear-gradient(135deg,#e94560,#c23152)' : 'linear-gradient(135deg,#0f3460,#1a1a2e)' }};
                 color:#fff; padding:0.4rem 1.1rem; border-radius:20px; font-size:0.8rem; font-weight:600; letter-spacing:0.05em;">
        {{ Auth::user()->role === 'admin' ? '⚡ ADMIN' : '👤 USUARIO' }}
    </span>
</div>

{{-- Tarjetas stats --}}
<div class="row g-3 mb-4">
    @if(Auth::user()->role === 'admin')
    <div class="col-md-4">
        <div style="background:#fff; border-radius:16px; padding:1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.06); border-left:4px solid #ffc107;">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p style="color:#6c757d; font-size:0.8rem; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 8px;">Ejercicios</p>
                    <h2 style="font-size:2.5rem; font-weight:700; color:#1a1a2e; margin:0;">{{ $totalExercises }}</h2>
                    <p style="color:#adb5bd; font-size:0.8rem; margin:4px 0 0;">en catálogo</p>
                </div>
                <div style="background:#fff8e1; width:50px; height:50px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">🏋️</div>
            </div>
            <a href="{{ route('exercises.index') }}" style="display:inline-block; margin-top:1rem; background:#ffc107; color:#000; padding:0.35rem 1rem; border-radius:8px; font-size:0.8rem; font-weight:600; text-decoration:none;">Gestionar →</a>
        </div>
    </div>
    <div class="col-md-4">
        <div style="background:#fff; border-radius:16px; padding:1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.06); border-left:4px solid #0dcaf0;">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p style="color:#6c757d; font-size:0.8rem; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 8px;">Usuarios</p>
                    <h2 style="font-size:2.5rem; font-weight:700; color:#1a1a2e; margin:0;">{{ $totalUsers }}</h2>
                    <p style="color:#adb5bd; font-size:0.8rem; margin:4px 0 0;">registrados</p>
                </div>
                <div style="background:#e3f8fc; width:50px; height:50px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">👥</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div style="background:#fff; border-radius:16px; padding:1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.06); border-left:4px solid #e94560;">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p style="color:#6c757d; font-size:0.8rem; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 8px;">Rutinas</p>
                    <h2 style="font-size:2.5rem; font-weight:700; color:#1a1a2e; margin:0;">{{ $totalRoutines }}</h2>
                    <p style="color:#adb5bd; font-size:0.8rem; margin:4px 0 0;">en el sistema</p>
                </div>
                <div style="background:#fdeef1; width:50px; height:50px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">📋</div>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6">
        <div style="background:#fff; border-radius:16px; padding:1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.06); border-left:4px solid #e94560;">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p style="color:#6c757d; font-size:0.8rem; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 8px;">Mis Rutinas Activas</p>
                    <h2 style="font-size:2.5rem; font-weight:700; color:#1a1a2e; margin:0;">{{ $myRoutines }}</h2>
                </div>
                <div style="background:#fdeef1; width:50px; height:50px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">📋</div>
            </div>
            <a href="{{ route('routines.index') }}" style="display:inline-block; margin-top:1rem; background:#e94560; color:#fff; padding:0.35rem 1rem; border-radius:8px; font-size:0.8rem; font-weight:600; text-decoration:none;">Ver rutinas →</a>
        </div>
    </div>
    <div class="col-md-6">
        <div style="background:#fff; border-radius:16px; padding:1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.06); border-left:4px solid #0f3460;">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p style="color:#6c757d; font-size:0.8rem; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 8px;">Ejercicios Disponibles</p>
                    <h2 style="font-size:2.5rem; font-weight:700; color:#1a1a2e; margin:0;">{{ $totalExercises }}</h2>
                </div>
                <div style="background:#e8eef5; width:50px; height:50px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">🏋️</div>
            </div>
        </div>
    </div>
    @endif
</div>

{{-- Tabla rutinas recientes --}}
<div style="background:#fff; border-radius:16px; box-shadow:0 2px 12px rgba(0,0,0,0.06); overflow:hidden;">
    <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #f0f2f5; display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h5 style="margin:0; font-weight:700; color:#1a1a2e;">Rutinas recientes</h5>
            <p style="margin:2px 0 0; color:#adb5bd; font-size:0.8rem;">Últimas rutinas registradas</p>
        </div>
        <a href="{{ route('routines.create') }}"
           style="background:linear-gradient(135deg,#e94560,#c23152); color:#fff; padding:0.5rem 1.2rem; border-radius:10px; font-size:0.85rem; font-weight:600; text-decoration:none;">
            + Nueva rutina
        </a>
    </div>
    <table class="table mb-0" style="font-size:0.9rem;">
        <thead style="background:#f8f9fa;">
            <tr>
                <th style="padding:0.85rem 1.5rem; color:#6c757d; font-weight:600; font-size:0.78rem; text-transform:uppercase; letter-spacing:0.05em; border:none;">Nombre</th>
                <th style="padding:0.85rem 1rem; color:#6c757d; font-weight:600; font-size:0.78rem; text-transform:uppercase; letter-spacing:0.05em; border:none;">Objetivo</th>
                <th style="padding:0.85rem 1rem; color:#6c757d; font-weight:600; font-size:0.78rem; text-transform:uppercase; letter-spacing:0.05em; border:none;">Día</th>
                <th style="padding:0.85rem 1rem; color:#6c757d; font-weight:600; font-size:0.78rem; text-transform:uppercase; letter-spacing:0.05em; border:none;">Estado</th>
                <th style="padding:0.85rem 1rem; border:none;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentRoutines as $routine)
            <tr style="border-top:1px solid #f0f2f5; transition:background 0.2s;" onmouseover="this.style.background='#fafafa'" onmouseout="this.style.background=''">
                <td style="padding:1rem 1.5rem; color:#1a1a2e; font-weight:500; border:none;">{{ $routine->name }}</td>
                <td style="padding:1rem; color:#6c757d; border:none;">{{ $routine->goal }}</td>
                <td style="padding:1rem; border:none;">
                    @if($routine->day_of_week)
                        <span style="background:#f0f2f5; color:#495057; padding:0.25rem 0.75rem; border-radius:20px; font-size:0.8rem;">{{ ucfirst($routine->day_of_week) }}</span>
                    @else
                        <span style="color:#adb5bd; font-size:0.85rem;">—</span>
                    @endif
                </td>
                <td style="padding:1rem; border:none;">
                    <span style="background:{{ $routine->is_active ? '#d4edda' : '#f0f2f5' }}; color:{{ $routine->is_active ? '#155724' : '#6c757d' }}; padding:0.25rem 0.75rem; border-radius:20px; font-size:0.8rem; font-weight:600;">
                        {{ $routine->is_active ? '● Activa' : '○ Inactiva' }}
                    </span>
                </td>
                <td style="padding:1rem; border:none;">
                    <a href="{{ route('routines.show', $routine) }}"
                       style="color:#e94560; text-decoration:none; font-size:0.85rem; font-weight:600;">Ver →</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding:3rem; color:#adb5bd; border:none;">
                    No hay rutinas aún. <a href="{{ route('routines.create') }}" style="color:#e94560;">¡Crea una!</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection