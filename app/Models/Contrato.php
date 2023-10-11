<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Contrato
 *
 * @property $id
 * @property $cliente_id
 * @property $proyecto_id
 * @property $presupuesto_id
 * @property $factura_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Documento[] $documentos
 * @property Empleado $empleado
 * @property Factura $factura
 * @property Presupuesto $presupuesto
 * @property Proyecto $proyecto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contrato extends Model
{
    use HasFactory, LogsActivity;

    static $rules = [
        'usuario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario', 'nombre', 'user_id', 'proyecto_id', 'presupuesto_id', 'factura_id', 'descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentos()
    {
        return $this->hasMany('App\Models\Documento', 'contrato', 'id');
    }


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
    public function factura()
    {
        return $this->hasOne('App\Models\Factura', 'id', 'factura_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function presupuesto()
    {
        return $this->hasOne('App\Models\Presupuesto', 'id', 'presupuesto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'proyecto_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['usuario', 'nombre', 'cliente_id', 'proyecto_id', 'presupuesto_id', 'factura_id', 'descripcion'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Contrato")
            ->useLogName('user');
    }
}
