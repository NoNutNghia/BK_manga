@extends('layout.master')

@section('content')
    <div class="flex flex-col items-center text-[white] justify-center text_not_found gap-[1rem] content_main">
        <div>
            <span>
                Token expired!
            </span>
        </div>
        <a href="{{ route('main') }}" class="underline">
            <span>
                Please re-confirm your email here!
            </span>
        </a>
    </div>
@endsection
