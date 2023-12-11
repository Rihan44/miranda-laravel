<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\RoomPhoto;
use App\Models\Amenity;
use Illuminate\Database\Query\Builder;

class Room extends Model
{
    use HasFactory;

    // public function amenities(): HasMany 
    // {
    //     return $this->hasMany(Amenitie::class);
    // }

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

    public static function amenities_array($rooms) 
    {
        foreach ($rooms as $room) {
            $room->amenities_array = explode(',', $room->amenities);
        }

       $amenity_icons = [
            'Bed Space' => '/img/bed-icon.png',
            '24-Hour Guard' => '/img/gym-icon.png',
            'Free Wifi' => '/img/wifi-icon.png',
            'Air Conditioner' => '/img/cold-icon.png',
            'Television' => '/img/bed-icon.png',
            'Towels' => '/img/no-smoking-icon.png',
            'Mini Bar' => '/img/cocktail-icon.png',
            'Coffee Set' => '/img/bed-icon.png',
            'Bathtub' => '/img/bed-icon.png',
            'Jacuzzi' => '/img/bed-icon.png',
            'Nice Views' => '/img/bed-icon.png',
        ];

        return $amenity_icons;
    }

    public static function request_check($check_in, $check_out) 
    {
        $rooms = Room::select('rooms.*')
            ->leftJoin('room_photos', 'rooms.id', '=', 'room_photos.room_id')
            ->leftJoin('amenity_to_room', 'rooms.id', '=', 'amenity_to_room.room_id')
            ->leftJoin('amenities', 'amenity_to_room.amenity_id', '=', 'amenities.id')
            ->selectRaw('rooms.*, COALESCE(GROUP_CONCAT(DISTINCT room_photos.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
            ->selectRaw('GROUP_CONCAT(DISTINCT amenities.amenity_name) AS amenities')
            ->where('rooms.status', 'available')
            ->whereNotExists(function (Builder $subquery) use ($check_in, $check_out) {
                $subquery->selectRaw(1)
                    ->from('bookings')
                    ->whereColumn('rooms.id', 'bookings.room_id')
                    ->where(function (Builder $query) use ($check_in, $check_out) {
                        $query->whereBetween(DB::raw("'$check_in'"), ['bookings.check_in', 'bookings.check_out'])
                            ->orWhereBetween(DB::raw("'$check_out'"), ['bookings.check_in', 'bookings.check_out'])
                            ->orWhereBetween('bookings.check_in', [DB::raw("'$check_in'"), DB::raw("'$check_out'")])
                            ->orWhereBetween('bookings.check_out', [DB::raw("'$check_in'"), DB::raw("'$check_out'")]);
                    });
            })
            ->groupBy('rooms.id')
            ->get();

        return $rooms;
    }
 
}
