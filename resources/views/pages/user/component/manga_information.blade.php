<div class="flex flex-row manga_information gap-[24px]">
    <div class="w-[230px]">
        <img class="image_manga" src="{{ asset('storage/manga/' . $foundManga->id . '/image_logo.jpg') }}">
    </div>
    <div class="flex flex-col manga_information_detail gap-[8px]">
        <span class="title_manga">
            {{ $foundManga->title }}
        </span>
        <div>
            <i class="fa-solid fa-plus"></i>
            <span class="label_info">
                Other name
            </span>
            <span>
                {{ $foundManga->other_name }}
            </span>
        </div>
        <div>
            <i class="fa-solid fa-user"></i>
            <span class="label_info">
                Author
            </span>
            <span>
                {{ $foundManga->author_manga->author_name }}
            </span>

        </div>
        <div>
            <i class="fa-solid fa-signal"></i>
            <span class="label_info">
                Status
            </span>
            <span style="text-transform: capitalize">
                {{ $foundManga->status_manga->status_name }}
            </span>

        </div>
        <div>
            <i class="fa-solid fa-thumbs-up"></i>
            <span class="label_info">
                Number of likes
            </span>
            <span id="like_count">
                {{ count($foundManga->manga_likes) }}
            </span>

        </div>
        <div>
            <i class="fa-solid fa-heart"></i>
            <span class="label_info">
                Number of follows
            </span>
            <span id="follow_count">
                {{ count($foundManga->manga_follows) }}
            </span>

        </div>
        <div>
            <i class="fa-solid fa-eye"></i>
            <span class="label_info">
                Number of views
            </span>
            <span>
                {{ $foundManga->manga_views->number_of_views }}
            </span>

        </div>
        <div class="flex flex-row gap-[8px]">
            @foreach($foundManga->genre_manga as $genre_manga)
                <a href="{{ route('manga_genre', ['id' => $genre_manga->belong_to_genre->id]) }}" class="manga_genre">
                    {{ $genre_manga->belong_to_genre->genre_name }}
                </a>
            @endforeach
        </div>
        <div class="flex flex-row items-center mt-[4px] gap-[10px]">
            <a role="button" href="{{ route('chapter', ['id' => $foundManga->chapter_manga[0]->id]) }}" class="button_action button_read_begin">
                <i class="fa-solid fa-book"></i>
                <span>
                    Read Beginning
                </span>
            </a>
            <button class="button_action button_follow"
                    style="display: {{ !$existFollow ? 'flex' : 'none' }}"
            >
                <i class="fa-solid fa-heart"></i>
                <span>
                    Follow
                </span>
            </button>
            <button class="button_action button_unfollow"
                    style="display: {{ $existFollow ? 'flex' : 'none' }}"
                    id="{{ $existFollow ? $existFollow->id : '' }}"
            >
                <i class="fa-solid fa-heart-crack"></i>
                <span>
                    Unfollow
                </span>
            </button>
            <button class="button_action button_like"
                    style="display: {{ !$existLike ? 'flex' : 'none' }}"
            >
                <i class="fa-solid fa-thumbs-up"></i>
                <span>
                    Like
                </span>
            </button>
            <button class="button_action button_unlike"
                    style="display: {{ $existLike ? 'flex' : 'none' }}"
                    id="{{ $existLike ? $existLike->id : '' }}"
            >
                <i class="fa-solid fa-thumbs-down"></i>
                <span>
                    Unlike
                </span>
            </button>
        </div>

    </div>

</div>
