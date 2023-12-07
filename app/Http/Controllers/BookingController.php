<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function store(Request $request)
    {
         $check_in = htmlspecialchars(Session::get('check_in'));
         $check_out = htmlspecialchars(Session::get('check_out'));
         $room_data_id = Session::get('room_data_id');
         $room_data_price = Session::get('room_data_price');
         
         Session::forget('room_data', 'check_in', 'check_out');

        if ($request->isMethod('post')) {
            
            $booking = Booking::create([
                'guest' => $request->input('name'),
                'phone_number' => $request->input('phone'),
                'order_date' => now()->toDateTimeString(),
                'check_in' => $check_in,
                'check_out' => $check_out,
                'special_request' => $request->input('message'),
                'price' => $room_data_price,
                'email' => $request->input('email'),
                'room_id' => $room_data_id
            ]);


            if($booking->wasRecentlyCreated){
                $form_sent = true;
                $notification = 'Form sent successfully!';
    
                return redirect('/rooms')->with(['form_sent' => $form_sent, 'notification' =>  'ey que tal']);
            } 

        } else {
            return view('rooms');
        }
    }

}
