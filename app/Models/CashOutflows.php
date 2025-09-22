<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashOutflows extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'description', 'user_id', 'transaction_Date' ];
    public $timestamps = true;
}
