<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;


class OrderItemController extends Controller
{


    public function index()
    {

        $items = OrderItem::with('order')
            ->latest()
            ->paginate(20);


        return view(
            'Table.order_items.index',
            compact('items')
        );

    }



}