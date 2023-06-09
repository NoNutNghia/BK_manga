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
        <div class="grid grid-cols-6 w-full gap-[16px]" id="filter_result">
            @foreach($mangaCardList as $mangaCard)
                @include('pages.user.component.manga_card', ["mangaCard" => $mangaCard])
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getAdvanceRoute() {
            return "{{ route('search.advance') }}"
        }

        function getFilterRoute() {
            return "{{ route('search.filter') }}"
        }

        function getCSRFToken() {
            return '{{ csrf_token() }}'
        }
    </script>
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/description_tooltip.js') }}"></script>
@endsection
