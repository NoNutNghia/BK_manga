<?php

namespace App\Service;

use App\Service\Repository\ChapterRepository;
use App\Service\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChapterService
{
    private ChapterRepository $chapterRepository;
    private ViewRepository $viewRepository;

    /**
     * @param ChapterRepository $chapterRepository
     * @param ViewRepository $viewRepository
     */
    public function __construct(ChapterRepository $chapterRepository, ViewRepository $viewRepository)
    {
        $this->chapterRepository = $chapterRepository;
        $this->viewRepository = $viewRepository;
    }


    public function chapterDetail(Request $request)
    {
        $id = $request->id;
        $foundChapter = $this->chapterRepository->getChapterById($id);
        if (!$foundChapter) {
            return redirect()->route('error');
        }
        $parentManga = $foundChapter->parent_manga;

        $this->viewRepository->makeView($parentManga->manga_id);

        $fileList = Storage::disk('public')->allFiles('manga/' . $parentManga->manga_id . '/chapter/' . $id);
        $imageList = array();
        foreach ($fileList as $file_ele) {
            $fileObject = pathinfo($file_ele);
            array_push($imageList, $fileObject['basename']);
        }
        $chapterObject = array(
            'foundChapter' => $foundChapter,
            'parentManga' => $parentManga,
            'imageList' => $imageList
        );
        return view('pages.user.manga.chapter', compact('chapterObject'));
    }

}
