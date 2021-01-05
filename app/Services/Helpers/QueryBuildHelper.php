<?php

namespace App\Services\Helpers;

/**
 * Class QueryBuildHelper
 * @package App\Services\Helpers
 */
class QueryBuildHelper
{
    /**
     * @param string $sort
     * @return array
     */
    public static function parseRequestedSorts(string $sort): array
    {
        $sorDirection = $sort[0] === '-' ? 'desc' : 'asc';
        $key = ltrim($sort, '-');

        return [$key, $sorDirection];
    }
}
