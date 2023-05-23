@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main gap-[12px]">
        <div class="flex flex-row items-center text-[#56ccf2] text-[20px] gap-[12px]">
            <i class="fa-solid fa-flag"></i>
            <span class="capitalize">
                Genre {{ $genreName }}
            </span>
        </div>
        @if(count($listGenreManga) > 0)
            <div class="grid grid-cols-6 w-full gap-[16px]">
                @foreach($listGenreManga as $genreMangaEle)
                    @php
                        $mangaCard = $genreMangaEle->belong_to_manga
                    @endphp
                    @include('pages.user.component.manga_card', ["mangaCard" => $mangaCard])
                @endforeach
            </div>

        @else
            <div class="flex flex-col justify-center items-center h-[60vh] uppercase text-[white] text-[28px]">
                <span>
                    No any manga following
                </span>
            </div>
        @endif

    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/description_tooltip.js') }}"></script>
@endsection
