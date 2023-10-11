<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Servicio
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $costo
 * @property $created_at
 * @property $updated_at
 *
 * @property PresupuestoServicio[] $presupuestoServicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    use HasFactory, LogsActivity;

    static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'costo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'costo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function presupuestos()
    {
        return $this->belongsToMany(Presupuesto::class);
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
            ->logOnly(['nombre', 'descripcion', 'costo'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} servicio")
            ->useLogName('user');
    }
}
