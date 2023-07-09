<?php

namespace App\Helper;

use App\Mail\BanUserOrder;
use App\Mail\ForgotPasswordOrder;
use App\Mail\RegisterOrder;
use App\Mail\UnbanUserOrder;
use Illuminate\Support\Facades\Mail;

class MailHandleHelper
{
    public function sendRegisterMail($registerObject)
    {
        return Mail::queue(new RegisterOrder($registerObject));
    }

    public function sendForgotMail($forgotObject)
    {
        return Mail::queue(new ForgotPasswordOrder($forgotObject));
    }

    public function sendBanMail($user)
    {
        return Mail::queue(new BanUserOrder($user));
    }

    public function sendUnbanMail($user)
    {
        return Mail::queue(new UnbanUserOrder($user));
    }
}
