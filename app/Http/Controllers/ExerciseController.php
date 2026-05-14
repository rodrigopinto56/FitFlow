<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'muscle_group' => 'required|string|max:100',
            'description'  => 'nullable|string',
            'difficulty'   => 'required|in:beginner,intermediate,advanced',
        ]);

        Exercise::create($request->all());
        return redirect()->route('exercises.index')->with('success', 'Ejercicio creado correctamente.');
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'muscle_group' => 'required|string|max:100',
            'description'  => 'nullable|string',
            'difficulty'   => 'required|in:beginner,intermediate,advanced',
        ]);

        $exercise->update($request->all());
        return redirect()->route('exercises.index')->with('success', 'Ejercicio actualizado.');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('exercises.index')->with('success', 'Ejercicio eliminado.');
    }
}