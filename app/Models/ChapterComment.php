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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
