<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::select('rooms.*')
        ->leftJoin('room_photos as rp', 'rooms.id', '=', 'rp.room_id')
        ->selectRaw('COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
        ->where('rooms.offer_price', true)
        ->groupBy('rooms.id')
        ->get();

        $two_rooms = Room::select('rooms.*')
        ->leftJoin('room_photos as rp', 'rooms.id', '=', 'rp.room_id')
        ->selectRaw('COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), "https://tinyurl.com/RoomPhoto1") AS URL')
        ->groupBy('rooms.id')
        ->limit(2)
        ->get();

        return view('offers', ['rooms' => $rooms, 'two_rooms' => $two_rooms, 'form_sent' => false]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
