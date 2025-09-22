<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaries extends Model
{
    use HasFactory;
    protected $fillable = [ 'product_id', 'supplier_id', 'amont', 'prize', 'status' ];
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
}
