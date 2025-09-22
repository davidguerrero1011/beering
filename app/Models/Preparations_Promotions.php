<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparations_Promotions extends Model
{
    use HasFactory;
    protected $fillable = [ 'preparation_id', 'promotion_id' ];
    public $timestamps = true;
}
