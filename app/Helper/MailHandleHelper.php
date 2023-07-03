<?php

namespace App\Helper;

use App\Mail\ForgotPasswordOrder;
use App\Mail\RegisterOrder;
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
}
