<div>
    <span>
        Reset password account BK Manga.
    </span>
</div>

<br>

<div>
    <span>
        This is email confirm your request reset password.
    </span>
</div>

<br>

<div>
    <span>
        ※If you do not want to reset password or feeling any sus here, please discard this email!
    </span>
</div>

<br>

<div>
    <span>
        ▼Click here URL to reset your password
    </span>
    <br>
    <a href="{{route('forgot.reset_password', ['reset_password_token' => $user->reset_password_token])}}">
        {{Config::get('app.url') . '/forgot/reset/password?reset_password_token=' . $user->reset_password_token}}
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
        If you have no idea about this email, again, please discard it.
    </span>
    <br>
    <span>
        Since this is a send-only email address, we cannot reply directly.
    </span>
</div>


