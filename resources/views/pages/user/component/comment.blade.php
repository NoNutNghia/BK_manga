<div class="flex flex-col mt-[1rem] gap-[12px]">
    <div class="flex flex-row items-center gap-[8px] text-[#f18121] text-[20px]">
        <i class="fa-solid fa-comments"></i>
        @php
            $count = ceil(count($comment) / \App\Enum\AmountOfComment::AMOUNT_OF_COMMENT)
        @endphp
        <span>
            Comments (
            <span id="count_comment">
                {{ count($comment) }}
            </span>
            )
        </span>
    </div>
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="flex flex-row justify-between items-center">
            <textarea class="comment_box" placeholder="Type your comment here"></textarea>
            <button class="button_action button_send_comment">
                <i class="fa-solid fa-paper-plane w-[24px]"></i>
                <span>
                    Send comment
                </span>
            </button>
        </div>
    @endif
    <div class="flex flex-col comment_list gap-[24px]">
    </div>
    @if($count > 1)
        <div class="flex flex-row items-center justify-center gap-[8px]">
            <div class="pagination_button disable_pagination_button" id="previous_comment" value="0">
                <span>
                    <
                </span>
            </div>
            <div class="pagination_button" id="next_comment" value="2">
                <span>
                    >
                </span>
            </div>
        </div>
        @else
        <div class="flex flex-row items-center justify-center gap-[8px]">
            <div class="pagination_button disable_pagination_button" id="previous_comment">
                <span>
                    <
                </span>
            </div>
            <div class="pagination_button disable_pagination_button" id="next_comment">
                <span>
                    >
                </span>
            </div>
        </div>
    @endif

</div>

<script type="text/javascript">
    function getCountPage() {
        return {{ $count }}
    }

    function getCurrentCountComment() {
        return {{ count($comment) }}
    }

    function getCommentPerPage() {
        return {{ \App\Enum\AmountOfComment::AMOUNT_OF_COMMENT }}
    }
</script>
