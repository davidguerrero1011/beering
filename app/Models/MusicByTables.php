<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicByTables extends Model
{
    use HasFactory;
    protected $table = "music_by_tables";
    protected $fillable = [ 'id', 'music_id', 'club_table_id' ];
    public $timestamps = true;
}
