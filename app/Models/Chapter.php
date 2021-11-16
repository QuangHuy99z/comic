<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapters';
    protected $guarded = [];

    public function chapter_images()
    {
        return $this->HasMany(ChapterImage::class);
    }
}
