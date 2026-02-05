<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $fillable = [ 'song', 'artist', 'order', 'status' ];
    public $timestamps = true;

    public function clubTables()
    {
        return $this->belongsToMany(ClubTables::class, 'music_by_tables', 'music_id', 'club_table_id')->withPivot('id');
    }
}
