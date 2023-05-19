<?php

namespace App\Enum;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class CommentTarget extends Enum implements LocalizedEnum
{
    public const MANGA = 1;

    public const CHAPTER = 2;
}
