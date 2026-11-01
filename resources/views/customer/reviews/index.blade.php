@extends('layouts.master')


@section('content')


<div class="container py-5">


<h3 class="fw-bold mb-4">
My Reviews
</h3>



@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif



<div class="row g-4">


@forelse($reviews as $item)


<div class="col-md-6">


<div class="card shadow-sm border-0">


<div class="card-body">


<h5 class="fw-bold">

{{$item->product->name}}

</h5>



<p>

{{$item->review}}

</p>



<span class="badge 
@if($item->status=='approved')
bg-success
@elseif($item->status=='rejected')
bg-danger
@else
bg-warning
@endif">

{{$item->status}}

</span>



<div class="mt-3">


<a href="{{route('customer.reviews.edit',$item->id)}}"
class="btn btn-dark btn-sm">

Edit

</a>



<form action="{{route('customer.reviews.destroy',$item->id)}}"
method="POST"
class="d-inline">


@csrf

@method('DELETE')


<button class="btn btn-danger btn-sm">

Delete

</button>


</form>


</div>



</div>


</div>


</div>



@empty


<div class="text-center">

<h5>
No Review Found
</h5>

</div>


@endforelse


</div>


</div>


@endsection