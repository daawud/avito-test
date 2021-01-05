<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Room
 * @package App\Models
 */
class Room extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'description', 'price',
    ];
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
