<?php

namespace App\Service\Repository;

interface LikeRepository
{
    public function likeManga($user_id, $manga_id);

    public function unlikeManga($like_id);

    public function checkExistLike($user_id, $manga_id);
}
