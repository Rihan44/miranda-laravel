<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Amenity;

class OfferController extends Controller
{
    public function index()
    {
        $rooms = Room::where('rooms.offer_price', true)->get();

        $two_rooms = Room::all()->shuffle()->take(4);

        $amenity_icons = Amenity::getIcon($rooms);

        return view('offers', ['rooms' => $rooms, 'two_rooms' => $two_rooms, 'form_sent' => false, 'amenity_icons' => $amenity_icons]);
    }

}
