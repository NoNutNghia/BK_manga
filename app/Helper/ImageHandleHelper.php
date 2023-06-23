<?php

namespace App\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageHandleHelper
{
    public function uploadImage($base64StringFile)
    {
        $checkDelete = Storage::delete('public/avatar/' . Auth::id() . '/avatar.jpeg');

        if (!$checkDelete) {
            return false;
        }

        $img = preg_replace('/^data:image\/\w+;base64,/', '', $base64StringFile);
        $img = str_replace(' ', '+', $img);

        $avatarName = 'avatar.jpeg';

        return Storage::put('public/avatar/' . Auth::id() . '/' . $avatarName, base64_decode($img));
    }
}
