<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:30',
            'shipping_address' => 'required|string|max:2000',
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:30',
            'notes' => 'nullable|string|max:2000',
            'payment_method' => 'required|in:cod',
        ]);

        $customer = Auth::guard('customer')->user();

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $order = DB::transaction(function () use (
            $data,
            $customer,
            $cart
        ) {

            $subtotal = 0;
            $items = [];

            $ids = array_keys($cart);
            sort($ids, SORT_NUMERIC);

            foreach ($ids as $id) {

                $product = Product::whereKey($id)
                    ->lockForUpdate()
                    ->first();

                if (!$product) {
                    throw ValidationException::withMessages([
                        'cart' => 'A product is no longer available.',
                    ]);
                }

                $quantity = (int) $cart[$id]['quantity'];

                if ($quantity < 1 || $product->stock < $quantity) {
                    throw ValidationException::withMessages([
                        'cart' => "Insufficient stock for {$product->name}.",
                    ]);
                }

                $price = $product->price;
                $lineTotal = $price * $quantity;

                $subtotal += $lineTotal;

                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total' => $lineTotal,
                ];
            }

            $shippingCharge = 0;
            $discount = 0;

            $total = $subtotal + $shippingCharge - $discount;

            $order = Order::create([
                'customer_id' => $customer->id,
                'order_number' => 'BD-' . Str::upper(
                    Str::random(12)
                ),
                'customer_name' => $data['customer_name'],
                'customer_email' => $data['customer_email'],
                'customer_phone' => $data['customer_phone'],
                'shipping_address' => $data['shipping_address'],
                'city' => $data['city'] ?? null,
                'postal_code' => $data['postal_code'] ?? null,
                'subtotal' => $subtotal,
                'shipping_charge' => $shippingCharge,
                'discount' => $discount,
                'total_amount' => $total,
                'payment_method' => 'cod',
                'payment_status' => 'unpaid',
                'order_status' => 'pending',
                'notes' => $data['notes'] ?? null,
            ]);

            foreach ($items as $item) {

                $product = $item['product'];

                $order->items()->create([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'total' => $item['total'],
                ]);

                $product->decrement(
                    'stock',
                    $item['quantity']
                );
            }

            return $order;
        }, 3);

        session()->forget('cart');

        return redirect()
            ->route('checkout.success', $order->id)
            ->with('success', 'Order placed successfully.');
    }

    public function success(Order $order)
    {
        abort_unless(
            $order->customer_id === Auth::guard('customer')->id(),
            403
        );

        $order->load('items');

        return view('checkout-success', compact('order'));
    }
}