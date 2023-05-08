<div class="w-[35%]">
    <div class="menu_personal">
        <a href="{{ route('personal.information') }}" class="flex flex-row items-center gap-[12px]">
            <i class="fa-solid fa-user"></i>
            <span>
                Manage personal information
            </span>
        </a>
        <hr>
        <a href="{{ route('personal.change_password') }}" class="flex flex-row items-center gap-[12px]">
            <i class="fa-solid fa-key"></i>
            <span>
                Change password
            </span>
        </a>
        <hr>
        <a href="{{ route('logout') }}" class="flex flex-row items-center gap-[12px]">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>
                Logout
            </span>
        </a>
    </div>
</div>
