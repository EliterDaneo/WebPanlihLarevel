<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable =[
        'judul_playlist',
        'slug',
        'gambar_playlist',
        'is_active',
        'diskripsi',
        'user_id'
    ];

    protected $hidden = [];

    public function users(){
         return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
