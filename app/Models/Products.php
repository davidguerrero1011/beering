<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [ 'product', 'category_id', 'units', 'prize_unit', 'status' ];
    public $timestamps = true;

    public function inventary()
    {
        return $this->hasMany(Inventaries::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function productsByTables()
    {
        return $this->hasMany(ProductsbyTable::class);
    }
}
