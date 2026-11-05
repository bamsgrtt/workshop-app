<?php

namespace App\Http\Controllers\Praktikum\Acara31_32;

use App\Http\Controllers\Controller;
use App\Models\Order;

class Part2Controller extends Controller
{
    public function index()
    {
        return view('acara31_32.part2.index');
    }

    public function createOrder()
    {
        return view('acara31_32.part2.orders.create');
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('acara31_32.part2.orders.index', compact('orders'));
    }
}
