<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CicloUsuario extends Model
{
    use HasFactory;
    
    public function ciclos()
    {
        return $this->morphToMany(Ciclo::class, 'ciclo_usuario');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'ciclo_usuario');
    }
}