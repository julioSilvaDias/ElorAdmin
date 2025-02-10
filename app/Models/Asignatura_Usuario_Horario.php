<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Asignatura_Usuario_Horario extends Model
{
    use HasFactory;
    protected $table = 'asignatura_usuario_horario';

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }
}
