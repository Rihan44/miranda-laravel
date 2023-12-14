<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Models\Order;
use App\Models\Room;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $current_user = Auth::user()->id;
        $orders = Order::with('room')->with('user')->where('user_id', $current_user)->get();
        $users = User::all();

       return view('orders', ['orders' => $orders]);
    }

    public function create()
    {
        $current_user = Auth::user()->id;
        $orders = Order::with('user')->where('user_id', $current_user)->get();
        $rooms = Room::select('id', 'room_number')->get()->sortBy('room_number');

        $types = ['Food', 'Mini Bar', 'Movie', 'Tour', 'Private Pool'];

        return view('room_service', ['orders' => $orders, 'types' => $types, 'rooms' => $rooms]);
    }

    public function order_request(Request $request): RedirectResponse
    {
        $data = $request->all();

        $order_created = Order::create($data);

        if ($order_created) {
            return Redirect::to('/room_service')->with('success', 'Order created successfully');
        } else {
            return Redirect::to('/room_service')->with('error', 'Failed creating the order');
        }
    }
  
    public function edit(string $id)
    {
        $order = Order::with('room')->with('user')->where('id', $id)->get();
        $types = ['Food', 'Mini Bar', 'Movie', 'Tour', 'Private Pool'];
        
        return view('edit_order', ['order' => $order, 'types' => $types]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $type = $request->input('type');
        $description = $request->input('description');
        
        $affected = DB::table('orders')
        ->where('id', $id)
        ->update(['type' => $type, 'description' => $description]);

        if ($affected > 0) {
            return Redirect::to('/orders')->with('success', 'Order updated successfully');
        } else {
            return Redirect::to('/orders')->with('error', 'Failed to update order');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        $id = $request->input('id');

        $order_deleted = Order::destroy($id);

        if ($order_deleted > 0) {
            return Redirect::to('/orders')->with('success', 'Order deleted successfully');
        } else {
            return Redirect::to('/orders')->with('error', 'Failed to delete order');
        }
    }
}
