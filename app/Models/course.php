<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\Playlist;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
}
