<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashInflows extends Model
{
    use HasFactory;
    protected $table = 'cash_inflows';
    protected $fillable = ['amount', 'description', 'user_id', 'transaction_Date' ];
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
