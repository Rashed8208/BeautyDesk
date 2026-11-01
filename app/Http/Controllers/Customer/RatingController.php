<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RatingController extends Controller
{
    // Show all ratings given by logged-in customer.

    public function index(): View
    {
        $customerId = Auth::guard('customer')->id();

        $ratings = Rating::with('product')
            ->where('customer_id', $customerId)
            ->latest()
            ->paginate(12);

        return view('customer.ratings.index', compact('ratings'));
    }


    // Show rating form and product average rating.

    public function show(Product $product): View
    {
        $customerId = Auth::guard('customer')->id();

        $product = Product::query()
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->findOrFail($product->id);

        $myRating = Rating::where('customer_id', $customerId)
            ->where('product_id', $product->id)
            ->first();

        return view(
            'customer.ratings.show',
            compact('product', 'myRating')
        );
    }


    // Submit a new rating.

    public function store(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'rating' => [
                'required',
                'integer',
                'between:1,5',
            ],
        ]);

        $customerId = Auth::guard('customer')->id();

        $existingRating = Rating::where('customer_id', $customerId)
            ->where('product_id', $product->id)
            ->first();

        if ($existingRating) {
            return redirect()
                ->route('customer.ratings.show', $product->id)
                ->with('error', 'You already rated this product. Please update your rating.');
        }

        Rating::create([
            'customer_id' => $customerId,
            'product_id' => $product->id,
            'rating' => $validated['rating'],
        ]);

        return redirect()
            ->route('customer.ratings.show', $product->id)
            ->with('success', 'Your rating has been submitted successfully.');
    }


    // Update an existing rating.

    public function update(Request $request, Rating $rating): RedirectResponse
    {
        $customerId = Auth::guard('customer')->id();

        abort_unless(
            (int) $rating->customer_id === (int) $customerId,
            403
        );

        $validated = $request->validate([
            'rating' => [
                'required',
                'integer',
                'between:1,5',
            ],
        ]);

        $rating->update([
            'rating' => $validated['rating'],
        ]);

        return redirect()
            ->route('customer.ratings.show', $rating->product_id)
            ->with('success', 'Your rating has been updated successfully.');
    }


    // Delete own rating.

    public function destroy(Rating $rating): RedirectResponse
    {
        $customerId = Auth::guard('customer')->id();

        abort_unless(
            (int) $rating->customer_id === (int) $customerId,
            403
        );

        $rating->delete();

        return redirect()
            ->route('customer.ratings.index')
            ->with('success', 'Your rating has been deleted successfully.');
    }
}