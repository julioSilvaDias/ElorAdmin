<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CicloUsuario extends Model
{
    use HasFactory;
    
    protected $table = 'ciclo_usuario';
    protected $fillable = ['id_ciclo', 'id_usuario'];

    // Relación con Ciclo
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'id_ciclo');
    }

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}