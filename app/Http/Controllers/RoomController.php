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

        $amenity_icons = Room::amenities_array($rooms);

        $check_in = '';
        $check_out = '';

        return view('rooms', compact('rooms'), ['amenity_icons' => $amenity_icons, 'form_sent' => false, 'check_in' => $check_in, 'check_out' => $check_out]);
    }

    public function search_results(Request $request)
    {
        $check_in = htmlspecialchars($request->query('check_in'));
        $check_out = htmlspecialchars($request->query('check_out'));

        $rooms = Room::request_check($check_in, $check_out);

        $amenity_icons = Room::amenities_array($rooms);

        return view('rooms', compact('rooms'), ['amenity_icons' => $amenity_icons, 'form_sent' => false, 'check_in' => $check_in, 'check_out' => $check_out]);
    }

    public function show(string $id, Request $request)
    {
        $check_in = htmlspecialchars($request->query('check_in'));
        $check_out = htmlspecialchars($request->query('check_out'));

        $room_detail = Room::select('rooms.*')
            ->leftJoin('room_photos', 'rooms.id', '=', 'room_photos.room_id')
            ->leftJoin('amenity_to_room', 'rooms.id', '=', 'amenity_to_room.room_id')
            ->leftJoin('amenities', 'amenity_to_room.amenity_id', '=', 'amenities.id')
            ->selectRaw('rooms.*, COALESCE(GROUP_CONCAT(DISTINCT room_photos.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
            ->selectRaw('GROUP_CONCAT(DISTINCT amenities.amenity_name) AS amenities')
            ->where('rooms.id', $id)
            ->groupBy('rooms.id')
            ->get();

            /* findOrfail($id) */
    
        foreach ($room_detail as $room) {
            $room_detail_id = $room['id'];
            $room_detail_type = $room['room_type'];
            $room_detail_price = $room['price'];
        }

        $related_rooms = Room::select('rooms.*')
        ->leftJoin('room_photos as rp', 'rooms.id', '=', 'rp.room_id')
        ->selectRaw('COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
        ->groupBy('rooms.id')
        ->where('room_type', $room_detail_type)
        ->limit(2)
        ->get();

        /* COMO HACER EL TEMA DE LAS NOTIFICACIONES */

        return view('rooms_details', [
            'room_detail' => $room_detail, 
            'related_rooms' => $related_rooms, 
            'form_sent' => false, 
            'check_in' => $check_in, 
            'check_out' => $check_out,
            'room_detail_id' => $room_detail_id,
            'room_detail_price' => $room_detail_price
        ]);
    }
}
