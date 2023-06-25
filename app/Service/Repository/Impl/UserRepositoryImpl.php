<?php

namespace App\Service\Repository\Impl;

use App\Enum\UserRole;
use App\Enum\UserStatus;
use App\Helper\TokenGenerateHelper;
use App\Models\User;
use App\Service\Repository\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserRepositoryImpl implements UserRepository
{

    private User $user;

    private TokenGenerateHelper $tokenGenerateHelper;

    /**
     */
    public function __construct()
    {
        $this->user = new User();
        $this->tokenGenerateHelper = new TokenGenerateHelper();
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
            $user = new User();

            $user->full_name = $request->full_name;
            $user->nick_name = $request->nick_name;
            $user->password = sha1($request->password);
            $user->email = $request->login_id;
            $user->date_of_birth = $request->date_of_birth;
            $user->gender = $request->gender;
            $user->user_status = UserStatus::NOT_ACTIVE;
            $user->role = UserRole::USER;
            $user->email_verify_token = $this->tokenGenerateHelper->generateTokenString();
            $user->email_verify_token_expiry_at = Carbon::now()->addDays();

            $check = $user->save();

            if (!$check) {
                return $check;
            }

            return $user;

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

    public function activeUser($userId)
    {
        try {
            return $this->user->where('id', $userId)->update(
                array(
                    'email_verify_token' => null,
                    'email_verify_token_expiry_at' => null,
                    'email_verify_at' => Carbon::now(),
                    'user_status' => UserStatus::ACTIVE
                )
            );
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getUserByEmailVerifyToken($token)
    {
        try {
            return $this->user->where('email_verify_token', $token)->first();
        } catch (\Exception $e) {
            return false;
        }
    }
}
