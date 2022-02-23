<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class historial_laboral extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    use SoftCascadeTrait;
    protected $table='historial_laborales';
    protected $fillable = [
        'empresa',
        'cargo',
        'fecha_inicio',
        'fecha_terminacion',
        'users_id',
    ];
    function users()
    {
        return $this->belongsTo(User::class);
    }
}
