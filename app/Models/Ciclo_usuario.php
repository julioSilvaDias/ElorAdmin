<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CicloUsuario extends Model
{
    protected $table = 'ciclo_usuario';
    protected $fillable = ['fecha_matricula', 'ciclo_id', 'usuario_id'];

    // Relación con Ciclo
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'ciclo_id');
    }

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}