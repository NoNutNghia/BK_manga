@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main">
        <div class="personal_information justify-between">
            @include('pages.user.component.menu_personal')
            @include('pages.user.component.change_password_personal')
        </div>
    </div>
@endsection
