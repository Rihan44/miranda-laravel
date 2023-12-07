<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Session;

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
        $check_in = htmlspecialchars($request->query('check_in'));
        $check_out = htmlspecialchars($request->query('check_out'));

        Session::put('check_in', $check_in);
        Session::put('check_out', $check_out);

        $room_model = new Room();
        $rooms = $room_model->request_check($check_in, $check_out);

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

    public function show(string $id)
    {
        if(Session::has('check_in') && Session::has('check_out')) {
            $check_in = htmlspecialchars(Session::get('check_in'));
            $check_out = htmlspecialchars(Session::get('check_out'));
        } else {
            $check_in = false;
            $check_out = false;
        }

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

    
        foreach ($rooms as $room) {
            Session::put('room_data_id', $room['id']);
            Session::put('room_data_price', $room['price']);
        }

        return view('rooms_details', ['rooms' => $rooms, 'two_rooms' => $two_rooms, 'form_sent' => false, 'check_in' => $check_in, 'check_out' => $check_out]);
    }
}
