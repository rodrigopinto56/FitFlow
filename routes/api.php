<?php

use App\Http\Controllers\Api\ExerciseApiController;
use App\Http\Controllers\Api\RoutineApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Login para obtener token
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }

    $token = $request->user()->createToken('api-token')->plainTextToken;
    return response()->json(['token' => $token], 200);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('exercises', ExerciseApiController::class);
    Route::apiResource('routines', RoutineApiController::class);
});