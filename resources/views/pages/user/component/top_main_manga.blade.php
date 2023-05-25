<div class="flex flex-row top_main_manga gap-[4px]">
    <div class="flex flex-col gap-[4px] manga_side">
        <a href="{{ route('chapter', ['id' => $topMangaList->get(1)->latest_id]) }}" class="image_manga_container">
            <img src="{{ asset('storage/manga/' . $topMangaList->get(1)->id . '/image_large.jpg') }}" alt="">
            <div class="content_chapter">
                <span>
                    {{ $topMangaList->get(1)->latest_chapter }}
                </span>
            </div>
            <div class="content_title">
                <span>
                    {{ $topMangaList->get(1)->title }}
                </span>
            </div>
        </a>
        <a href="{{ route('chapter', ['id' => $topMangaList->get(2)->latest_id]) }}" class="image_manga_container">
            <img src="{{ asset('storage/manga/' . $topMangaList->get(2)->id . '/image_large.jpg') }}" alt="">
            <div class="content_chapter">
                <span>
                    {{ $topMangaList->get(2)->latest_chapter }}
                </span>
            </div>
            <div class="content_title">
                <span>
                    {{ $topMangaList->get(2)->title }}
                </span>
            </div>
        </a>
    </div>
    <div class="manga_middle">
        <a href="{{ route('chapter', ['id' => $topMangaList->get(0)->latest_id]) }}" class="image_manga_container h-full">
            <img src="{{ asset('storage/manga/' . $topMangaList->get(0)->id . '/image_large.jpg') }}" alt="">
            <div class="filter_hover">

            </div>

            <div class="flex flex-col justify-end group_title_genre">
                <div class="genre_middle">
                    @php
                        $genreList = $topMangaList->get(0)->genre_manga;
                        $genreText = '';
                        $numberOfEle = $genreList->count() - 1;
                        foreach ($genreList as $index => $genre) {
                            $genreText .= $genre->belong_to_genre->genre_name;
                            if ($index != $numberOfEle) {
                                $genreText .= ', ';
                            }
                        }
                    @endphp
                    <span>
                        Genre: {{ $genreText }}
                    </span>
                </div>
                <div class="title_middle">
                    <span>
                        {{ $topMangaList->get(0)->title }}
                    </span>
                </div>
            </div>
            <div class="content_chapter_middle">
                <div class="chapter_middle">
                    <span>
                        {{ $topMangaList->get(0)->latest_chapter }}
                    </span>
                </div>
            </div>
            <div class="flex flex-col description_chapter_middle">
                <span class="text_description_middle">
                    {{ $topMangaList->get(0)->description }}
                </span>
            </div>
        </a>
    </div>
    <div class="flex flex-col gap-[4px] manga_side">
        <a href="{{ route('chapter', ['id' => $topMangaList->get(3)->latest_id]) }}" class="image_manga_container">
            <img src="{{ asset('storage/manga/' . $topMangaList->get(3)->id . '/image_large.jpg') }}" alt="">
            <div class="content_chapter">
                <span>
                    {{ $topMangaList->get(3)->latest_chapter }}
                </span>
            </div>
            <div class="content_title">
                <span>
                    {{ $topMangaList->get(3)->title }}
                </span>
            </div>
        </a>
        <a href="{{ route('chapter', ['id' => $topMangaList->get(4)->latest_id]) }}" class="image_manga_container">
            <img src="{{ asset('storage/manga/' . $topMangaList->get(4)->id . '/image_large.jpg') }}" alt="">
            <div class="content_chapter">
                <span>
                    {{ $topMangaList->get(4)->latest_chapter }}
                </span>
            </div>
            <div class="content_title">
                <span>
                    {{ $topMangaList->get(4)->title }}
                </span>
            </div>
        </a>
    </div>
</div>
