<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes;
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    public function roles(): BelongsTo{
        return $this->belongsTo(Rol::class, 'role_id', 'id');
    }
    public function asignaturas_horarios(){
        return $this->belongsToMany(Asignatura::class, 'asignatura_usuario_horario')
                ->withPivot('horario_id')
                ->withTimestamps();

    }

    public function reuniones(): HasMany {
        return $this->hasMany(Reunion::class);
    }

    public function ciclos()
    {
        return $this->belongsToMany(Ciclo::class, 'ciclo_usuario', 'id_usuario', 'id_ciclo');
    }

    public function cicloUsuarios()
    {
        return $this->hasMany(CicloUsuario::class, 'usuario_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
