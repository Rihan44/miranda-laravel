<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Amenity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();

        $amenity_icons = Amenity::getIcon($rooms);

        return view('home', ['rooms' => $rooms,'amenity_icons' => $amenity_icons, 'form_sent' => false]);
    }
}
