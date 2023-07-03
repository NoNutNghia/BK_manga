@php
    $checkAdmin = \Illuminate\Support\Facades\Auth::user()->role
@endphp

<div class="flex flex-col w-[63%] gap-[12px]">
    <span class="text-[20px] text-[white]">
        Change password
    </span>
    <span class="error_message" id="error_change_password">
    </span>
    <div class="form_information">
        <span>
            Current password
        </span>
        <input type="password" class="input_auth" {{ $checkAdmin == \App\Enum\UserRole::USER ? '' : 'disabled' }} id="current_pass" name="current_pass">
        <p class="error_message" id="error_current_password">

        </p>
    </div>
    <div class="form_information">
        <span>
            New password
        </span>
        <input type="password" class="input_auth" {{ $checkAdmin == \App\Enum\UserRole::USER ? '' : 'disabled' }} id="new_pass" name="new_pass">
        <p class="error_message" id="error_new_password">

        </p>
    </div>
    <div class="form_information">
        <span>
            Confirm new password
        </span>
        <input type="password" class="input_auth" {{ $checkAdmin == \App\Enum\UserRole::USER ? '' : 'disabled' }} id="confirm_pass" name="confirm_pass">
        <p class="error_message" id="error_confirm_password">

        </p>
    </div>
    @if($checkAdmin == \App\Enum\UserRole::USER)
        <div class="flex flex-row justify-center">
            <button class="button_action button_follow" id="button_change_password">
                <span>
                    Change password
                </span>
            </button>
        </div>
    @endif
</div>
