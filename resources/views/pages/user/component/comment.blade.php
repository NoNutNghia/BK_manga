<div class="flex flex-col mt-[1rem] gap-[12px]">
    <div class="flex flex-row items-center gap-[8px] text-[#f18121] text-[20px]">
        <i class="fa-solid fa-comments"></i>
        @php
            $count = ceil(count($comment) / 1)
        @endphp
        <span>
            Comments ({{ $count }})
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
            <div class="pagination_button disable_pagination_button" onclick="previous_comment(this)" value="1">
                <span>
                    <
                </span>
            </div>
            <div class="pagination_button" onclick="next_comment(this)" value="2">
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
</script>
