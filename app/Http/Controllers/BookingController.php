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
        $booking = Booking::create([
            'guest' => $request->input('name'),
            'phone_number' => $request->input('phone'),
            'order_date' => now()->toDateTimeString(),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'special_request' => $request->input('message'),
            'price' => $request->input('room_price'),
            'email' => $request->input('email'),
            'room_id' => $request->input('room_id')
        ]);


        if($booking->wasRecentlyCreated){
            $form_sent = true;
            $notification = 'Form sent successfully!';

            /* TODO MOSTRAR OTRA PAGINA CON LOS DETALLES */
            /* Y LA NOTIFICACION NO ENVIAR TEXTO SI NO MOSTRARLO EN LA VISTA SI ES TRUE */
            return redirect('/rooms')->with(['form_sent' => $form_sent, 'notification' =>  'ey que tal']);
        } 

    }

}
