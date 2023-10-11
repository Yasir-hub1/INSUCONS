<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Proyecto
 *
 * @property $id
 * @property $nombre
 * @property $ubicacion
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $estado
 * @property $empleado_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contrato[] $contratos
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyecto extends Model
{
    use HasFactory, LogsActivity;

    static $rules = [
        'nombre' => 'required',
        'ubicacion' => 'required',
        'fecha_inicio' => 'required',
        'fecha_fin' => 'required',
        'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'ubicacion', 'fecha_inicio', 'fecha_fin', 'estado', 'empleado_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Informe()
    {
        return $this->hasMany('App\Models\Informe','informe_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'ubicacion', 'fecha_inicio', 'fecha_fin', 'estado', 'empleado_id'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} proyecto")
            ->useLogName('user');
    }
}
