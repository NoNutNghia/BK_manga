<header class="flex flex-col ">
    <div class="flex flex-row items-center justify-between header">
        <div class="flex flex-row items-center">
            <a href="{{ route('main') }}">
                <img width="150px" src="{{ asset('storage/logo/Bkmanga.svg') }}" alt="">
            </a>
            <div class="flex flex-row items-center justify-between relative w-[400px]">
                <input type="text" class="input_search" placeholder="Type your manga you want to search" id="input_search">
                <i class="fa-solid fa-magnifying-glass icon_search"></i>
                <div id="search_result"></div>
            </div>
        </div>
        <div class="flex flex-row items-center gap-[12px]">
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="w-[52px]">
                    <img src="{{ asset('storage/icon/pepesmile.ico') }}" class="avatar_user" id="personal_avatar" alt="">
                    <div class="modal_user hidden_modal">
                        <a href="{{ route('personal.information', ['id' => \Illuminate\Support\Facades\Auth::id()]) }}">
                        <span>
                            Personal Information
                        </span>
                        </a>
                        <a href="{{ route('logout') }}">
                        <span>
                            Logout
                        </span>
                        </a>
                    </div>
                </div>
            @else
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
            @endif
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
                <a href="{{ route('search.index') }}" class="gap-[4px]">
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
        <div class="content_hidden grid grid-cols-8 gap-[12px]" id="genre_hide"></div>
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
<script type="text/javascript">

    function getCSRFToken() {
        return '{{ csrf_token() }}'
    }

    function getLoginRoute() {
        return '{{ route('login') }}'
    }

    function getGenreRoute() {
        return "{{ route('genre') }}"
    }

    function getSearchTitleRoute() {
        return "{{ route('search.title') }}"
    }

</script>
<script src="{{asset('assets/js/header.js')}}"></script>
