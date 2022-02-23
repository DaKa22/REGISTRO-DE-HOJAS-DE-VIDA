<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
class tabla_estudio extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    use SoftCascadeTrait;
    protected $fillable = [
        'titulo',
        'entidad_educativa',
        'fecha_terminacion',
        'users_id',
    ];
    function users()
    {
        return $this->belongsTo(User::class);
    }
}
