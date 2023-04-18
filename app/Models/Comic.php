<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    protected $table = 'comics';
    protected $fillable = [
        'title',
        'name',
        'content',
        'slug',
        'status',
        'created_at',
        'updated_at'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genres::class, 'genres_comic', 'comic_id', 'genre_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function first_chapter()
    {
        return $this->hasOne(Chapter::class)->oldest();
    }

    public function last_chapter()
    {
        return $this->hasOne(Chapter::class)->latest();
    }

    public function ranks()
    {
        return $this->hasMany(Rank::class);
    }
}
