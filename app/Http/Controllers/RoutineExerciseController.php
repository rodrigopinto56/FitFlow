<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Exercise;
use App\Models\RoutineExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineExerciseController extends Controller
{
    public function create(Routine $routine)
    {
        $exercises = Exercise::all();
        return view('routine_exercises.create', compact('routine', 'exercises'));
    }

    public function store(Request $request, Routine $routine)
    {
        $request->validate([
            'exercise_id'  => 'required|exists:exercises,id',
            'sets'         => 'required|integer|min:1',
            'reps'         => 'required|integer|min:1',
            'rest_seconds' => 'required|integer|min:0',
            'order'        => 'required|integer|min:1',
        ]);

        RoutineExercise::create([
            'routine_id'   => $routine->id,
            'exercise_id'  => $request->exercise_id,
            'sets'         => $request->sets,
            'reps'         => $request->reps,
            'rest_seconds' => $request->rest_seconds,
            'order'        => $request->order,
        ]);

        return redirect()->route('routines.show', $routine)->with('success', 'Ejercicio agregado a la rutina.');
    }

    public function destroy(Routine $routine, RoutineExercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('routines.show', $routine)->with('success', 'Ejercicio eliminado de la rutina.');
    }
}