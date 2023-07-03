@extends('layout.master')

@section('content')
    <div class="flex flex-col items-center text-[white] justify-center text_not_found gap-[1rem] content_main">
        <div>
            <span>
                Reset your password
            </span>
        </div>
        <div>
            <span class="error_message text-[15px]" id="error_reset_password">

            </span>
        </div>
        <div class="flex-col flex gap-[1rem] text-[14px] w-1/2 ">
            <div class="flex flex-col gap-[0.5rem]">
                <label for="new_password">New password</label>
                <input type="password" class="input_auth" placeholder="Your new password" id="new_password" name="new_password">
                <span class="error_message" id="error_new_password">

                </span>
            </div>
            <div class="flex flex-col gap-[0.5rem]">
                <label for="submit_new_password">Submit new password</label>
                <input type="password" class="input_auth" placeholder="Submit your new password" id="submit_new_password" name="submit_new_password">
                <span class="error_message" id="error_submit_new_password">

                </span>
            </div>
        </div>

        <button class="button_action button_follow text-[14px] mt-[1rem]" id="button_reset_password">
            <span>
                Rest password
            </span>
        </button>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getUserID() {
            return "{{ $id }}"
        }

        function getRouteResetPassword() {
            return "{{ route('forgot.post_reset_password') }}"
        }
    </script>
    <script src="{{ asset('assets/js/reset_password.js') }}"></script>
@endsection
