<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\RoutineExerciseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Rutas autenticadas (admin y user)
Route::middleware(['auth'])->group(function () {

   Route::get('/dashboard', function () {
    $user = Auth::user();
    $totalExercises = \App\Models\Exercise::count();

    if ($user->role === 'admin') {
        $totalUsers    = \App\Models\User::count();
        $totalRoutines = \App\Models\Routine::count();
        $recentRoutines = \App\Models\Routine::latest()->take(5)->get();
        $myRoutines    = 0;
    } else {
        $totalUsers    = 0;
        $totalRoutines = 0;
        $myRoutines    = \App\Models\Routine::where('user_id', $user->id)->where('is_active', true)->count();
        $recentRoutines = \App\Models\Routine::where('user_id', $user->id)->latest()->take(5)->get();
    }

    return view('dashboard', compact(
        'totalExercises', 'totalUsers', 'totalRoutines', 'myRoutines', 'recentRoutines'
    ));
})->middleware(['auth'])->name('dashboard');

    // Rutinas — cualquier usuario autenticado
    Route::resource('routines', RoutineController::class);
    Route::resource('routines.exercises', RoutineExerciseController::class);
});

// Rutas solo admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('exercises', ExerciseController::class);
});

require __DIR__.'/auth.php';