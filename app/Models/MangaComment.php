<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'manga_id',
        'content'
       
    ];

    protected $table = 'manga_comment';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


}
