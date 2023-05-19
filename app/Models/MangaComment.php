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

    public $timestamps = false;

    public function belong_to_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
