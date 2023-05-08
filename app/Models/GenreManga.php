<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreManga extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_id',
        'manga_id'
    ];

    protected $table = "genre_manga";
}
