<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    use SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $softCascade = ['tabla_estudios','historial_laborales'];
    protected $fillable = [
        'cedula',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'telefono',
        'direccion',
        'email',
        'genero' ,
        'nacionalidad',
        'estado_civil',
        'fecha_nacimiento',
        'rh',
    ];
    function tabla_estudios()
    {
        return $this->hasMany(tabla_estudio::class,'users_id');
    }
    function historial_laborales()
    {
        return $this->hasMany(historial_laboral::class,'users_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
