<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Amenity;

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

        return view('rooms', compact('rooms'), [
            'amenity_icons' => $amenity_icons, 
            'form_sent' => false, 
            'check_in' => $check_in, 
            'check_out' => $check_out, 
            'room_price' => $room_price
        ]);
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

        return view('rooms', compact('rooms'), [
            'amenity_icons' => $amenity_icons, 
            'form_sent' => false, 
            'check_in' => $check_in, 
            'check_out' => $check_out, 
            'room_price' => $room_price
        ]);
    }

    public function show(string $id, Request $request)
    {
        $check_in = htmlspecialchars($request->query('check_in'));
        $check_out = htmlspecialchars($request->query('check_out'));

        $room_detail = Room::findOrFail($id);

        $room_detail_type = $room_detail->room_type;

        $no_available = false;

        if($check_in && $check_out){
            $rooms = Room::request_check($check_in, $check_out)->where('room_type', $room_detail_type)->where('id', '!=', $id);
            $room_avalible = Room::check_available($check_in, $check_out, $id);

            if(count($room_avalible) == 0) {
                $no_available = true;
            } else {
                $no_available = false;
            }

        } else {
            $rooms = Room::where('room_type', $room_detail_type)->where('id', '!=', $id)->get();
        } 

        if(count($rooms) == 0) {
            $rooms = Room::all();
            $message = 'These rooms are not in the selected date range';
        } else {
            $message = null;
        }

        $related_rooms = $rooms->shuffle()->take(2);

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
            'room_price' => $room_price,
            'message'=> $message,
            'no_available' => $no_available
        ]);
    }

    public function check_availability(){}
}
