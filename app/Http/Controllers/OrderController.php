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
        $orders = Order::with('room')->with('user')->where('user_id', $current_user)->groupBy('room_id')->select('room_id')->get();

        return view('room_service', ['orders' => $orders]);
    }

    public function order_request(Request $request): RedirectResponse
    {
        $data = $request->all();

        $order = Order::create($data);

        return Redirect::to('/orders');
    }
  
    public function show(Request $request)
    {
        $id = $request->id;

        $order = Order::with('room')->with('user')->where('id', $id)->get();

        return view('edit_order', ['order' => $order]);
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
