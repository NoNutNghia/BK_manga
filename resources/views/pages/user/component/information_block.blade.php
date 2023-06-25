<div class="flex flex-col w-[63%] gap-[12px]">
    <div class="flex flex-col gap-[12px]">
        <div class="flex flex-row items-center justify-center">
            <div class="w-[100px]">
                <img src="{{ asset('storage/avatar/' . $foundUser->id . '/avatar.jpeg') }}" class="avatar_user" id="avatar_user" alt="">
            </div>
        </div>
        <div class="flex flex-row items-center justify-center">
            <input type="file" accept="image/jpeg" id="upload-file" hidden />
            <label class="button_action button_follow" for="upload-file">Upload</label>
        </div>
    </div>

    <div class="flex flex-col gap-[8px]">
        <span class="text-[20px] text-[white]">
            Account Information
        </span>
        <div class="form_information">
            <span>
                Email
            </span>
            <input type="text" class="input_auth" value="{{ $foundUser->email }}" id="email" disabled>
        </div>
    </div>
    <div class="flex flex-col gap-[8px]">
        <span class="text-[20px] text-[white]">
            Personal Information
        </span>
        <div class="form_information">
            <span>
                Full name
            </span>
            <input type="text" class="input_auth" value="{{ $foundUser->full_name }}" id="info_full_name">
        </div>
        <span class="error_message" id="info_full_name_error">
        </span>
        <div class="form_information">
            <span>
                Nickname
            </span>
            <input type="text" class="input_auth" value="{{ $foundUser->nick_name }}" id="info_nick_name">
        </div>
        <span class="error_message" id="info_nick_name_error">
        </span>
        <div class="form_information">
            <span>
                Date of Birth
            </span>
            <input type="date" class="input_auth" value="{{ $foundUser->date_of_birth }}" id="info_date_of_birth">
        </div>
        <span class="error_message" id="info_date_of_birth_error">
        </span>
        <div class="form_information gender">
            <span>
                Gender
            </span>
            <div class="flex flex-row items-center gap-[8px] text-[white]">
                <input type="radio" name="gender" {{ $foundUser->gender == \App\Enum\UserGender::MALE ? 'checked' : '' }} value="{{ \App\Enum\UserGender::MALE }}" id="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" {{ $foundUser->gender == \App\Enum\UserGender::FEMALE ? 'checked' : '' }} value="{{ \App\Enum\UserGender::FEMALE }}" id="female">
                <label for="female">Female</label>
                <input type="radio" name="gender" {{ $foundUser->gender == \App\Enum\UserGender::OTHER ? 'checked' : '' }} value="{{ \App\Enum\UserGender::OTHER }}" id="other">
                <label for="other">Other</label>
            </div>
        </div>
        <span class="error_message" id="info_gender_error">
        </span>
        <div class="flex flex-row items-center justify-center">
            <button class="button_action button_send_comment" id="update_information">
                <span>
                    Save
                </span>
            </button>
        </div>
    </div>
</div>
