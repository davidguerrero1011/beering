<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparations extends Model
{
    use HasFactory;
    protected $fillable = [ 'product_id', 'preparation', 'description', 'quantity', 'status' ];
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
