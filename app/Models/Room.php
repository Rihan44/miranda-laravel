<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\RoomPhoto;
use App\Models\Amenity;
use Illuminate\Database\Query\Builder;

class Room extends Model
{
    use HasFactory;

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'amenity_to_room');
    }

    public function photos(): HasMany 
    {
        return $this->hasMany(RoomPhoto::class);
    }

    public function first_photo() {
        return $this->photos()->take(1);
    }

    public static function request_check($check_in, $check_out) 
    {
        $rooms = Room::where('status', 'available')
            ->whereNotExists(function (Builder $subquery) use ($check_in, $check_out) {
                $subquery->selectRaw(1)
                    ->from('bookings')
                    ->whereColumn('rooms.id', 'bookings.room_id')
                    ->where(function (Builder $query) use ($check_in, $check_out) {
                            $query->whereBetween('bookings.check_in', [$check_in, $check_out])
                                ->orWhereBetween('bookings.check_out', [$check_in, $check_out])
                                ->orWhere(function ($q) use ($check_in, $check_out) {
                                    $q->where('bookings.check_in', '<', $check_in)
                                        ->where('bookings.check_out', '>', $check_out);
                                });
                        });
                })
            ->groupBy('id')
            ->get();
            
        return $rooms;
    }

    public static function check_available($check_in, $check_out, $id) 
    {
        $room_available = Room::where('rooms.status', 'available')
        ->where('rooms.id', $id)
        ->whereNotExists(function (Builder $subquery) use ($check_in, $check_out) {
            $subquery->selectRaw(1)
                ->from('bookings')
                ->whereColumn('rooms.id', 'bookings.room_id')
                ->where(function (Builder $query) use ($check_in, $check_out) {
                    $query->whereBetween('bookings.check_in', [$check_in, $check_out])
                        ->orWhereBetween('bookings.check_out', [$check_in, $check_out])
                        ->orWhere(function ($q) use ($check_in, $check_out) {
                            $q->where('bookings.check_in', '<', $check_in)
                                ->where('bookings.check_out', '>', $check_out);
                        });
                });
        })
        ->groupBy('rooms.id')
        ->get();

        return $room_available;
    }
}
