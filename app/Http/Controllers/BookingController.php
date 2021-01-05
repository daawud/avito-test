<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingCreateRequest;
use App\Http\Responses\ApiResponse;
use App\Services\BookingListHandler;
use Exception;

/**
 * Class BookingController
 * @package App\Http\Controllers
 */
class BookingController extends Controller
{
    /**
     * @param int $id
     * @param ApiResponse $response
     * @return mixed
     */
    public function list(int $id, ApiResponse $response)
    {
        return $response->success(BookingListHandler::getBookingsList($id));
    }

    /**
     * @param BookingCreateRequest $request
     * @param ApiResponse $response
     * @return mixed
     */
    public function create(BookingCreateRequest $request, ApiResponse $response)
    {
        return $response->success(BookingListHandler::addBooking($request->all()));
    }

    /**
     * @param int $id
     * @param ApiResponse $response
     * @return mixed
     * @throws Exception
     */
    public function delete(int $id, ApiResponse $response)
    {
        return $response->success(BookingListHandler::removeRoom($id));
    }
}
