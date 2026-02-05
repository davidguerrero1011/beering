<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparations extends Model
{
    use HasFactory;
    protected $fillable = [ 'product_id', 'preparation', 'description', 'quantity', 'status' ];
    public $timestamps = true;

    public function products()
    {
        return $this->hasManyThrough(Products::class, ProductsByPreparation::class, 'preparation_id', 'id', 'id', 'product_id');
    }

    public function productsByPreparation()
    {
        return $this->hasMany(ProductsByPreparation::class, 'preparation_id', 'id');
    }
}
