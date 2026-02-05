<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsbyTable extends Model
{
    use HasFactory;
    protected $fillable = [ 'product_id', 'account_id', 'amont', 'prize', 'status' ];
    public $timestamps = true;
    protected $table = "products_by_tables";

    public function accounts()
    {
        return $this->belongsTo(AccountsByPayment::class, 'account_id');
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
