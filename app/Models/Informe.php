<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Informe
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $fecha
 * @property $proyecto_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Informe extends Model
{
    use HasFactory, LogsActivity;

    static $rules = [
        'titulo' => 'required',
        'descripcion' => 'required',
        'fecha' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'descripcion', 'fecha','proyecto_id'];

    public function Proyecto(){
        return $this->hasOne('App\Models\Informe','id','informe_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['titulo', 'descripcion', 'fecha'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} informe")
            ->useLogName('user');
    }
}
