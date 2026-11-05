<?php

namespace App\Http\Controllers;
use App\Events\OrderPlaced;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'total' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $request->total,
        ]);

        event(new OrderPlaced($order, auth()->user()));


        return back()->with('success', 'Order placed successfully!');
    }
}
