<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Routine;
use App\Models\RoutineExercise;
use App\Models\User;

class RoutineSeeder extends Seeder
{
    public function run(): void
    {
        $juan  = User::where('email', 'juan@rutinas.com')->first();
        $maria = User::where('email', 'maria@rutinas.com')->first();

        // Rutinas de Juan
        $r1 = Routine::create(['user_id' => $juan->id,  'name' => 'Pecho y Tríceps', 'goal' => 'Fuerza',      'day_of_week' => 'lunes',    'is_active' => true]);
        $r2 = Routine::create(['user_id' => $juan->id,  'name' => 'Piernas',         'goal' => 'Hipertrofia', 'day_of_week' => 'miercoles','is_active' => true]);
        $r3 = Routine::create(['user_id' => $juan->id,  'name' => 'Espalda y Bíceps','goal' => 'Fuerza',      'day_of_week' => 'viernes',  'is_active' => true]);

        // Rutinas de María
        $r4 = Routine::create(['user_id' => $maria->id, 'name' => 'Full Body',       'goal' => 'Resistencia', 'day_of_week' => 'lunes',    'is_active' => true]);
        $r5 = Routine::create(['user_id' => $maria->id, 'name' => 'Core y Glúteos',  'goal' => 'Tonificación','day_of_week' => 'jueves',   'is_active' => true]);

        // Ejercicios en rutinas
        RoutineExercise::create(['routine_id' => $r1->id, 'exercise_id' => 1, 'sets' => 4, 'reps' => 10, 'rest_seconds' => 90,  'order' => 1]);
        RoutineExercise::create(['routine_id' => $r1->id, 'exercise_id' => 7, 'sets' => 3, 'reps' => 12, 'rest_seconds' => 60,  'order' => 2]);
        RoutineExercise::create(['routine_id' => $r1->id, 'exercise_id' => 11,'sets' => 3, 'reps' => 10, 'rest_seconds' => 60,  'order' => 3]);

        RoutineExercise::create(['routine_id' => $r2->id, 'exercise_id' => 2, 'sets' => 4, 'reps' => 8,  'rest_seconds' => 120, 'order' => 1]);
        RoutineExercise::create(['routine_id' => $r2->id, 'exercise_id' => 9, 'sets' => 3, 'reps' => 12, 'rest_seconds' => 60,  'order' => 2]);

        RoutineExercise::create(['routine_id' => $r3->id, 'exercise_id' => 3, 'sets' => 4, 'reps' => 6,  'rest_seconds' => 120, 'order' => 1]);
        RoutineExercise::create(['routine_id' => $r3->id, 'exercise_id' => 4, 'sets' => 3, 'reps' => 8,  'rest_seconds' => 90,  'order' => 2]);
        RoutineExercise::create(['routine_id' => $r3->id, 'exercise_id' => 6, 'sets' => 3, 'reps' => 12, 'rest_seconds' => 60,  'order' => 3]);

        RoutineExercise::create(['routine_id' => $r4->id, 'exercise_id' => 2, 'sets' => 3, 'reps' => 15, 'rest_seconds' => 60,  'order' => 1]);
        RoutineExercise::create(['routine_id' => $r4->id, 'exercise_id' => 8, 'sets' => 3, 'reps' => 30, 'rest_seconds' => 45,  'order' => 2]);

        RoutineExercise::create(['routine_id' => $r5->id, 'exercise_id' => 12,'sets' => 4, 'reps' => 15, 'rest_seconds' => 60,  'order' => 1]);
        RoutineExercise::create(['routine_id' => $r5->id, 'exercise_id' => 8, 'sets' => 3, 'reps' => 60, 'rest_seconds' => 30,  'order' => 2]);
    }
}