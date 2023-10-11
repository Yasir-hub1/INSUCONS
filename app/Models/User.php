<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    static $rules = [
        'ci' => 'required',
        'name' => 'required',
        'telefono' => 'required',
        'email' => 'required',
    ];

    protected $fillable = [
        'ci',
        'name',
        'telefono',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'permissions'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} user")
            ->useLogName('user');
    }
    //Query Scope
 public function scopeName($query,$name){
    if($name){
        return $query->where('name','LIKE',"%$name%");
    }
 }
 public function scopeEmail($query,$email){
    if($email){
        return $query->where('email','LIKE',"%$email%");
    }
 }
 public function scopeFecha($query,$fecha){
    if($fecha){
        return $query->where('created_at','LIKE',"%$fecha%");
    }
 }
}
