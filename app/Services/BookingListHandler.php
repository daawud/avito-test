<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Room;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BookingListHandler
{
    /**
     * @param int $roomId
     * @return Collection
     */
    public static function getBookingsList(int $roomId): Collection
    {
        $dateStart = DB::raw("date_format(from_unixtime(date_start),'%Y-%m-%d') as date_start");
        $dateEnd = DB::raw("date_format(from_unixtime(date_end),'%Y-%m-%d') as date_end");

        return Booking::query()
                   ->select(['id as booking_id', $dateStart, $dateEnd])
                   ->where('room_id', '=', $roomId)
                   ->orderBy('date_start')
                   ->get();
    }

    /**
     * @param array $params
     * @return array
     */
    public static function addBooking(array $params): array
    {
        $booking = new Booking();
        $booking->date_start = Carbon::createFromFormat('Y-m-d', $params['date_start'])->timestamp;
        $booking->date_end = Carbon::createFromFormat('Y-m-d', $params['date_end'])->timestamp;

        $room = Room::query()->findOrFail($params['room_id']);
        $room->bookings()->save($booking);

        return ['booking_id' => $booking->id];
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws Exception
     */
    public static function removeRoom(int $id): ?bool
    {
        return Booking::query()->findOrFail($id)->delete();
    }
}
