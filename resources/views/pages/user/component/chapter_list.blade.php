<div class="flex flex-col text-[white] gap-[8px] mt-[1rem]">
    <div class="flex flex-row items-center gap-[8px] text-[20px]">
        <i class="fa-solid fa-database"></i>
        <span>
            Chapter List
        </span>
    </div>

    <div class="flex flex-col chapter_list gap-[12px]">
        @for($i = 1; $i <= 10; $i++)
            <div class="chapter">
                <a href="{{ route('chapter') }}">
                    Chapter {{$i}}
                </a>
                <span>
                    24/04/2023
                </span>
            </div>
        @endfor
    </div>
</div>
