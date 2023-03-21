<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable =[
        'judul',
        'body',
        'kategori_id',
        'user_id',
        'is_active',
        'views',
        'slug',
        'gambar_artikel'
    ];

    protected $hidden =[];

    /**
     * The roles that belong to the Artikel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
