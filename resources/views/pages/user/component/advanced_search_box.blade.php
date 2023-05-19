<div class="flex flex-col search_box">
    <div class="flex flex-row justify-center items-center">
        <button class="button_action button_send_comment" id="hide_search">
            <span>
                Hide Advanced Search Box
            </span>
        </button>
        <button class="button_action button_send_comment" id="show_search">
            <span>
                Show Advanced Search Box
            </span>
        </button>
    </div>
    <div class="flex flex-col advanced_area">
        <div class="flex flex-row justify-center items-center">
            <button class="flex flex-row items-center gap-[12px] min-w-[0px] button_action button_send_comment" id="reset_button">
                <i class="fa-solid fa-rotate-right"></i>
                <span>
                    Reset
                </span>
            </button>
        </div>
        <div class="flex flex-col gap-[12px] mb-[1.25rem]">
            <span class="text-[18px]">
                Genre List
            </span>
            <div class="grid grid-cols-4 gap-[8px]" id="genre_checkbox">
            </div>
        </div>
        <div class="flex flex-col justify-center items-center select_search_option gap-[12px] w-full">
            <div class="flex flex-row items-center w-[50%]">
                <span class="w-[45%]">
                    Status
                </span>
                <select name="select_status" id="select_status" class="w-full select_chapter">

                </select>
            </div>
            <div class="flex flex-row items-center w-[50%]">
                <span class="w-[45%]">
                    Number of Chapter
                </span>
                <select name="select_number_of_chapter" id="select_number_of_chapter" class="w-full select_chapter">
                    <option value="0"> > 0 </option>
                    <option value="10"> >= 10 </option>
                    <option value="20"> >= 20 </option>
                    <option value="50"> >= 50 </option>
                    <option value="100"> >= 100 </option>
                </select>
            </div>
            <div class="flex flex-row items-center w-[50%]">
                <span class="w-[45%]">
                    Upload Time Sorting
                </span>
                <select name="select_sort_upload" id="select_sort_upload" class="w-full select_chapter">
                    <option value="asc">Oldest to Newest</option>
                    <option value="desc">Newest to Oldest</option>
                </select>
            </div>
        </div>
        <div class="flex flex-row items-center mt-[1.25rem] justify-center">
            <button class="min-w-[0px] button_action button_read_begin" id="search_manga">
                <span>
                    Search
                </span>
            </button>
        </div>

    </div>
</div>
