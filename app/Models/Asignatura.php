<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ciclo;

class Asignatura extends Model
{
    use HasFactory;

    public function usuariosHorarios()
    {
        return $this->belongsToMany(User::class, 'asignatura_usuario_horario')
            ->withPivot('horario_id')
            ->withTimestamps();
    }

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }

    protected $fillable = ['nombre'];
}
