@extends('layout.master')

@section('content')
    <div class="flex flex-col content_main">
        <div class="personal_information justify-between">
            @include('pages.user.component.menu_personal')
            @include('pages.user.component.change_password_personal')
        </div>
    </div>
@endsection

@if(\Illuminate\Support\Facades\Auth::user()->role == \App\Enum\UserRole::USER)
    @section('script')
        <script type="text/javascript">
            function getRouteChangePassword() {
                return "{{ route('personal.post_change_password') }}"
            }
        </script>
        <script src="{{ asset('assets/js/change_password.js') }}"></script>
    @endsection
@endif

