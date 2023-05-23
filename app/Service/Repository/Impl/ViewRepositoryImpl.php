<?php

namespace App\Service\Repository\Impl;

use App\Models\View;
use App\Service\Repository\ViewRepository;
use Illuminate\Support\Facades\DB;

class ViewRepositoryImpl implements ViewRepository
{

    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function makeView($manga_id)
    {
        try {
            return DB::transaction(function () use ($manga_id){
                 $this->view->where('manga_id', $manga_id)->increment('number_of_views', 1);
            });
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getTopView()
    {
        try {
            return $this->view->orderBy('number_of_views', 'desc')->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
