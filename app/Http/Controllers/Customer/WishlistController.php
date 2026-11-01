<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishlistController extends Controller
{
    // Show customer wishlist

    public function index(): View
    {
        $customerId = Auth::guard('customer')->id();

        $wishlists = Wishlist::with('product')
            ->where('customer_id', $customerId)
            ->latest()
            ->get();

        return view('customer.wishlist.index', compact('wishlists'));
    }


    // Add product to wishlist

    public function store(Product $product): RedirectResponse
    {
        $customerId = Auth::guard('customer')->id();

        Wishlist::firstOrCreate([
            'customer_id' => $customerId,
            'product_id' => $product->id,
        ]);

        return back()->with(
            'success',
            'Product added to your wishlist successfully.'
        );
    }


    // Remove product from wishlist

    public function destroy(Wishlist $wishlist): RedirectResponse
    {
        $customerId = Auth::guard('customer')->id();

        abort_unless(
            (int) $wishlist->customer_id === (int) $customerId,
            403
        );

        $wishlist->delete();

        return back()->with(
            'success',
            'Product removed from your wishlist successfully.'
        );
    }
}