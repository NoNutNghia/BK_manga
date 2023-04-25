<div class="flex flex-col chapter_navigation gap-[12px]">
    <div class="flex flex-row items-center breadcrums gap-[8px]">
        <span>
            Home
        </span>
        <span>
            /
        </span>
        <span>
            Stupid Duck Stupid Duck Stupid Duck
        </span>
        <span>
            /
        </span>
        <span>
            Chapter 10
        </span>
    </div>
    @if(isset($navigation_top))
        @if($navigation_top)
            <div class="flex flex-row items-center gap-[8px] text-[white]">
                <span class="text-[20px]">
                    Stupid Duck Stupid Duck Stupid Duck - Chapter 10
                </span>
                <span>
                    (Updated at 00:00 25/04/2023)
                </span>
            </div>
        @endif
    @endif
    <div class="flex flex-row items-center w-full justify-center gap-[8px]">
        <button class="button_action button_send_comment gap-[4px]">
            <i class="fa-sharp fa-solid fa-arrow-left"></i>
            <span>
                Previous
            </span>
        </button>
        <select class="select_chapter" name="select_chapter">
            <option value="1" selected>Chapter 10</option>
            <option value="1">Chapter 10</option>
            <option value="1">Chapter 10</option>
            <option value="1">Chapter 10</option>
            <option value="1">Chapter 10</option>
            <option value="1">Chapter 10</option>
            <option value="1">Chapter 10</option>
            <option value="1">Chapter 10</option>
            <option value="1">Chapter 10</option>
            <option value="1">Chapter 10</option>
        </select>
        <button class="button_action button_send_comment gap-[4px]">
            <span>
                Next
            </span>
            <i class="fa-sharp fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>
