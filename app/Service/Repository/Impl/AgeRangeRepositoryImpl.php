<?php

namespace App\Service\Repository\Impl;

use App\Models\AgeRange;
use App\Service\Repository\AgeRangeRepository;

class AgeRangeRepositoryImpl implements AgeRangeRepository
{

    private AgeRange $ageRange;

    /**
     */
    public function __construct()
    {
        $this->ageRange = new AgeRange();
    }


    public function getAgeRangeList()
    {
        try {
            return $this->ageRange->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
