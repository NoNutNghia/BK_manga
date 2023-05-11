<?php

namespace App\Service\Repository\Impl;

use App\Models\User;
use App\Service\Repository\UserRepository;

class UserRepositoryImpl implements UserRepository
{

    private User $user;

    /**
     */
    public function __construct()
    {
        $this->user = new User();
    }

    public function getUser($login_id, $password)
    {
        try {
            return $this->user->where(function ($query) use ($login_id) {
                $query->where('email', $login_id)
                    ->orWhere('nick_name', $login_id);
            })->where('password', $password)->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getUserById($id)
    {
        try {
            return $this->user->where(function ($query) use ($id) {
                $query->where('id', $id)
                    ->where('user_status', 1);
            })->first();
        } catch (\Exception $e) {
            return false;
        }
    }
}
