<?php

namespace App\Service\Admin;

use App\Enum\ResponseResult;
use App\Helper\ImageHandleHelper;
use App\ResponseObject\ResponseObject;
use App\Service\Repository\AgeRangeRepository;
use App\Service\Repository\AuthorRepository;
use App\Service\Repository\ChapterRepository;
use App\Service\Repository\GenreMangaRepository;
use App\Service\Repository\GenreRepository;
use App\Service\Repository\MangaDetailRepository;
use App\Service\Repository\MangaRepository;
use App\Service\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MangaManageService
{
    private MangaDetailRepository $mangaDetailRepository;
    private GenreRepository $genreRepository;
    private GenreMangaRepository $genreMangaRepository;
    private ChapterRepository $chapterRepository;
    private AgeRangeRepository $ageRangeRepository;
    private AuthorRepository $authorRepository;
    private MangaRepository $mangaRepository;
    private ImageHandleHelper $imageHandleHelper;
    private ViewRepository $viewRepository;

    /**
     * @param MangaDetailRepository $mangaDetailRepository
     * @param GenreRepository $genreRepository
     * @param GenreMangaRepository $genreMangaRepository
     * @param ChapterRepository $chapterRepository
     * @param AgeRangeRepository $ageRangeRepository
     * @param AuthorRepository $authorRepository
     * @param MangaRepository $mangaRepository
     * @param ImageHandleHelper $imageHandleHelper
     * @param ViewRepository $viewRepository
     */
    public function __construct(
        MangaDetailRepository $mangaDetailRepository,
        GenreRepository $genreRepository,
        GenreMangaRepository $genreMangaRepository,
        ChapterRepository $chapterRepository,
        AgeRangeRepository $ageRangeRepository,
        AuthorRepository $authorRepository,
        MangaRepository $mangaRepository,
        ImageHandleHelper $imageHandleHelper,
        ViewRepository $viewRepository
    )
    {
        $this->mangaDetailRepository = $mangaDetailRepository;
        $this->genreRepository = $genreRepository;
        $this->genreMangaRepository = $genreMangaRepository;
        $this->chapterRepository = $chapterRepository;
        $this->ageRangeRepository = $ageRangeRepository;
        $this->authorRepository = $authorRepository;
        $this->mangaRepository = $mangaRepository;
        $this->imageHandleHelper = $imageHandleHelper;
        $this->viewRepository = $viewRepository;
    }


    public function getMangaList(Request $request)
    {
        $key = '%';
        if (isset($request->key)) {
            $searchKey = str_replace('%', '\%', trim($request->key));
            $key .= $searchKey;
        }

        $key .= '%';

        $mangaList = $this->mangaDetailRepository->getMangaList($key);

        return view('pages.admin.manga.manage', compact('mangaList'));
    }

    public function getMangaDetail(Request $request)
    {
        if (isset($request->id)) {
            $id = $request->id;

            $foundManga = $this->mangaDetailRepository->getMangaDetailById($id);

            if (!$foundManga) {
                return redirect()->route('error');
            }

            $genreList = $this->genreRepository->getGenre();

            $genreMangaList = $this->genreMangaRepository->getGenreMangaListById($id);

            $chapterList = $this->chapterRepository->getListChapterByMangaId($id);

            return view('pages.admin.manga.detail',
                compact('foundManga', 'genreList', 'genreMangaList', 'chapterList')
            );
        }

        return redirect()->route('error');
    }

    public function getMangaAdd(Request $request)
    {
        $genreList = $this->genreRepository->getGenre();
        $ageRangeList = $this->ageRangeRepository->getAgeRangeList();
        $authorList = $this->authorRepository->getAuthorList();

        return view('pages.admin.manga.add',
            compact(
                'genreList',
                'ageRangeList',
                'authorList'
            )
        );
    }

    public function createManga(Request $request)
    {
        DB::beginTransaction();
        $createManga = $this->mangaRepository->createManga(Auth::id(), Auth::id());

        if ($createManga) {
            $createDetailManga = $this->mangaDetailRepository->createDetailManga($request, $createManga);

            if ($createDetailManga) {
                $this->genreMangaRepository->createGenreWithMangaID($request->genre, $createDetailManga);

                $imageList = array(
                    'image_logo' => $request->image_logo,
                    'image_large' => $request->image_large
                );

                $checkUpdate = $this->viewRepository->createView($createDetailManga);

                if (!$checkUpdate) {
                    DB::rollBack();

                    $response = new ResponseObject(
                        ResponseResult::FAILURE,
                        '',
                        __('error_message.cannot_create_manga')
                    );

                    return response()->json($response->responseObject());
                }

                $checkUploadImage = $this->imageHandleHelper->uploadNewMangaImage($imageList, $createDetailManga);

                DB::commit();

                $response = new ResponseObject(
                    ResponseResult::SUCCESS,
                    route('admin.manga.detail', ['id' => $createDetailManga]),
                    __('success_message.create_manga')
                );

                return response()->json($response->responseObject());
            }

            DB::rollBack();

            $response = new ResponseObject(ResponseResult::FAILURE, '', __('error_message.cannot_create_manga'));

            return response()->json($response->responseObject());
        }

        DB::rollBack();

        $response = new ResponseObject(ResponseResult::FAILURE, '', __('error_message.cannot_create_manga'));

        return response()->json($response->responseObject());
    }

    public function getChapterAdd(Request $request)
    {
        $mangaID = $request->id;

        $latestChapter = $this->chapterRepository->getLatestChapterByMangaID($mangaID);

        return view('pages.admin.chapter.add', compact('latestChapter', 'mangaID'));
    }

    public function createChapter(Request $request)
    {
        DB::beginTransaction();
        $createChapter = $this->chapterRepository->createChapter($request);

        if (!$createChapter) {
            DB::rollBack();

            $response = new ResponseObject(ResponseResult::FAILURE, '', __('error_message.cannot_create_chapter'));

            return response()->json($response->responseObject());
        }

        $upload = $this->imageHandleHelper->uploadNewChapterImage($request->manga_id, $createChapter);

        $update = $this->mangaRepository->updateTimeManga();

        if (!$update) {
            DB::rollBack();

            $response = new ResponseObject(
                ResponseResult::FAILURE,
                '',
                __('error_message.cannot_create_chapter')
            );

            return response()->json($response->responseObject());
        }

        if (!$upload) {
            DB::rollBack();

            $response = new ResponseObject(ResponseResult::FAILURE, '', __('error_message.cannot_create_chapter'));

            return response()->json($response->responseObject());
        }

        DB::commit();

        $response = new ResponseObject(
            ResponseResult::SUCCESS,
            route('admin.manga.detail', ['id' => $request->manga_id]),
            __('success_message.create_chapter')
        );

        return response()->json($response->responseObject());
    }
}
