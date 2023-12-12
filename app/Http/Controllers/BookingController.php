<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
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

        if($booking->wasRecentlyCreated){
            $form_sent = true;
            $notification = 'Form sent successfully!';

            /* TODO MOSTRAR OTRA PAGINA CON LOS DETALLES */
            /* Y LA NOTIFICACION NO ENVIAR TEXTO SI NO MOSTRARLO EN LA VISTA SI ES TRUE */
            return redirect('/rooms')->with(['form_sent' => $form_sent, 'notification' =>  $notification]);
        } 
    }
}
