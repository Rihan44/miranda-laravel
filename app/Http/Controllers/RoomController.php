<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Amenity;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::all();

        $amenity_icons = Amenity::getIcon($rooms);

        $check_in = '';
        $check_out = '';

        foreach ($rooms as $room) {
            $room_price = $room->price;
            if($room->offer_price){
                $room->price = $room->price * $room->discount / 100;
            }
        }

        return view('rooms', compact('rooms'), ['amenity_icons' => $amenity_icons, 'form_sent' => false, 'check_in' => $check_in, 'check_out' => $check_out, 'room_price' => $room_price]);
    }

    public function search_results(Request $request)
    {
        $check_in = htmlspecialchars($request->query('check_in'));
        $check_out = htmlspecialchars($request->query('check_out'));

        $rooms = Room::request_check($check_in, $check_out);

        $amenity_icons = Amenity::getIcon($rooms);

        foreach ($rooms as $room) {
            $room_price = $room->price;
            if($room->offer_price){
                $room->price = $room->price * $room->discount / 100;
            }
        }

        return view('rooms', compact('rooms'), ['amenity_icons' => $amenity_icons, 'form_sent' => false, 'check_in' => $check_in, 'check_out' => $check_out, 'room_price' => $room_price]);
    }

    public function show(string $id, Request $request)
    {
        $check_in = htmlspecialchars($request->query('check_in'));
        $check_out = htmlspecialchars($request->query('check_out'));

        $room_detail = Room::findOrFail($id);

        $room_detail_type = $room_detail->room_type;

        $related_rooms = Room::where('room_type', $room_detail_type)->where('id', '!=', $id)->limit(2)->get();

        $amenity_icons = Amenity::getIcon($related_rooms);

        $room_price = $room_detail->price;

        if($room_detail->offer_price){
            $room_detail->price = $room_detail->price * $room_detail->discount / 100;
        }

        return view('rooms_details', [
            'room_detail' => $room_detail, 
            'related_rooms' => $related_rooms, 
            'form_sent' => false, 
            'check_in' => $check_in, 
            'check_out' => $check_out,
            'amenity_icons' => $amenity_icons,
            'room_price' => $room_price
        ]);
    }
}
