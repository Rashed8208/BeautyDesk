<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')
            ->latest()
            ->paginate(15);

        return view('Table.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('customer', 'items');

        return view('Table.orders.show', compact('order'));
    }
}