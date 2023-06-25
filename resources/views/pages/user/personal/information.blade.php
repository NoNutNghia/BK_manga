@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main">
        <div class="personal_information justify-between">
            @include('pages.user.component.menu_personal')
            @include('pages.user.component.information_block')
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getRouteChangeInformation() {
            return '{{ route('personal.changeInformation') }}'
        }
    </script>
    <script src="{{ asset('assets/js/personal.js') }}"></script>
@endsection
