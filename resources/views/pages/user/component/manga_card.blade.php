<div class="flex flex-col justify-center items-center gap-[8px] relative" id="{{ $index }}">
    <a href="" class="flex manga_card flex-col items-center w-full gap-[12px]">
        <img class="image_manga_card" src="{{ asset('storage/manga/2/image_logo.jpg') }}" alt="">
        <span class="title_manga_card">
            Duck Ngu Duck Ngu Duck Ngu Duck Ngu Duck Ngu Duck Ngu Duck Ngu Duck Ngu Duck Ngu
        </span>
    </a>
    @if(isset($following))
        @if($following)
            <i class="fa-regular fa-circle-xmark icon_remove_following" id="{{ $index }}" onclick="unFollow({{ $index }})"></i>
        @endif
    @endif

    <a href="" class="last_chapter_manga_card">
        Chapter 123
    </a>
</div>
@include('pages.user.component.description_tooltip')

