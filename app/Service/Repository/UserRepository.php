<?php

namespace App\Service\Repository;

interface UserRepository
{
    public function getUser($login_id, $password);

    public function getUserById($id);
}
