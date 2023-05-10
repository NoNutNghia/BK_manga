<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaStatus extends Model
{
    use HasFactory;
    protected $fillable = ['status_name'];
    protected $table = 'manga_status';
}
