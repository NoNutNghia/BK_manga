<?php

namespace App\Service\Repository\Impl;

use App\Models\Like;
use App\Service\Repository\LikeRepository;

class LikeRepositoryImpl implements LikeRepository
{

    private Like $like;

    /**
     */
    public function __construct()
    {
        $this->like = new Like();
    }


    public function likeManga($user_id, $manga_id)
    {
        try {
            return $this->like->create(array(
                'user_id' => $user_id,
                'manga_id' => $manga_id
            ));
        } catch (\Exception $e) {
            return false;
        }
    }

    public function unlikeManga($like_id)
    {
        try {
            $this->like->where('id', $like_id)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function checkExistLike($user_id, $manga_id)
    {
        try {
            return $this->like->select('id')->where(function ($query) use ($manga_id, $user_id) {
                $query->where('user_id', $user_id)
                    ->where('manga_id', $manga_id);
            })->first();
        } catch (\Exception $e) {
            return false;
        }
    }
}
