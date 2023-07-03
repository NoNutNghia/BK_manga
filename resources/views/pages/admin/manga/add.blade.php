@extends('layout.admin.master')

@section('content')
    <div class="flex flex-col gap-[1.5rem]">
        <div class="flex flex-row w-full justify-between">
            <div class="flex flex-col w-[60%]">
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Title
                    </span>
                    <input type="text" class="input_auth w-[78%]" id="title">
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Other name
                    </span>
                    <input type="text" class="input_auth w-[78%]" id="other_name">
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Author
                    </span>
                    <select name="author" class="input_auth w-[78%]" id="author">
                        @foreach($authorList as $author)
                            <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex label_content_manga flex-row items-center">
                    <span class="w-1/5 font-bold">
                        Age Range
                    </span>
                    <select name="age_range" id="age_range" class="input_auth w-[78%]">
                        @foreach($ageRangeList as $ageRange)
                            <option value="{{ $ageRange->id }}">{{ $ageRange->age_range }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex label_content_manga border-none flex-row">
                    <span class="w-1/5 font-bold">
                        Description
                    </span>
                    <textarea class="input_auth w-[78%] h-[unset!important]" rows="18" name="description" id="description"></textarea>
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
                        <img class="image_logo" id="image_logo" width="50%" alt="">
                    </div>
                </div>

                <div class="flex flex-col w-full gap-[11px]">
                    <div class="flex flex-row items-center justify-between">
                        <span>
                            Cover manga top ranking
                        </span>
                        <div class="flex flex-row items-center justify-center">
                            <input type="file" accept="image/jpeg" id="upload_image_large" hidden />
                            <label class="button_action button_follow" for="upload_image_large">Upload</label>
                        </div>
                    </div>
                    <img class="image_large" id="image_large" alt="">
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <span class="label_content_manga_not_border mb-[1rem]">
                Genre
            </span>

            <div class="grid grid-cols-4 gap-[8px] mb-[1rem]">
                @foreach($genreList as $genre)
                    <div class="flex flex-row gap-[4px]">
                        <input type="checkbox" name="genre_manga" class="w-[17px]" value="{{ $genre->id }}">
                        <span> {{$genre->genre_name}} </span>
                    </div>
                @endforeach
            </div>
            <span class="error_message" id="error_genre_select">
            </span>
        </div>
        <div class="flex flex-row justify-center" style="border-bottom: none">
            <button class="button_action button_read_begin" id="create_manga">
                <span>
                    Create
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
        function getRouteCreateManga() {
            return "{{ route('admin.manga.create') }}"
        }
    </script>
    <script src="{{ asset('assets/js/admin/add_manga.js') }}"></script>
@endsection
