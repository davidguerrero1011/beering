<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashBoxes extends Model
{
    use HasFactory;
    protected $fillable = ['net_income', 'description', 'user_id', 'date_entry', 'status' ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
