@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main gap-[24px]">
        @include('pages.user.component.chapter_navigation', ['navigation_top' => true])
        <div class="pl-[148px] pr-[148px]">
            @for($i = 0; $i < 10; $i++)
                <img class="w-full" src="{{ asset('storage/manga/2/chapter/1.jpg') }}" alt="">
            @endfor
        </div>
        @include('pages.user.component.chapter_navigation')
        <div class="chapter_navigation">
            @include('pages.user.component.comment')
        </div>
    </div>
    <div class="navigation_fixed text-[white]">
        <div class="flex flex-row justify-end items-center gap-[12px] w-[49.5%]">
            <a href="">
                <i class="fa-solid fa-house"></i>
            </a>
            <a href="">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
            <a href="">
                <i class="fa-solid fa-circle-chevron-right"></i>
            </a>
        </div>
        <div class="flex flex-row items-center gap-[12px] w-[49.5%]">
            <button class="button_action button_follow gap-[4px] fixed_action">
                <i class="fa-solid fa-heart"></i>
                <span>
                    Follow
                </span>
            </button>
        </div>
    </div>
@endsection