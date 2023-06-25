<div>
    <span>
        Thank you for register account in BKManga!
    </span>
</div>

<br>

<div>
    <span>
        It's the last step to complete your account
    </span>
</div>

<br>

<div>
    <span>
        ※Verify email to comment, follow manga and more feature of BK Manga in the future!
    </span>
</div>

<br>

<div>
    <span>
        ▼Click here URL to verify your email
    </span>
    <br>
    <a href="{{route('verify_email', ['email_verify_token' => $user->email_verify_token])}}">
        {{Config::get('app.url') . '/verify?token=' . $user->email_verify_token}}
    </a>
</div>

<br>

<div>
    <span>
        ※URL is available in 24 hours。
    </span>
</div>
<div>
    <span>
    ―――――――――――――――――――――――――――
</span>
</div>
<div>
    <span>
        BK Manga Admin
    </span>
</div>

<div>
    <span>
        ―――――――――――――――――――――――――――
    </span>
</div>

<div>
    <span>
        If you have no idea about this email, please discard it.
    </span>
    <br>
    <span>
        Since this is a send-only email address, we cannot reply directly.
    </span>
</div>


