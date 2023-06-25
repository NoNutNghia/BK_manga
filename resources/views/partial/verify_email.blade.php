@extends('layout.master')

@section('content')
    <div class="flex flex-col items-center text-[white] justify-center text_not_found gap-[1rem] content_main">
        <div>
            <span>
                Verify email successfully!
            </span>
        </div>

        <div class="flex flex-row items-center justify-center gap-[1%]">
            <span>
                Now login and enjoy your moment with BK Manga
            </span>
            <img width="8%" src="{{ asset('storage/icon/pepesmile.ico') }}" alt="">
        </div>
    </div>
@endsection
