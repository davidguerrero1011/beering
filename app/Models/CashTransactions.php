<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashTransactions extends Model
{
    use HasFactory;
    protected $fillable = ['cash_box_id', 'transaction_type', 'transaction_id', 'amount' ];
    public $timestamps = true;
}
