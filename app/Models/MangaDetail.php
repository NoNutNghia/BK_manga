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

    public function genre_manga()
    {
        return $this->hasMany(GenreManga::class, 'manga_id', 'manga_id');
    }

    public function author_manga()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function status_manga()
    {
        return $this->belongsTo(MangaStatus::class, 'manga_status', 'id');
    }

    public function manga_views()
    {
        return $this->hasOne(View::class, 'manga_id', 'manga_id');
    }

    public function manga_follows()
    {
        return $this->hasMany(Follow::class, 'manga_id', 'manga_id');
    }

    public function manga_likes()
    {
        return $this->hasMany(Like::class, 'manga_id', 'manga_id');
    }

    public function chapter_manga()
    {
        return $this->hasMany(Chapter::class, 'manga_id', 'manga_id')
            ->orderBy('chapter.uploaded_at', 'desc');
    }

    public function comment_manga()
    {
        return $this->hasMany(MangaComment::class, 'manga_id', 'manga_id');
    }
}
