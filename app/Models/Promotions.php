<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    use HasFactory;
    protected $fillable = [ 'promotion', 'description', 'prize', 'start_date', 'end_date', 'status' ];
    public $timestamps = true;
}
