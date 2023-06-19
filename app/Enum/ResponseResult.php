<?php

namespace App\Enum;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class ResponseResult extends Enum implements LocalizedEnum
{
    public const SUCCESS = true;

    public const FAILURE = false;
}
