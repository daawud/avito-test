<?php

namespace App\Http\Responses;

use \Illuminate\Http\Response;

/**
 * Class ApiResponse
 */
class ApiResponse extends Response
{
    /**
     * @param null  $data
     *
     * @return mixed
     */
    public function success($data = null)
    {
        return response()->json(['data' => $data], 200);
    }
}

