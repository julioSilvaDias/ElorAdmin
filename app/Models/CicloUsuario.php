<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CicloUsuario extends Model
{
    use HasFactory;
    
    protected $table = 'ciclo_usuario';
    protected $fillable = ['id_ciclo', 'id_usuario', 'fecha_matricula'];

    // Relación con Ciclo
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'ciclo_id');
    }

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}