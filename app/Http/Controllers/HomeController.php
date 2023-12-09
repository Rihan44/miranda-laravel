<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rooms = Room::select('rooms.*')

        // ->leftJoin('room_photos', 'rooms.id', '=', 'room_photos.room_id')
        // ->leftJoin('amenity_to_room', 'rooms.id', '=', 'amenity_to_room.room_id')
        // ->leftJoin('amenities', 'amenity_to_room.amenity_id', '=', 'amenities.id')
        // ->selectRaw('rooms.*, COALESCE(GROUP_CONCAT(DISTINCT room_photos.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
        // ->selectRaw('GROUP_CONCAT(DISTINCT amenities.amenity_name) AS amenities')
        // ->groupBy('rooms.id')
        // ->get();

        // foreach ($rooms as $room) {
        //     $room->amenities_array = explode(',', $room->amenities);
        // }

        // $amenity_icons = [
        //     'Bed Space' => '/img/bed-icon.png',
        //     '24-Hour Guard' => '/img/gym-icon.png',
        //     'Free Wifi' => '/img/wifi-icon.png',
        //     'Air Conditioner' => '/img/cold-icon.png',
        //     'Television' => '/img/bed-icon.png',
        //     'Towels' => '/img/no-smoking-icon.png',
        //     'Mini Bar' => '/img/cocktail-icon.png',
        //     'Coffee Set' => '/img/bed-icon.png',
        //     'Bathtub' => '/img/bed-icon.png',
        //     'Jacuzzi' => '/img/bed-icon.png',
        //     'Nice Views' => '/img/bed-icon.png',
        // ];

        $rooms = Room::select('rooms.*')
        ->leftJoin('amenity_to_room', 'rooms.id', 'amenity_to_room.room_id')
        ->leftJoin('amenities', 'amenity_to_room.amenity_id', '=', 'amenities.id')
        ->selectRaw('GROUP_CONCAT(DISTINCT amenities.amenity_name) AS amenities')
        ->groupBy('rooms.id')
        ->get();

       $amenity_icons = Room::amenities_array($rooms);

        return view('home', ['rooms' => $rooms,'amenity_icons' => $amenity_icons, 'form_sent' => false]);
    }
}
