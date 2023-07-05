@extends('layout.admin.master')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-row w-full gap-[1.5rem]">
            <div class="flex flex-row w-[60%] justify-between">
                <div class="flex flex-col gap-[1rem] w-full">
                    <div class="flex label_content_manga flex-row items-center">
                        <span class="w-1/5 font-bold">
                            Title Chapter
                        </span>
                        <input type="text" class="input_auth w-[78%]" id="title_chapter">
                    </div>
                    <span class="italic">
                    *Hint: The latest chapter of manga is <span class="font-bold">{{ $latestChapter->title }}</span>
                </span>
                </div>
            </div>
            <div class="flex flex-col w-[39%] text-[20px] text-[red] font-bold">
                <div class="flex flex-row items-center gap-[1rem]">
                    <span>
                        Chapter Image
                    </span>
                    <div class="flex flex-row items-center justify-center">
                        <input type="file" accept="application/zip" id="upload_chapter_image" hidden />
                        <label class="button_action button_follow" for="upload_chapter_image">Upload Zip File</label>
                    </div>
                    <i class="fa-sharp fa-solid ml-[1rem] fa-circle-check text-[30px] fa-beat" id="check_upload" style="display: none"></i>
                </div>
            </div>
        </div>
        <button class="button_action button_send_comment w-1/5" id="button_upload_chapter">
            <span>
                Submit
            </span>
        </button>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function getMangaID() {
            return "{{ $mangaID }}"
        }

        function getRouteCreateChapter() {
            return "{{ route('admin.chapter.create') }}"
        }
    </script>
    <script src="{{ asset('assets/js/admin/add_chapter.js') }}"></script>
@endsection
