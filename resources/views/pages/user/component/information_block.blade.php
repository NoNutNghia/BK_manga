<div class="flex flex-col w-[63%] gap-[12px]">
    <div class="flex flex-col gap-[12px]">
        <div class="flex flex-row items-center justify-center">
            <div class="w-[100px]">
                <img src="{{ asset('storage/icon/pepesmile.ico') }}" class="avatar_user" alt="">
            </div>
        </div>
        <div class="flex flex-row items-center justify-center">
            <input type="file" id="upload-file" hidden />
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
            <input type="text" class="input_auth">
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
            <input type="text" class="input_auth">
        </div>
        <div class="form_information">
            <span>
                Nickname
            </span>
            <input type="text" class="input_auth">
        </div>
        <div class="form_information">
            <span>
                Date of Birth
            </span>
            <input type="date" class="input_auth">
        </div>
        <div class="form_information gender">
            <span>
                Gender
            </span>
            <div class="flex flex-row items-center gap-[8px] text-[white]">
                <input type="radio" name="gender" checked id="1" value="1">
                <label for="1">Male</label>
                <input type="radio" name="gender" id="2" value="2">
                <label for="2">Female</label>
                <input type="radio" name="gender" id="3" value="3">
                <label for="3">Other</label>
            </div>
        </div>
        <div class="flex flex-row items-center justify-center">
            <button class="button_action button_send_comment">
                <span>
                    Save
                </span>
            </button>
        </div>
    </div>
</div>
