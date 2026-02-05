<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsByPreparation extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'id', 'product_id', 'preparation_id'];
    public $timestamps = true;

    public function products()
    {
        return $this->belongsToMany(Products::class, 'products_by_preparations', 'preparation_id', 'product_id');
    }
}
