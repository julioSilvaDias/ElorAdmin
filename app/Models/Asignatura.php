<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    
    public function usuariosHorarios()
{
    return $this->belongsToMany(Usuario::class, 'asignatura_usuario_horario')
                ->withPivot('horario_id')
                ->withTimestamps();
}

}
