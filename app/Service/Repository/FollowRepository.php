<?php

namespace App\Service\Repository;

interface FollowRepository
{
    public function followManga($user_id, $manga_id);

    public function unfollowManga($follow_id);

    public function checkExistFollow($user_id, $manga_id);
}
