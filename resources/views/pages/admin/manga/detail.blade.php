@extends('layout.admin.master')

@section('content')
    <div class="flex flex-col manga_detail gap-[1.5rem]">
        <div class="flex flex-row w-full justify-between">
            <div class="flex flex-col w-[60%]">
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Title
                    </span>
                    <span class="content_manga">
                        {{ $foundManga->title }}
                    </span>
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Other name
                    </span>
                    <span class="content_manga">
                        {{ $foundManga->other_name }}
                    </span>
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Author
                    </span>
                    <span class="content_manga">
                        {{ $foundManga->author_manga->author_name }}
                    </span>
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Age Range
                    </span>
                    <span class="content_manga">
                        {{ $foundManga->age_range_manga->age_range }}
                    </span>
                </div>
                <div class="flex label_content_manga flex-row">
                    <span class="w-1/5 font-bold">
                        Status
                    </span>
                    <span class="content_manga capitalize">
                        {{ $foundManga->status_manga->status_name }}
                    </span>
                </div>
                <div class="flex label_content_manga border-none flex-row">
                    <span class="w-1/5 font-bold">
                        Description
                    </span>
                    <span class="content_manga">
                        {{ $foundManga->description }}
                    </span>
                </div>
            </div>
            <div class="flex flex-col w-[39%] text-[20px] text-[red] font-bold gap-[12px]">
                <div class="flex flex-col">
                    <span>
                        Cover manga
                    </span>
                    <div class="flex flex-col justify-center">
                        <img class="image_logo" width="50%" src="{{ asset('storage/manga/' . $foundManga->manga_id . '/image_logo.jpg') }}" alt="">
                    </div>
                </div>

                <div class="flex flex-col w-full">
                    <span>
                        Image manga will show if manga in top ranking
                    </span>
                </div>
                <img class="image_large" src="{{ asset('storage/manga/' . $foundManga->manga_id . '/image_large.jpg') }}" alt="">
            </div>

        </div>

        <div class="flex flex-col">
            <span class="label_content_manga_not_border mb-[1rem]">
                Genre
            </span>

            <div class="grid grid-cols-4 gap-[8px]">
                @foreach($genreList as $genre)
                    @php
                        $check = $genreMangaList->contains(function ($genreValue, $key) use ($genre){
                            return $genreValue->genre_id == $genre->id;
                        })
                    @endphp
                    <div class="flex flex-row gap-[4px]">
                        <input type="checkbox" {{ $check ? 'checked' : ''}} class="w-[17px]" disabled>
                        <span> {{$genre->genre_name}} </span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col">
            <span class="label_content_manga_not_border mb-[1rem]">
                Chapter list
            </span>
            <table>
                <thead>
                    <tr>
                        <th class="w-1/3">
                            Chapter title
                        </th>
                        <th class="w-1/3">
                            Update by
                        </th>
                        <th class="w-1/3">
                            Upload at
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chapterList as $chapter)
                        <tr>
                            <td>{{ $chapter->title }}</td>
                            <td>{{ $chapter->updated_by }}</td>
                            <td>{{ $chapter->uploaded_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-row justify-center" style="border-bottom: none">
            <a href="{{ route('admin.manga.manage') }}" role="button" class="button_action button_send_comment">
                <span>
                    Back
                </span>
            </a>
        </div>
    </div>
@endsection
