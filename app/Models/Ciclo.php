<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Ciclo",
 *     title="Ciclo",
 *     description="Modelo de un ciclo",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="nombre", type="string", example="Ciclo 1"),
 *     @OA\Property(property="curso", type="string", example="2024"),
 *     @OA\Property(property="descripcion", type="string", example="Descripción del ciclo"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-02-10T12:34:56Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-02-10T12:34:56Z")
 * )
 */
class Ciclo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'curso', 'descripcion'];

    public function cicloUsuarios()
    {
        return $this->hasMany(CicloUsuario::class, 'id_ciclo');
    }

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }
}
