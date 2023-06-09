<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'chapter_id',
        'user_id',
        'content'

    ];

    protected $table = 'chapter_comment';

    public $timestamps = false;

    public function belong_to_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
