<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTableByUser extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id', 'club_table_id', 'start_date', 'end_date', 'status' ];
    public $timestamps = true;
}
