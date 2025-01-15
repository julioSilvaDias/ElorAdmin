<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Horario extends Model
{
    use HasFactory;
    public function usuariosAsignaturas()
    {
        return $this->belongsToMany(User::class, 'asignatura_usuario_horario')
            ->withPivot('asignatura_id')
            ->withTimestamps();
    }
    protected $fillable = [
        'dia-semana',
        'hora',  
    ];
}
