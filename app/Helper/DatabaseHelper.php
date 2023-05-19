<?php

namespace App\Helper;

use Illuminate\Support\Facades\DB;

class DatabaseHelper
{
    public static function queryWithoutOnlyFullGroupBy($query)
    {
        try {
            DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
            return $query();
        } catch (\Exception $e) {
            return false;
        } finally {
            DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");
        }
    }
}
