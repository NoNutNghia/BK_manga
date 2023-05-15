<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'manga_id',
        'number_of_views'
    ];
    protected $table = 'view';

    public $timestamps = false;
}
