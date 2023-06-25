<?php

namespace App\Enum;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class UserGender extends Enum implements LocalizedEnum
{
    public const MALE = 1;

    public const FEMALE = 2;

    public const OTHER = 3;
}
