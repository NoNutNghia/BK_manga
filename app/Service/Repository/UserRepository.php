<?php

namespace App\Service\Repository;

interface UserRepository
{
    public function getUser($login_id, $password);
}
