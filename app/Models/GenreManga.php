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

    public function belong_to_manga()
    {
        return $this->belongsTo(MangaDetail::class, 'manga_id', 'manga_id');
    }

    public function belong_to_genre()
    {
        return $this->belongsTo(Genre::class,'genre_id', 'id');
    }
}
