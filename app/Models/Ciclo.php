<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ciclo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function cicloUsuarios()
    {
        return $this->hasMany(CicloUsuario::class, 'id_ciclo');
    }
}
