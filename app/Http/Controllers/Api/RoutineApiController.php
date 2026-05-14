<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineApiController extends Controller
{
    public function index()
    {
        $routines = Routine::with('exercises')->where('user_id', Auth::id())->get();
        return response()->json($routines, 200);
    }

    public function show(Routine $routine)
    {
        $routine->load('exercises');
        return response()->json($routine, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'goal'        => 'required|string|max:100',
            'day_of_week' => 'nullable|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
        ]);

        $routine = Routine::create([
            ...$validated,
            'user_id'   => Auth::id(),
            'is_active' => true,
        ]);

        return response()->json($routine, 201);
    }

    public function update(Request $request, Routine $routine)
    {
        $validated = $request->validate([
            'name'        => 'sometimes|string|max:255',
            'goal'        => 'sometimes|string|max:100',
            'day_of_week' => 'nullable|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'is_active'   => 'sometimes|boolean',
        ]);

        $routine->update($validated);
        return response()->json($routine, 200);
    }

    public function destroy(Routine $routine)
    {
        $routine->delete();
        return response()->json(['message' => 'Rutina eliminada correctamente.'], 200);
    }
}