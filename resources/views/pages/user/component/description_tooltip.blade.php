<div class="description_tooltip">
    <div class="flex flex-col gap-[8px]">
        <span class="tooltip_title_manga">{{ $mangaCard->title }}</span>
        <div class="flex flex-row items-center gap-[4px]">
            <span>
                Status
            </span>
            <span>:</span>
            <span>
                {{ $mangaCard->status_manga->status_name }}
            </span>
        </div>
        <div class="flex flex-row items-center gap-[4px]">
            <span>
                View
            </span>
            <span>:</span>
            <span>
                {{ $mangaCard->manga_views->number_of_views }}
            </span>
        </div>
        <div class="flex flex-row items-center gap-[4px]">
            <span>
                Following
            </span>
            <span>:</span>
            <span>
                {{ count($mangaCard->manga_follows) }}
            </span>
        </div>
        <div class="flex flex-row gap-[2px] flex-wrap">
            @foreach($mangaCard->genre_manga as $genre)
                <div class="tooltip_genre_manga">
                    {{ $genre->belong_to_genre->genre_name }}
                </div>
            @endforeach
        </div>

        <div class="tooltip_description_manga">
            <span>
                {{ $mangaCard->description }}
            </span>
        </div>
    </div>
</div>
