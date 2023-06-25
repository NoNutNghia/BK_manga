<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use function MongoDB\BSON\toJSON;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'nick_name',
        'gender',
        'date_of_birth',
        'email',
        'role',
        'status',
        'password',
        'email_verify_token',
        'email_verify_token_expiry_at'
    ];

    protected $table = 'user';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 'email_verify_token', 'email_verify_token_expiry_at'
    ];

    public $timestamps = true;

    public function statusUser()
    {
        return $this->belongsTo(UserStatus::class, 'status', 'id');
    }

    public function roleUser()
    {
        return $this->belongsTo(UserRole::class, 'role', 'id');
    }

    public function genderUser()
    {
        return $this->belongsTo(Gender::class, 'gender', 'id');
    }

    public function followByUser()
    {
        return $this->hasMany(Follow::class, 'user_id', 'id');
    }

    public function likeByUser()
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function comment_manga()
    {
        return $this->hasMany(MangaComment::class, 'user_id', 'id');
    }

    public function comment_chapter()
    {
        return $this->hasMany(ChapterComment::class, 'user_id', 'id');
    }
}
