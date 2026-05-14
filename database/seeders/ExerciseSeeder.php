<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $exercises = [
            ['name' => 'Press de banca',       'muscle_group' => 'Pecho',    'difficulty' => 'intermediate', 'description' => 'Ejercicio con barra acostado en banco.'],
            ['name' => 'Sentadilla',            'muscle_group' => 'Piernas',  'difficulty' => 'intermediate', 'description' => 'Sentadilla con barra en espalda.'],
            ['name' => 'Peso muerto',           'muscle_group' => 'Espalda',  'difficulty' => 'advanced',     'description' => 'Levantamiento de barra desde el suelo.'],
            ['name' => 'Dominadas',             'muscle_group' => 'Espalda',  'difficulty' => 'intermediate', 'description' => 'Jalones en barra fija.'],
            ['name' => 'Press militar',         'muscle_group' => 'Hombros',  'difficulty' => 'intermediate', 'description' => 'Press con barra sobre la cabeza.'],
            ['name' => 'Curl de bíceps',        'muscle_group' => 'Bíceps',   'difficulty' => 'beginner',     'description' => 'Curl con mancuernas o barra.'],
            ['name' => 'Extensión de tríceps',  'muscle_group' => 'Tríceps',  'difficulty' => 'beginner',     'description' => 'Extensión en polea alta.'],
            ['name' => 'Plancha',               'muscle_group' => 'Core',     'difficulty' => 'beginner',     'description' => 'Posición isométrica de plancha.'],
            ['name' => 'Zancadas',              'muscle_group' => 'Piernas',  'difficulty' => 'beginner',     'description' => 'Zancadas con peso corporal o mancuernas.'],
            ['name' => 'Remo con barra',        'muscle_group' => 'Espalda',  'difficulty' => 'intermediate', 'description' => 'Remo inclinado con barra.'],
            ['name' => 'Fondos en paralelas',   'muscle_group' => 'Tríceps',  'difficulty' => 'intermediate', 'description' => 'Fondos en barras paralelas.'],
            ['name' => 'Hip thrust',            'muscle_group' => 'Glúteos',  'difficulty' => 'beginner',     'description' => 'Empuje de cadera con barra.'],
        ];

        foreach ($exercises as $exercise) {
            Exercise::create($exercise);
        }
    }
}