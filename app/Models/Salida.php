<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Salida
 *
 * @property $id
 * @property $empleado_id
 * @property $descripcion
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property SalidaMaterial[] $salidaMaterials
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Salida extends Model
{
    use HasFactory, LogsActivity;

    static $rules = [
        'descripcion' => 'required',
        'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id', 'descripcion', 'fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function materiales()
    {
        return $this->belongsToMany(Materiale::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['empleado_id', 'descripcion', 'fecha'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Nota de salida")
            ->useLogName('user');
    }
}
