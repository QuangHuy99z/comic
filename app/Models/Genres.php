<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $fillable = [
        'name',
        'description',
        'slug',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Comic::class, 'genres_comic', 'genre_id', 'comic_id');
    }
}
