<div class="flex flex-col text-[white] gap-[8px] mt-[1rem]">
    <div class="flex flex-row items-center gap-[8px] text-[20px]">
        <i class="fa-solid fa-database"></i>
        <span>
            Chapter List
        </span>
    </div>

    <div class="flex flex-col chapter_list gap-[12px]">
        @foreach($foundManga->chapter_manga as $chapter)
            <div class="chapter">
                <a href="{{ route('chapter', ['id' => $chapter->id]) }}">
                    {{ $chapter->title }}
                </a>
                <span>
                    {{ $chapter->uploaded_at }}
                </span>
            </div>
        @endforeach
    </div>
</div>
