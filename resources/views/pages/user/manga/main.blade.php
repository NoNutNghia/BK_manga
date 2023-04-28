@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main ">
        <div id="newest_updated_area" class="flex flex-col gap-[12px]">
            @include('pages.user.component.top_main_manga')
            <div class="flex flex-row items-center gap-[12px]">
                <i class="fa-solid fa-cloud-arrow-down icon_main"></i>
                <span class="text_updated_manga">
                    Newest Manga Updated
                </span>
            </div>
            <div class="grid grid-cols-6 w-full gap-[16px]">
                @for($i = 0; $i < 10; $i++)
                    @include('pages.user.component.manga_card', ["index" => $i])
                @endfor
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/description_tooltip.js') }}"></script>
@endsection
