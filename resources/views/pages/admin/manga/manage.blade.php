@extends('layout.admin.master')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-row items-center justify-between mb-[1rem]">
            <form method="GET" class="flex w-[50%] flex-row items-center justify-between">
                <input type="text" class="w-4/5 input_auth mb-[0] mr-[8px]"
                       name="key"
                       placeholder="Title manga / Other name"
                >

                <button class="button_action button_send_comment rounded font-bold">
                    <span>
                        Search
                    </span>
                </button>
            </form>

            <a role="button" href="" class="w-[202px] button_action button_read_begin rounded font-bold">
                <i class="fa-solid fa-plus"></i>
                <span>
                    Add New Manga
                </span>
            </a>
        </div>
        <table>
            <thead>
                <tr>
                    <th width="20%">
                        Title
                    </th>
                    <th width="20%">
                        Image
                    </th>
                    <th width="20%">
                        Author
                    </th>
                    <th width="20%">
                        Update at
                    </th>
                    <th width="20%">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($mangaList as $manga)
                    <tr>
                        <td>
                            {{ $manga->title }}
                        </td>
                        <td>
                            <img width="100%" src="{{ asset('storage/manga/' . $manga->manga_id . '/image_logo.jpg') }}" alt="">
                        </td>
                        <td>
                            {{ $manga->author_manga->author_name }}
                        </td>
                        <td>
                            {{ $manga->main_manga->updated_at }}
                        </td>
                        <td>
                            <div class="flex flex-col gap-[12px]">
                                <a role="button" href="{{ route('admin.manga.detail', ['id' => $manga->manga_id]) }}" class="button_action button_send_comment">
                                    <span>
                                        Detail
                                    </span>
                                </a>
                                <button class="button_action button_forgot_password">
                                    <span>
                                        Edit
                                    </span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
