<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $nit
 * @property $empresa
 * @property $created_at
 * @property $updated_at
 *
 * @property Entrada[] $entradas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    use HasFactory, LogsActivity;

    static $rules = [
        'nit' => 'required',
        'empresa' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nit', 'empresa'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradas()
    {
        return $this->hasMany('App\Models\Entrada', 'proveedore_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nit', 'empresa'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} proveedor")
            ->useLogName('user');
    }
}
