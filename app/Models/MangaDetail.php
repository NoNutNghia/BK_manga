<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'manga_id',
        'manga_status',
        'author_id',
        'other_name',
        'age_range',
        'description'
    ];

    protected $table = "manga_detail";
}
