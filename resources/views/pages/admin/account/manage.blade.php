@extends('layout.admin.master')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-row items-center justify-between mb-[1rem]">
            <form method="GET" class="flex w-[50%] flex-row items-center justify-between">
                <input type="text" class="w-4/5 input_auth mb-[0] mr-[8px]"
                       name="key"
                       placeholder="Email / Nickname / Full name"
                >

                <button class="button_action button_send_comment rounded font-bold">
                    <span>
                        Search
                    </span>
                </button>
            </form>

        </div>
        <table>
            <thead>
            <tr>
                <th width="25%">
                    Nick name
                </th>
                <th width="20%">
                    Full name
                </th>
                <th width="20%">
                    Email
                </th>
                <th width="15%">
                    Date of Birth
                </th>
                <th width="15%">
                    Status
                </th>
                <th width="15%">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($userList as $user)
                <tr>
                    <td>
                        {{ $user->nick_name }}
                    </td>
                    <td>
                        {{ $user->full_name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->date_of_birth }}
                    </td>
                    <td class="capitalize">
                        {{ $user->statusUser->status_name }}
                    </td>
                    <td>
                        <div class="flex flex-col gap-[12px]">
                            <a role="button" href="{{ route('admin.user.detail', ['id' => $user->id]) }}" class="button_action button_send_comment">
                                    <span>
                                        Detail
                                    </span>
                            </a>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
