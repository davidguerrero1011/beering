<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'birthday',
        'cellphone',
        'email',
        'address',
        'neightboarhood',
        'password',
        'city_id',
        'role_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [ 'password', 'remember_token' ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [ 'password' => 'hashed' ];


    public function city() 
    {
        return $this->belongsTo(Cities::class);
    }

    public function role() 
    {
        return $this->belongsTo(Roles::class);
    }

    public function cashBoxes() 
    {
        return $this->hasMany(CashBoxes::class);
    }

    public function cashInflows()
    {
        return $this->hasMany(CashInflows::class);
    }

}
