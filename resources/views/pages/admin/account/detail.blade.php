@extends('layout.admin.master')

@section('content')
    <div class="flex flex-col gap-[1.5rem]">
        <div class="flex flex-row w-full justify-between">
            <div class="flex flex-col w-[60%]">
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Full name
                    </span>
                    <span class="content_manga">
                        {{ $foundUser->full_name }}
                    </span>
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Nickname
                    </span>
                    <span class="content_manga">
                        {{ $foundUser->nick_name }}
                    </span>
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Date of birth
                    </span>
                    <span class="content_manga">
                        {{ \Carbon\Carbon::parse($foundUser->date_of_birth)->format('d/m/Y') }}
                    </span>
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Email
                    </span>
                    <span class="content_manga">
                        {{ $foundUser->email }}
                    </span>
                </div>
                <div class="flex label_content_manga flex-row">
                    <span class="w-1/5 font-bold">
                        Status
                    </span>
                    <span class="content_manga capitalize" id="user_status">
                        {{ $foundUser->statusUser->status_name }}
                    </span>
                </div>
                <div class="flex label_content_manga items-center flex-row">
                    <span class="w-1/5 font-bold">
                        Verify email
                    </span>
                    <span class="content_manga text-[30px]">
                        @if(is_null($foundUser->email_verify_at))
                            <i class="fa-solid fa-circle-xmark text-[red]"></i>
                        @else
                            <i class="fa-solid fa-circle-check"></i>
                        @endif
                    </span>
                </div>
            </div>
            <div class="flex flex-col w-[39%] items-center font-bold gap-[12px]">
                <img width="50%" src="{{ asset('storage/avatar/' . $foundUser->id . '/avatar.jpeg') }}" class="avatar_user" id="avatar_user" alt="">
                @if(!is_null($foundUser->email_verify_at))
                    <button
                        class="button_action {{ $foundUser->user_status == \App\Enum\UserStatus::ACTIVE ? 'button_follow' : 'button_read_begin' }}"
                        id="button_edit_status"
                        value="{{ $foundUser->user_status == \App\Enum\UserStatus::ACTIVE ? \App\Enum\UserStatus::DISABLE : \App\Enum\UserStatus::ACTIVE }}"
                    >
                        <span>
                            {{ $foundUser->user_status == \App\Enum\UserStatus::ACTIVE ? 'Ban User' : 'Unban User'}}
                        </span>
                    </button>
                @endif
            </div>

        </div>

        <div class="flex flex-row justify-center" style="border-bottom: none">
            <a href="{{ route('admin.user.manage') }}" role="button" class="button_action button_send_comment">
                <span>
                    Back
                </span>
            </a>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getUserID() {
            return "{{ $foundUser->id }}"
        }

        function getActiveValue() {
            return "{{ \App\Enum\UserStatus::ACTIVE }}"
        }

        function getDisableValue() {
            return "{{ \App\Enum\UserStatus::DISABLE }}"
        }

        function getRouteUpdateStatusUser() {
            return "{{ route('admin.user.edit.status') }}"
        }
    </script>
    <script src="{{ asset('assets/js/admin/edit_user.js') }}"></script>
@endsection
