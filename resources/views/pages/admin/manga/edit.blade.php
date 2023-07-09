@extends('layout.admin.master')

@section('content')
    <div class="flex flex-col gap-[1.5rem]">
        <div class="flex flex-row w-full justify-between">
            <div class="flex flex-col w-[60%]">
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Title
                    </span>
                    <input type="text" id="title" class="input_auth w-4/5" value="{{ $foundManga->title }}">
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Other name
                    </span>
                    <input type="text" id="other_name" class="input_auth w-4/5" value="{{ $foundManga->other_name }}">
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Author
                    </span>
                    <select id="author" class="w-4/5 input_auth">
                        @foreach($authorList as $author)
                            <option {{ $foundManga->author_id == $author->id ? "selected" : " " }} value="{{ $author->id }}">{{ $author->author_name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Age Range
                    </span>

                    <select name="" id="age_range" class="w-4/5 input_auth">
                        @foreach($ageRangeList as $ageRange)
                            <option {{ $foundManga->age_range_manga->id == $ageRange->id ? "selected" : " "}}
                                    value="{{ $ageRange->id }}"
                            >
                                {{ $ageRange->age_range }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Status
                    </span>
                    <select name="" id="manga_status" class="input_auth w-4/5">
                        @foreach($mangaStatusList as $mangaStatus)
                            <option {{ $foundManga->status_manga->id == $mangaStatus->id ? "selected" : " " }}
                                    value="{{ $mangaStatus->id }}"
                            >
                                {{ $mangaStatus->status_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex label_content_manga border-none flex-row">
                    <span class="w-1/5 font-bold">
                        Description
                    </span>
                    <textarea class="input_auth w-4/5 h-[unset!important]" rows="15" name="description" id="description">{{ $foundManga->description }}</textarea>
                </div>
            </div>
            <div class="flex flex-col w-[39%] text-[20px] text-[red] font-bold gap-[12px]">
                <div class="flex flex-col gap-[12px]">
                    <div class="flex flex-row items-center justify-between">
                        <span>
                            Cover manga
                        </span>
                        <div class="flex flex-row items-center justify-center">
                            <input type="file" accept="image/jpeg" id="upload_image_logo" hidden />
                            <label class="button_action button_follow" for="upload_image_logo">Upload</label>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center">
                        <img class="image_logo" width="50%" src="{{ asset('storage/manga/' . $foundManga->id . '/image_logo.jpg') }}" alt="">
                    </div>
                </div>

                <div class="flex flex-col w-full gap-[12px]">
                    <div class="flex flex-row items-center justify-between">
                        <span>
                            Cover manga top ranking
                        </span>
                        <div class="flex flex-row items-center justify-center">
                            <input type="file" accept="image/jpeg" id="upload_image_large" hidden />
                            <label class="button_action button_follow" for="upload_image_large">Upload</label>
                        </div>
                    </div>
                    <img class="image_large" src="{{ asset('storage/manga/' . $foundManga->id . '/image_large.jpg') }}" alt="">

                </div>
            </div>

        </div>

        <div class="flex flex-col">
            <span class="label_content_manga_not_border mb-[1rem]">
                Genre
            </span>

            <div class="grid grid-cols-4 gap-[8px] mb-[1rem]">
                @foreach($genreList as $genre)
                    @php
                        $check = $genreMangaList->contains(function ($genreValue, $key) use ($genre){
                            return $genreValue->genre_id == $genre->id;
                        })
                    @endphp
                    <div class="flex flex-row gap-[4px]">
                        <input name="genre_manga" value="{{ $genre->id }}" type="checkbox" {{ $check ? 'checked' : ''}} class="w-[17px]">
                        <span> {{$genre->genre_name}} </span>
                    </div>
                @endforeach
            </div>
            <span class="error_message" id="error_genre_select">
            </span>
        </div>

        <div class="flex flex-row justify-center" style="border-bottom: none">
            <button class="button_action button_like" id="update_manga">
                <span>
                    Update
                </span>
            </button>
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

@section('script')

    <script type="text/javascript">
        function getRouteEditManga() {
            return"{{ route('admin.manga.edit') }}"
        }
    </script>

    <script src="{{ asset('assets/js/admin/edit_manga.js') }}"></script>
@endsection
