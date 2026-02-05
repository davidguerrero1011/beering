<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'supplier_name',
        'address',
        'nit',
        'city_id',
        'email',
        'cellphone',
        'phone',
        'status'
    ];
    public $timestamps = true;


    public function inventary()
    {
        return $this->hasMany(Inventaries::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }
}
