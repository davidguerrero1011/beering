<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryCashBoxes extends Model
{
    use HasFactory;
    protected $fillable = ['net_income', 'description', 'user_id', 'date_entry'];
    public $timestamps = true;
}
