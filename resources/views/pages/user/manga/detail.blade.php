@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main">
        <div class="flex flex-col manga_info_container">
            {{--            Breadcrums              --}}
            <div class="flex flex-row items-center gap-[8px] breadcrums">
                <span>
                    Home
                </span>
                <span>
                    /
                </span>
                <span>
                    Stupid Duck
                </span>
            </div>
            {{--            End Breadcrums            --}}

{{--            Manga information detail--}}
            @include('pages.user.component.manga_information')
            @include('pages.user.component.description_manga')
            @include('pages.user.component.chapter_list')
            @include('pages.user.component.comment')
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/manga_information.js') }}"></script>
@endsection
