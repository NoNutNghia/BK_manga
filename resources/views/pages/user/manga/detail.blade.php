@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main">
        <div class="flex flex-col manga_info_container">
            {{--            Breadcrums              --}}
            {{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manga', $foundManga) }}
            {{--            End Breadcrums            --}}
{{--            Manga information detail--}}
            @include('pages.user.component.manga_information')
            @include('pages.user.component.description_manga')
            @include('pages.user.component.chapter_list')
            @include('pages.user.component.comment', ['comment' => $foundManga->comment_manga])
        </div>
    </div>
@endsection

<script type="text/javascript">

    function getCSRFToken() {
        return '{{ csrf_token() }}'
    }

    function getMangaId() {
        return '{{ $foundManga->manga_id }}'
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

    function getLikeRoute() {
        return '{{ route('like') }}'
    }

    function getUnlikeRoute() {
        return '{{ route('unlike') }}'
    }

    function getRoutePostCommentManga() {
        return ' {{ route('comment.manga_post') }}'
    }

</script>

@section('script')
    <script src="{{ asset('assets/js/manga_information.js') }}"></script>
    <script src="{{ asset('assets/js/comment_manga.js') }}"></script>
@endsection
