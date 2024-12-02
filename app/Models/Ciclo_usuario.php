<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ciclo_usuario extends Model
{
    public function ciclos(): MorphToMany{
        return $this->morphTomany(Ciclo::class, 'ciclo_usuario');
    }

    public function users(): MorphToMany{
        return $this->morphTomany(User::class, 'ciclo_usuario');
    }
}
