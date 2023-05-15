<?php

namespace App\Service\Repository\Impl;

use App\Models\Follow;
use App\Service\Repository\FollowRepository;

class FollowRepositoryImpl implements FollowRepository
{

    private Follow $follow;

    /**
     */
    public function __construct()
    {
        $this->follow = new Follow();
    }

    public function followManga($user_id, $manga_id)
    {
        try {
            return $this->follow->create(array(
                'user_id' => $user_id,
                'manga_id' => $manga_id
            ));
        } catch (\Exception $e) {
            return $this->follow->create(array(
                'user_id' => $user_id,
                'manga_id' => $manga_id
            ));
            return false;
        }
    }

    public function unfollowManga($follow_id)
    {
        try {
            $this->follow->where('id', $follow_id)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function checkExistFollow($user_id, $manga_id)
    {
        try {
            return $this->follow->select('id')->where(function ($query) use ($manga_id, $user_id) {
                $query->where('user_id', $user_id)
                    ->where('manga_id', $manga_id);
            })->first();
        } catch (\Exception $e) {
            return false;
        }
    }
}
