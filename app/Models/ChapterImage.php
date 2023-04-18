<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterImage extends Model
{
    use HasFactory;
    protected $table = 'chapter_images';
    protected $fillable = [
        'chapter_id',
        'image',
        'created_at',
        'updated_at'
    ];
}
