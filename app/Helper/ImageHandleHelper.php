<?php

namespace App\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

    public function genNewAvatarUser($userId)
    {
        return Storage::copy('public/avatar/register.jpeg', 'public/avatar/' . $userId . '/avatar.jpeg');
    }

    public function uploadNewMangaImage($arrayBase64StringFile, $mangaDetailID)
    {
        try {
            $imageLogo = $arrayBase64StringFile['image_logo'];
            $imageLarge = $arrayBase64StringFile['image_large'];
            $imgLogo = preg_replace('/^data:image\/\w+;base64,/', '', $imageLogo);
            $imgLarge = preg_replace('/^data:image\/\w+;base64,/', '', $imageLarge);

            $imgLogo = str_replace(' ', '+', $imgLogo);
            $imgLarge = str_replace(' ', '+', $imgLarge);

            $imageLogoName = 'image_logo.jpg';
            $imageLargeName = 'image_large.jpg';

            Storage::put('public/manga/' . $mangaDetailID . '/' . $imageLogoName, base64_decode($imgLogo));
            Storage::put('public/manga/' . $mangaDetailID . '/' . $imageLargeName, base64_decode($imgLarge));

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    public function uploadNewChapterImage($mangaID, $chapterID)
    {
        try {
            if (!Storage::exists('public/manga/' . $mangaID . '/chapter')) {
                Storage::makeDirectory('public/manga/' . $mangaID . '/chapter');
            }

            Storage::makeDirectory('public/manga/' . $mangaID . '/chapter/' . $chapterID);

            $imageList = Storage::disk('public')->allFiles('test/');

            foreach ($imageList as $imageDir) {
                Storage::copy('public/'. $imageDir, 'public/manga/' . $mangaID . '/chapter/'. $chapterID .'/' . pathinfo($imageDir)['basename']);
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function replaceImageManga($arrayBase64StringFile, $mangaDetailID)
    {
        try {
            $imageLogo = $arrayBase64StringFile['image_logo'];
            $imageLarge = $arrayBase64StringFile['image_large'];

            if ($imageLogo) {

                $imageLogoName = 'image_logo.jpg';

                if ( Storage::exists('public/manga/' . $mangaDetailID . '/' . $imageLogoName) ) {
                    Storage::delete('public/manga/' . $mangaDetailID . '/' . $imageLogoName);
                }

                $imgLogo = preg_replace('/^data:image\/\w+;base64,/', '', $imageLogo);

                $imgLogo = str_replace(' ', '+', $imgLogo);

                Storage::put('public/manga/' . $mangaDetailID . '/' . $imageLogoName, base64_decode($imgLogo));
            }

            if ($imageLarge) {

                $imageLargeName = 'image_large.jpg';

                if ( Storage::exists('public/manga/' . $mangaDetailID . '/' . $imageLargeName) ) {
                    Storage::delete('public/manga/' . $mangaDetailID . '/' . $imageLargeName);
                }

                $imgLarge = preg_replace('/^data:image\/\w+;base64,/', '', $imageLarge);

                $imgLarge = str_replace(' ', '+', $imgLarge);


                Storage::put('public/manga/' . $mangaDetailID . '/' . $imageLargeName, base64_decode($imgLarge));
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
