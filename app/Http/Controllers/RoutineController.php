<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
    public function index()
    {
        $routines = Auth::user()->isAdmin()
            ? Routine::with('user')->get()
            : Routine::where('user_id', Auth::id())->get();

        return view('routines.index', compact('routines'));
    }

    public function create()
    {
        return view('routines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'goal'        => 'required|string|max:100',
            'day_of_week' => 'nullable|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
        ]);

        Routine::create([
            'user_id'     => Auth::id(),
            'name'        => $request->name,
            'goal'        => $request->goal,
            'day_of_week' => $request->day_of_week,
            'is_active'   => true,
        ]);

        return redirect()->route('routines.index')->with('success', 'Rutina creada correctamente.');
    }

    public function show(Routine $routine)
    {
        $this->authorizeRoutine($routine);
        $routine->load('exercises');
        return view('routines.show', compact('routine'));
    }

    public function edit(Routine $routine)
    {
        $this->authorizeRoutine($routine);
        return view('routines.edit', compact('routine'));
    }

    public function update(Request $request, Routine $routine)
    {
        $this->authorizeRoutine($routine);

        $request->validate([
            'name'        => 'required|string|max:255',
            'goal'        => 'required|string|max:100',
            'day_of_week' => 'nullable|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'is_active'   => 'boolean',
        ]);

        $routine->update($request->all());
        return redirect()->route('routines.index')->with('success', 'Rutina actualizada.');
    }

    public function destroy(Routine $routine)
    {
        $this->authorizeRoutine($routine);
        $routine->delete();
        return redirect()->route('routines.index')->with('success', 'Rutina eliminada.');
    }

    private function authorizeRoutine(Routine $routine)
    {
        if (Auth::user()->role !== 'admin' && $routine->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para acceder a esta rutina.');
        }
    }
}