<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCreateRequest;
use App\Http\Responses\ApiResponse;
use App\Services\RoomCatalogHandler;
use Exception;

/**
 * Class RoomController
 * @package App\Http\Controllers
 */
class RoomController extends Controller
{
    /**
     * @param RoomCreateRequest $request
     * @param ApiResponse $response
     * @return mixed
     */
    public function list(RoomCreateRequest $request, ApiResponse $response)
    {
        return $response->success(RoomCatalogHandler::getRoomsList($request->get('sort')));
    }

    /**
     * @param RoomCreateRequest $request
     * @param ApiResponse $response
     * @return mixed
     */
    public function create(RoomCreateRequest $request, ApiResponse $response)
    {
        return $response->success(RoomCatalogHandler::addRoom($request->all()));
    }

    /**
     * @param int $id
     * @param ApiResponse $response
     * @return mixed
     * @throws Exception
     */
    public function delete(int $id, ApiResponse $response)
    {
        return $response->success(RoomCatalogHandler::removeRoom($id));
    }
}
