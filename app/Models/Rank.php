<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    protected $table = 'ranks';
    protected $fillable = [
        'comic_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
