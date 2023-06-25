<?php

namespace App\Helper;

use Illuminate\Support\Str;

class TokenGenerateHelper
{
    public function generateTokenString()
    {
        return Str::random(20);
    }
}
