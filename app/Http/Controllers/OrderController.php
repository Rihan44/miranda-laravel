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

    public function destroy(Request $request): RedirectResponse
    {
        $id = $request->input('id');

        Order::destroy($id);

        return Redirect::to('/orders');
    }
}
