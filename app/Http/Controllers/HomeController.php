<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Amenity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        $amenity_icons = Amenity::getIcon($rooms);

        foreach ($rooms as $room) {
            $room_price = $room->price;
            if($room->offer_price){
                $room->price = $room->price * $room->discount / 100;
            }
        }

        return view('home', ['rooms' => $rooms,'amenity_icons' => $amenity_icons, 'form_sent' => false, 'room_price' => $room_price]);
    }
}
