<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name', 'muscle_group', 'description', 'difficulty'];

    public function routineExercises()
    {
        return $this->hasMany(RoutineExercise::class);
    }
}