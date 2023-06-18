<?php

namespace App\Enum;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class ResponseResult extends Enum implements LocalizedEnum
{
    public const SUCCESS = 1;

    public const FAILURE = 2;
}
