<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_name'
    ];

    protected $table = "genre";

    public function manga_belongs()
    {
        return $this->hasMany(GenreManga::class, 'genre_id', 'id');
    }
}
