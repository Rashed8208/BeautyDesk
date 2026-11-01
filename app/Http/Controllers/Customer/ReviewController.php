<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Review;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class ReviewController extends Controller
{


    public function index()
    {


        $reviews = Review::with('product')
            ->where(
                'customer_id',
                Auth::guard('customer')->id()
            )
            ->latest()
            ->paginate(10);



        return view(
            'customer.reviews.index',
            compact('reviews')
        );


    }




    public function store(Request $request, Product $product)
    {


        $request->validate([

            'review'=>'required|string|min:5'

        ]);



        Review::create([

            'customer_id'=>Auth::guard('customer')->id(),

            'product_id'=>$product->id,

            'review'=>$request->review,

            'status'=>'pending'

        ]);



        return back()->with(
            'success',
            'Review submitted successfully. Waiting for approval.'
        );


    }





    public function edit(Review $review)
    {


        abort_unless(
            $review->customer_id ==
            Auth::guard('customer')->id(),
            403
        );


        return view(
            'customer.reviews.edit',
            compact('review')
        );


    }





    public function update(
        Request $request,
        Review $review
    )
    {


        abort_unless(
            $review->customer_id ==
            Auth::guard('customer')->id(),
            403
        );



        $request->validate([

            'review'=>'required|string|min:5'

        ]);



        $review->update([

            'review'=>$request->review,

            'status'=>'pending'

        ]);



        return redirect()
            ->route('customer.reviews.index')
            ->with(
                'success',
                'Review updated and sent for approval.'
            );


    }






    public function destroy(Review $review)
    {


        abort_unless(
            $review->customer_id ==
            Auth::guard('customer')->id(),
            403
        );



        $review->delete();



        return back()->with(
            'success',
            'Review deleted successfully.'
        );


    }


}