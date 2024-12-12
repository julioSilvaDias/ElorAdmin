<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Ciclo extends Model
{
    use HasFactory;

    public function ciclo_usuarios(): MorphToMany
    {
        return $this->morphToMany(Ciclo_usuario::class, 'ciclo_usuario');
    }
}
