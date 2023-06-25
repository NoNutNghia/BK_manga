<?php

namespace App\Service\Repository;

interface UserRepository
{
    public function getUser($login_id, $password);

    public function getUserById($id);

    public function getUserByEmailOrNickname($email, $nickname);

    public function createUser($request);

    public function getExistUserByNickName($nickname);

    public function changePersonalInformation($user, $data);

    public function activeUser($userId);

    public function getUserByEmailVerifyToken($token);
}
