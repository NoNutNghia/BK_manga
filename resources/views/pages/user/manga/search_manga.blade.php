@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main gap-[12px]">
        <div class="flex flex-row items-center text-[#56ccf2] text-[20px] gap-[12px]">
            <i class="fa-brands fa-searchengin"></i>
            <span>
                Advanced Searching
            </span>
        </div>
        @include('pages.user.component.advanced_search_box')
{{--        <div class="grid grid-cols-6 w-full gap-[16px]">--}}
{{--            @for($i = 0; $i < 10; $i++)--}}
{{--                @include('pages.user.component.manga_card', ["index" => $i])--}}
{{--            @endfor--}}
{{--        </div>--}}
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getAdvanceRoute() {
            return "{{ route('search.advance') }}"
        }
    </script>
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/description_tooltip.js') }}"></script>
@endsection
