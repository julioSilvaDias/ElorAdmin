<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public function usuariosAsignaturas()
{
    return $this->belongsToMany(Usuario::class, 'asignatura_usuario_horario')
                ->withPivot('asignatura_id')
                ->withTimestamps();
}

}
