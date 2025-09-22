<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubTables extends Model
{
    use HasFactory;
    protected $fillable = [
        'table',
        'number',
        'state',
        'status'
    ];
    public $timestamps = true;

    public function accounts()
    {
        return $this->hasMany(AccountsByPayment::class, 'club_table_id');
    }

    public function music()
    {
        return $this->belongsToMany(Music::class, 'music_by_tables');
    }
}
