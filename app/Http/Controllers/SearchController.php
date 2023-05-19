<?php

namespace App\Http\Controllers;

use App\Service\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private SearchService $searchService;

    /**
     * @param SearchService $searchService
     */
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index(Request $request)
    {
        return $this->searchService->index($request);
    }

    public function advance(Request $request)
    {
        return $this->searchService->advanceSearch($request);
    }

    public function titleManga(Request $request)
    {
        return $this->searchService->titleManga($request);
    }

    public function filterSearch(Request $request)
    {
        return $this->searchService->filterSearch($request);
    }

}
