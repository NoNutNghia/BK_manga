<div class="flex flex-col chapter_navigation gap-[12px]">
    {{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('chapter', $chapterObject['foundChapter'], $chapterObject['parentManga']) }}
    @if(isset($navigation_top))
        @if($navigation_top)
            <div class="flex flex-row items-center gap-[8px] text-[white]">
                <span class="text-[20px]">
                    {{ $chapterObject['parentManga']->title }} - {{ $chapterObject['foundChapter']->title }}
                </span>
                <span>
                    (Updated at {{ $chapterObject['foundChapter']->uploaded_at }})
                </span>
            </div>
        @endif
    @endif
    <div class="flex flex-row items-center w-full justify-center gap-[8px]">
        @if ($previousChapterId)
            <a role="button" href="{{ route('chapter', ['id' => $previousChapterId]) }}" class="button_action button_chapter_navigation gap-[4px]">
                <i class="fa-sharp fa-solid fa-arrow-left"></i>
                <span>
                    Previous
                </span>
            </a>
        @else
            <button class="button_action button_not_allowed button_chapter_navigation gap-[4px]">
                <span>
                    Previous
                </span>
                <i class="fa-sharp fa-solid fa-arrow-left"></i>
            </button>
        @endif

        <select class="select_chapter" name="select_chapter">
            @foreach($chapterObject['parentManga']->chapter_manga as $chapter)
                <option {{ $chapterObject['foundChapter']->id == $chapter->id ? 'selected' : '' }} value="{{ route('chapter', ['id' => $chapter->id]) }}">
                    {{ $chapter->title }}
                </option>
            @endforeach
        </select>

        @if ($nextChapterId)
            <a role="button" href="{{ route('chapter', ['id' => $nextChapterId]) }}" class="button_action button_chapter_navigation gap-[4px]">
                <span>
                    Next
                </span>
                <i class="fa-sharp fa-solid fa-arrow-right"></i>
            </a>
        @else
            <button class="button_action button_not_allowed button_chapter_navigation gap-[4px]">
                <span>
                    Next
                </span>
                <i class="fa-sharp fa-solid fa-arrow-right"></i>
            </button>
        @endif
    </div>
</div>
