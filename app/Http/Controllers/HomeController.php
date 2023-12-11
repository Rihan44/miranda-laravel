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
        $rooms = Room::select('rooms.*')
        ->leftJoin('amenity_to_room', 'rooms.id', 'amenity_to_room.room_id')
        ->leftJoin('amenities', 'amenity_to_room.amenity_id', 'amenities.id')
        ->selectRaw('GROUP_CONCAT(DISTINCT amenities.amenity_name) AS amenities')
        ->groupBy('rooms.id')
        ->get();

       $amenity_icons = Room::amenities_array($rooms);

        return view('home', ['rooms' => $rooms,'amenity_icons' => $amenity_icons, 'form_sent' => false]);
    }
}
