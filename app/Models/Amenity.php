<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $table = 'amenities';

    public static function getIcon($rooms) 
    {
        foreach ($rooms as $room) {
            $room->amenities_array = explode(',', $room->amenities);
        }

       $amenity_icons = [
            'Bed Space' => '/img/bed-icon.png',
            '24-Hour Guard' => '/img/guard-icon.png',
            'Free Wifi' => '/img/wifi-icon.png',
            'Air Conditioner' => '/img/cold-icon.png',
            'Television' => '/img/television-icon.png',
            'Towels' => '/img/towel-icon.png',
            'Mini Bar' => '/img/cocktail-icon.png',
            'Coffee Set' => '/img/coffe-icon.png',
            'Bathtub' => '/img/bathuh-icon.png',
            'Jacuzzi' => '/img/jacuzzi-icon.png',
            'Nice Views' => '/img/views-icon.png',
            '1/3 Bed Space' => '/img/bed-space-icon.png'
        ];

        return $amenity_icons;
    }
}
