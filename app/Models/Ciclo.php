<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Ciclo extends Model
{
    public function ciclo_usuarios(): MorphToMany{
        return $this->morphTomany(Ciclo_usuario::class, 'ciclo_usuario');
    }
}
