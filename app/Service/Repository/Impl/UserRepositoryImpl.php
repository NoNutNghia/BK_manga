<?php

namespace App\Service\Repository\Impl;

use App\Models\User;
use App\Service\Repository\UserRepository;
use Carbon\Carbon;

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

    public function getUserByEmailOrNickname($email, $nickname)
    {
        try {
            return $this->user->where(function ($query) use ($nickname, $email) {
                $query->where('email', $email)
                    ->orWhere('nick_name', $nickname);
            })->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function createUser($request) {
        try {
            return $this->user->insert(array(
                array(
                    'full_name' => $request->full_name,
                    'nick_name' => $request->nick_name,
                    'password' => sha1($request->password),
                    'email' => $request->login_id,
                    'date_of_birth' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'user_status' => 1,
                    'role' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                )
            ));
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getExistUserByNickName($nickname)
    {
        try {
            return $this->user->select('id')->where('nick_name', $nickname)->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function changePersonalInformation($user, $data)
    {
        try {
            $user->update(array(
                'nick_name' => $data->nick_name,
                'full_name' => $data->full_name,
                'gender' => (int) $data->gender,
                'date_of_birth' => $data->date_of_birth
            ));

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
