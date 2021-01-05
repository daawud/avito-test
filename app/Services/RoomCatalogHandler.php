<?php

namespace App\Services;

use App\Models\Room;
use App\Services\Helpers\QueryBuildHelper;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class RoomCatalogHandler
 * @package App\Services
 */
class RoomCatalogHandler
{
    /**
     * @param string|null $sort
     * @return Collection
     */
    public static function getRoomsList(string $sort = null): Collection
    {
        $addedOn = DB::raw("date_format(from_unixtime(added_on),'%Y-%m-%d') as added_on");
        return Room::query()
                   ->select(['id as room_id', 'description', 'price', $addedOn])
                   ->when($sort, function($query) use ($sort) {
                       $sortData = QueryBuildHelper::parseRequestedSorts($sort);
                       $query->orderBy($sortData[0], $sortData[1]);
                   })
                   ->get();
    }

    /**
     * @param array $params
     * @return array
     */
    public static function addRoom(array $params): array
    {
        $room = new Room;
        $room->fill($params);
        $room->added_on = Carbon::now()->timestamp;
        $room->save();

        return ['room_id' => $room->id];
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws Exception
     */
    public static function removeRoom(int $id): ?bool
    {
        return Room::query()->findOrFail($id)->delete();
    }
}
