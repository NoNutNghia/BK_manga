@extends('layout.master')

@section('content')
    <div class="flex flex-col items-center text-[white] justify-center text_not_found gap-[1rem] content_main">
        <div>
            <span>
                Page not found
            </span>
        </div>
        <a href="{{ route('main') }}" class="underline">
            <span>
                Back to main page
            </span>
        </a>
    </div>
@endsection
