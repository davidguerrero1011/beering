<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];
    public $timestamps = true;

    public function cities()
    {
        return $this->hasMany(Cities::class);
    }
}
