<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::select('rooms.*')
        ->leftJoin('room_photos', 'rooms.id', '=', 'room_photos.room_id')
        ->leftJoin('amenity_to_room', 'rooms.id', '=', 'amenity_to_room.room_id')
        ->leftJoin('amenities', 'amenity_to_room.amenity_id', '=', 'amenities.id')
        ->selectRaw('rooms.*, COALESCE(GROUP_CONCAT(DISTINCT room_photos.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
        ->selectRaw('GROUP_CONCAT(DISTINCT amenities.amenity_name) AS amenities')
        ->groupBy('rooms.id')
        ->get();

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

        return view('rooms', compact('rooms'), ['amenity_icons' => $amenity_icons, 'form_sent' => false]);
    }


    public function store(Request $request)
    {
       $check_in = $request->query('check_in');
       $check_out = $request->query('check_out');
       request_check($check_in, $check_out );
    }

    public function show(string $id)
    {
        $rooms = Room::select('rooms.*')
        ->leftJoin('room_photos', 'rooms.id', '=', 'room_photos.room_id')
        ->leftJoin('amenity_to_room', 'rooms.id', '=', 'amenity_to_room.room_id')
        ->leftJoin('amenities', 'amenity_to_room.amenity_id', '=', 'amenities.id')
        ->selectRaw('rooms.*, COALESCE(GROUP_CONCAT(DISTINCT room_photos.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
        ->selectRaw('GROUP_CONCAT(DISTINCT amenities.amenity_name) AS amenities')
        ->where('rooms.id', '=', $id)
        ->groupBy('rooms.id')
        ->get();

        $two_rooms = Room::select('rooms.*')
        ->leftJoin('room_photos as rp', 'rooms.id', '=', 'rp.room_id')
        ->selectRaw('COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
        ->groupBy('rooms.id')
        ->limit(2)
        ->get();
        
        return view('rooms_details', ['rooms' => $rooms, 'two_rooms' => $two_rooms, 'form_sent' => false]);
    }

}
