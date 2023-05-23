<?php

namespace App\Enum;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class MangaStatus extends Enum implements LocalizedEnum
{
    public const COMPLETE = 1;

    public const IN_PROCESS = 2;

    public const DROPPED = 3;
}
