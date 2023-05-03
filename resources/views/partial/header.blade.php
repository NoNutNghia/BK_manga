<header class="flex flex-col ">
    <div class="flex flex-row items-center justify-between header">
        <div class="flex flex-row items-center">
            <a href="{{ route('main') }}">
                <img width="150px" src="{{ asset('storage/logo/Bkmanga.svg') }}" alt="">
            </a>
            <div class="flex flex-row items-center justify-between relative w-[400px]">
                <input type="text" class="input_search" placeholder="Type your manga you want to search">
                <i class="fa-solid fa-magnifying-glass icon_search"></i>
            </div>
        </div>
        <div class="flex flex-row items-center gap-[12px]">
            <button class="button_auth" id="login">
                <span>
                    Login
                </span>
            </button>
            <button class="button_auth" id="register">
                <span>
                    Register
                </span>
            </button>
            <div class="w-[52px]">
                <img src="{{ asset('storage/icon/pepesmile.ico') }}" class="avatar_user" id="personal_avatar" alt="">
                <div class="modal_user hidden_modal">
                    <a href="{{ route('personal.information') }}">
                        <span>
                            Personal Information
                        </span>
                    </a>
                    <a href="">
                        <span>
                            Logout
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row items-center relative">
        <ul class="flex flex-row items-center navigation">
            <li>
                <a href="{{ route('main') }}">
                    <span>
                        Main page
                    </span>
                </a>
            </li>
            <li id="genre">
                <a href="" class="gap-[4px]">
                    <span>
                        Genre
                    </span>
                    <i class="fa fa-caret-down"></i>
                </a>
            </li>


            <li id="ranking">
                <a href="" class="gap-[4px]">
                    <span>
                        Ranking
                    </span>
                    <i class="fa fa-caret-down"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('search') }}" class="gap-[4px]">
                    <span>
                        Search manga
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('following') }}" class="gap-[4px]">
                    <span>
                        Following
                    </span>
                </a>
            </li>
        </ul>
        <div class="content_hidden grid grid-cols-8 gap-[12px]" id="genre_hide">
            <div>
                <a href="">
                <span>
                    Duck ngu
                </span>
                </a>
            </div>

            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
        </div>
        <div class="content_hidden grid grid-cols-8 gap-[12px]" id="ranking_hide">
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
            <a href="">
                <span>
                    Duck ngu
                </span>
            </a>
        </div>
    </div>

</header>
<script src="{{asset('assets/js/header.js')}}"></script>
