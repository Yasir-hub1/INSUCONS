<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Nota
 *
 * @property $id
 * @property $empleado_id
 * @property $proveedore_id
 * @property $tipo_id
 * @property $descripcion
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Proveedore $proveedore
 * @property Tipo $tipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nota extends Model
{
    use HasFactory, LogsActivity;

    static $rules = [
        'usuario'=> 'required',
		'descripcion' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario','proveedore_id','tipo_id','descripcion','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    /* public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedore_id');
    } */
    public function proveedore()
    {
        return $this->hasOne(Proveedore::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipo()
    {
        return $this->hasOne('App\Models\Tipo', 'id', 'tipo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materiales()
    {
        return $this->belongsToMany(Materiale::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['empleado_id','proveedore_id','tipo_id','descripcion','fecha'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Notas")
            ->useLogName('user');
    }
}
