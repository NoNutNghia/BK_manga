<div class="flex flex-col mt-[1rem] gap-[12px]">
    <div class="flex flex-row items-center gap-[8px] text-[#f18121] text-[20px]">
        <i class="fa-solid fa-comments"></i>
        <span>
            Comments ({{ count($comment) }})
        </span>
    </div>
    <div class="flex flex-row justify-between items-center">
        <textarea class="comment_box" placeholder="Type your comment here"></textarea>
        <button class="button_action button_send_comment">
            <i class="fa-solid fa-paper-plane w-[24px]"></i>
            <span>
                Send comment
            </span>
        </button>
    </div>
    <div class="flex flex-col comment_list gap-[24px]">
        <div class="flex flex-row gap-[8px]">
            <div class="w-[52px]">
                <img src="{{ asset('storage/icon/pepesmile.ico') }}" class="avatar_user" alt="">
            </div>
            <div class="comment_detail">
                <div class="flex flex-row items-center name_user_comment justify-between">
                    <span>
                        NoNutNghia
                    </span>
                    <span>
                        24/04/2023
                    </span>
                </div>

                <span class="pt-[10px] text-[white]">
                    Thang Duck dung la ngu vcl. Dm thang Duck
                </span>
            </div>
        </div>
        <div class="flex flex-row gap-[8px]">
            <div class="w-[52px]">
                <img src="{{ asset('storage/icon/pepesmile.ico') }}" class="avatar_user" alt="">
            </div>
            <div class="comment_detail">
                <div class="flex flex-row items-center name_user_comment justify-between">
                    <span>
                        NoNutNghia
                    </span>
                    <span>
                        24/04/2023
                    </span>
                </div>

                <span class="pt-[10px] text-[white]">
                    Thang Duck dung la ngu vcl. Dm thang Duck
                </span>
            </div>
        </div>
        <div class="flex flex-row gap-[8px]">
            <div class="w-[52px]">
                <img src="{{ asset('storage/icon/pepesmile.ico') }}" class="avatar_user" alt="">
            </div>
            <div class="comment_detail">
                <div class="flex flex-row items-center name_user_comment justify-between">
                    <span>
                        NoNutNghia
                    </span>
                    <span>
                        24/04/2023
                    </span>
                </div>

                <span class="pt-[10px] text-[white]">
                    Thang Duck dung la ngu vcl. Dm thang Duck
                </span>
            </div>
        </div>
    </div>
</div>
