@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main gap-[24px]">
        @php
            $chapterList = $chapterObject['parentManga']->chapter_manga;
            $previousChapterId = false;
            $nextChapterId = false;
        @endphp

        @if ($chapterList->get(0)->id != $chapterObject['foundChapter']->id)
            @php
                $previousChapterIndex = $chapterList->search(function ($chapter, $key) use ($chapterObject) {
                    return $chapter->id == $chapterObject['foundChapter']->id;
                }) - 1;

                $previousChapterId = $chapterList->get($previousChapterIndex)->id;
            @endphp
        @endif

        @if ($chapterList->last()->id != $chapterObject['foundChapter']->id)
            @php
                $nextChapterIndex = $chapterList->search(function ($chapter, $key) use ($chapterObject) {
                    return $chapter->id == $chapterObject['foundChapter']->id;
                }) + 1;

                $nextChapterId = $chapterList->get($nextChapterIndex)->id;
            @endphp
        @endif

        @include('pages.user.component.chapter_navigation', ['navigation_top' => true])
        <div class="pl-[148px] pr-[148px] max-h-[100vh]" style="overflow-y: auto">
            @foreach($chapterObject['imageList'] as $image)
                <img class="w-full" src="{{ asset('storage/manga/' . $chapterObject['parentManga']->manga_id . '/chapter/' . $chapterObject['foundChapter']->id . '/' . $image) }}" alt="">
            @endforeach
        </div>
        @include('pages.user.component.chapter_navigation')
        <div class="chapter_navigation">
            @include('pages.user.component.comment', [
                'comment' => $chapterObject['foundChapter']->comment_chapter,
                'countComment' => count($chapterObject['foundChapter']->comment_chapter)
            ])
        </div>
    </div>

    <div class="navigation_fixed text-[white]">
        <div class="flex flex-row justify-end items-center gap-[12px] w-[49.5%]">
            <a href="{{ route('main') }}">
                <i class="fa-solid fa-house"></i>
            </a>
            @if($previousChapterId)
                <a href="{{ route('chapter', ['id' => $previousChapterId]) }}">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
            @else
                <i class="fa-solid fa-circle-chevron-left button_not_allowed"></i>
            @endif

            @if($nextChapterId)
                <a href="{{ route('chapter', ['id' => $nextChapterId]) }}">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            @else
                <i class="button_not_allowed fa-solid fa-circle-chevron-right"></i>
            @endif
        </div>
        <div class="flex flex-row items-center gap-[12px] w-[49.5%]">
                <button class="button_action button_follow gap-[4px] fixed_action " style="display: {{ !$chapterObject['existFollow'] ? 'flex' : 'none' }}">
                    <i class="fa-solid fa-heart"></i>
                    <span>
                        Follow
                    </span>
                </button>
                <button class="button_action button_unfollow gap-[4px] fixed_action"
                        style="display: {{ $chapterObject['existFollow'] ? 'flex' : 'none' }}"
                        id="{{ $chapterObject['existFollow'] ? $chapterObject['existFollow']->id : '' }}">
                    <i class="fa-solid fa-heart-crack"></i>
                    <span>
                        Unfollow
                    </span>
                </button>
        </div>
    </div>
@endsection

<script type="text/javascript">

    function getCSRFToken() {
        return '{{ csrf_token() }}'
    }

    function getMangaId() {
        return '{{ $chapterObject['parentManga']->manga_id }}'
    }

    function getUserId() {
        return '{{ \Illuminate\Support\Facades\Auth::id() }}'
    }

    function getFollowRoute() {
        return '{{ route('follow') }}'
    }

    function getUnfollowRoute() {
        return '{{ route('unfollow') }}'
    }

    function getRoutePostCommentChapter() {
        return '{{ route('comment.chapter_post') }}'
    }

    function getChapterId() {
        return '{{ $chapterObject['foundChapter']->id }}'
    }

    function getRouteCommentChapter() {
        return '{{ route('comment.chapter') }}'
    }

    function getRouteCountCommentChapter() {
        return '{{ route('comment.chapter_count') }}'
    }

</script>

@section('script')
    <script src="{{ asset('assets/js/manga_information.js') }}"></script>
    <script src="{{ asset('assets/js/comment_chapter.js') }}"></script>
    <script src="{{ asset('assets/js/chapter.js') }}"></script>
@endsection
