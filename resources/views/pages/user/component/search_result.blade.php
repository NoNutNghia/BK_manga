@if(count($foundManga) > 0)
    <div class="flex flex-col">
        @foreach($foundManga as $manga)
            <a href="{{ route('detail', ['id' => $manga->manga_id]) }}" class="flex flex-row search_element gap-[8px]">
                <div class="w-[65px]">
                    <img src="{{ asset('storage/manga/' . $manga->manga_id . '/image_logo.jpg') }}" alt="">
                </div>
                <div class="flex flex-col text-[white]">
                    <span class="text-[18px]">
                        {{ $manga->title }}
                    </span>
                    <span class="text-[14px]">
                        {{ $manga->other_name }}
                    </span>
                    <span class="text-[14px]">{{ $manga->latest_chapter }}</span>
                </div>
            </a>
        @endforeach
    </div>
    @else
    <div class="flex flex-col items-center justify-center p-[1rem]">
        <span class="text-[white]">
            No manga found
        </span>
    </div>
@endif

