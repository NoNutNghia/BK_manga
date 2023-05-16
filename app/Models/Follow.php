<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manga_id'
    ];

    protected $table = 'follow';

    public $timestamps = false;

    public function belong_to_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function belong_to_manga()
    {
        return $this->belongsTo(MangaDetail::class, 'manga_id', 'manga_id');
    }
}
