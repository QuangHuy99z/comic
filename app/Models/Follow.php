<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'follows';
    protected $fillable = [
        'comic_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
