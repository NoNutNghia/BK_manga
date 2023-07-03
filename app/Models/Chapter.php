<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'manga_id',
        'uploaded_by',
        'updated_by'

    ];

    protected $table = 'chapter';

    public function parent_manga()
    {
        return $this->belongsTo(MangaDetail::class, 'manga_id', 'manga_id');
    }

    public function comment_chapter()
    {
        return $this->hasMany(ChapterComment::class, 'chapter_id', 'id');
    }

    public function person_update()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function person_upload()
    {
        return $this->belongsTo(User::class,'uploaded_by', 'id');
    }

}
