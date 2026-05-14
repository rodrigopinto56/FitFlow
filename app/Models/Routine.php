<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillable = ['user_id', 'name', 'goal', 'day_of_week', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function routineExercises()
    {
        return $this->hasMany(RoutineExercise::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'routine_exercises')
                    ->withPivot('sets', 'reps', 'rest_seconds', 'order')
                    ->withTimestamps();
    }
}