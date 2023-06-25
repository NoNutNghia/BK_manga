<?php

namespace App\Enum;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class UserStatus extends Enum implements LocalizedEnum
{
    public const ACTIVE = 1;

    public const DISABLE = 2;

    public const NOT_ACTIVE = 3;
}
