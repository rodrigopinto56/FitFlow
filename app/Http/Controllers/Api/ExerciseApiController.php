<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseApiController extends Controller
{
    public function index()
    {
        return response()->json(Exercise::all(), 200);
    }

    public function show(Exercise $exercise)
    {
        return response()->json($exercise, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'muscle_group' => 'required|string|max:100',
            'description'  => 'nullable|string',
            'difficulty'   => 'required|in:beginner,intermediate,advanced',
        ]);

        $exercise = Exercise::create($validated);
        return response()->json($exercise, 201);
    }

    public function update(Request $request, Exercise $exercise)
    {
        $validated = $request->validate([
            'name'         => 'sometimes|string|max:255',
            'muscle_group' => 'sometimes|string|max:100',
            'description'  => 'nullable|string',
            'difficulty'   => 'sometimes|in:beginner,intermediate,advanced',
        ]);

        $exercise->update($validated);
        return response()->json($exercise, 200);
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return response()->json(['message' => 'Ejercicio eliminado correctamente.'], 200);
    }
}