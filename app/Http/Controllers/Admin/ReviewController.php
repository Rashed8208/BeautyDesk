<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Review;



class ReviewController extends Controller
{


public function index()
{


$reviews = Review::with(
'customer',
'product'
)
->latest()
->get();



return view(
'Table.reviews.index',
compact('reviews')
);


}





public function approve(Review $review)
{


$review->update([

'status'=>'approved'

]);



return back();


}




public function reject(Review $review)
{


$review->update([

'status'=>'rejected'

]);


return back();


}


}