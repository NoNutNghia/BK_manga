@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main gap-[12px]">
        <div class="flex flex-row items-center text-[#56ccf2] text-[20px] gap-[12px]">
            <i class="fa-solid fa-flag"></i>
            <span>
                Following Manga
            </span>
        </div>

            @php
                $listMangaFollowing = \Illuminate\Support\Facades\Auth::user()->followByUser
            @endphp
            @if(count($listMangaFollowing) > 0)
            <div class="grid grid-cols-6 w-full gap-[16px]">
                @foreach($listMangaFollowing as $following_ele)
                    @php
                        $mangaCard = $following_ele->belong_to_manga
                    @endphp
                    @include('pages.user.component.manga_card', ['following' => true, "mangaCard" => $mangaCard])
                @endforeach
            </div>

            @else
                <div class="flex flex-col justify-center items-center h-[60vh] uppercase text-[white] text-[28px]">
                    <span>
                        No any manga following
                    </span>
                </div>
            @endif

    </div>
@endsection

<script type="text/javascript">

    function getCSRFToken() {
        return '{{ csrf_token() }}'
    }

    function getUserId() {
        return '{{ \Illuminate\Support\Facades\Auth::id() }}'
    }

    function getUnfollowRoute() {
        return '{{ route('unfollow') }}'
    }

</script>

@section('script')
    <script src="{{ asset('assets/js/description_tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/following.js') }}"></script>
@endsection
