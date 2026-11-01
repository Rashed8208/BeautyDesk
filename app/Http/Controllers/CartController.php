<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $quantity = $data['quantity'];

        if ($product->stock < $quantity) {
            return back()->with(
                'error',
                'Not enough stock available.'
            );
        }

        $cart = session()->get('cart', []);

        $key = (string) $product->id;

        $existingQuantity = $cart[$key]['quantity'] ?? 0;

        if ($existingQuantity + $quantity > $product->stock) {
            return back()->with(
                'error',
                'Requested quantity exceeds available stock.'
            );
        }

        $cart[$key] = [
            'product_id' => $product->id,
            'quantity' => $existingQuantity + $quantity,
        ];

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Product added to cart.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return back()->with('error', 'Cart item not found.');
        }

        $product = Product::findOrFail($id);

        if ($data['quantity'] > $product->stock) {
            return back()->with('error', 'Not enough stock.');
        }

        $cart[$id]['quantity'] = $data['quantity'];

        session()->put('cart', $cart);

        return back()->with('success', 'Cart updated.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return back()->with('success', 'Product removed.');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()
            ->route('cart.index')
            ->with('success', 'Cart cleared.');
    }
}