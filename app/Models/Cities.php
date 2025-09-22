<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'country_id', 'status'];
    public $timestamps = true;

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
