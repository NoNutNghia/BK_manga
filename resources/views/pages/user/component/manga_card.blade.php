<div class="manga_card_element" id="{{ $mangaCard->id }}">
    <div class="flex flex-col justify-center items-center gap-[8px] relative">
        <a href="{{ route('detail', ['id' => $mangaCard->id]) }}" class="flex manga_card flex-col items-center w-full gap-[12px]">
            <img class="image_manga_card" src="{{ asset('storage/manga/' . $mangaCard->id . '/image_logo.jpg') }}" alt="">
            <span class="title_manga_card">
                {{ $mangaCard->title }}
            </span>
        </a>
        @if(isset($following))
            @if($following)
                <i class="fa-regular fa-circle-xmark icon_remove_following" onclick="unFollow({{ $mangaCard->id }}, {{ $following_ele->id }})"></i>
            @endif
        @endif

        <a href="{{ route('chapter', ['id' => $mangaCard->latest_id]) }}" class="last_chapter_manga_card">
            {{ $mangaCard->latest_chapter }}
        </a>
    </div>
    @include('pages.user.component.description_tooltip', ['mangaCard' => $mangaCard])
</div>
