<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapters';
    protected $fillable = [
        'number',
        'comic_id',
        'created_at',
        'updated_at'
    ];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }

    public function chapter_images()
    {
        return $this->hasMany(ChapterImage::class, 'chapter_id', 'id');
    }

}