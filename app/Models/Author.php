<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at'
    ];

    public function comics()
    {
        return $this->belongsToMany(Comic::class);
    }
}
