<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'status'
    ];

    protected $table = 'user';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
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
}
