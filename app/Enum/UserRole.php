<?php

namespace App\Enum;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class UserRole extends Enum implements LocalizedEnum
{
    public const USER = 1;

    public const ADMIN = 2;
}
