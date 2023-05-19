@foreach($commentList as $comment)
    <div class="flex flex-row gap-[8px]">
        <div class="w-[52px]">
            <img src="{{ asset('storage/icon/pepesmile.ico') }}" class="avatar_user" alt="">
        </div>
        <div class="comment_detail">
            <div class="flex flex-row items-center name_user_comment justify-between">
            <span>
                {{ $comment->belong_to_user->nick_name }}
            </span>
                <span>
                    {{ \Carbon\Carbon::parse($comment->created_at)->format('Y/m/d') }}
                </span>
            </div>

            <span class="pt-[10px] text-[white]">
                {{ $comment->content }}
            </span>
        </div>
    </div>
@endforeach
