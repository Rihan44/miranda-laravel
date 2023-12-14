<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'guest' => 'required',
            'phone_number' => 'required',
            'order_date' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'special_request' => 'required',
            'price' => 'required',
            'email' => 'required|email',
            'room_id' => 'required'
        ]);

        $data = $request->all();

        $booking = Booking::create($data);
        
        if ($booking) {
            return Redirect::to('rooms')->with('success', 'Booked successfully');
        } else {
            return Redirect::to('rooms')->with('error', 'Error with the booked');
        }
    }
}
