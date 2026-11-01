@extends('layouts.master')


@section('content')


<div class="container py-5">


<div class="row justify-content-center">


<div class="col-lg-7">


<div class="card shadow-sm border-0">


<div class="card-body p-4">


<h4 class="fw-bold mb-4">

Edit Review

</h4>



<form action="{{route('customer.reviews.update',$review->id)}}"
method="POST">


@csrf

@method('PUT')



<div class="mb-4">


<label class="form-label fw-semibold">

Your Review

</label>


<textarea
name="review"
rows="5"
class="form-control"
required
>{{old('review',$review->review)}}</textarea>


</div>



<button class="btn btn-dark">

Update Review

</button>



<a href="{{route('customer.reviews.index')}}"
class="btn btn-outline-secondary">

Cancel

</a>


</form>



</div>


</div>


</div>


</div>


</div>


@endsection