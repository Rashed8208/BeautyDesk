@extends('layouts.admin')


@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">

Product Reviews

</h4>



<div class="card">


<div class="card-body">


<table class="table table-hover">


<tr>

<th>
Customer
</th>

<th>
Product
</th>

<th>
Review
</th>

<th>
Status
</th>

<th>
Action
</th>


</tr>



@foreach($reviews as $item)


<tr>


<td>

{{$item->customer->name}}

</td>


<td>

{{$item->product->name}}

</td>


<td>

{{$item->review}}

</td>


<td>

{{$item->status}}

</td>


<td>



<form method="POST"
action="{{route('admin.reviews.approve',$item->id)}}"
class="d-inline">

@csrf

@method('PUT')


<button class="btn btn-success btn-sm">

Approve

</button>


</form>



<form method="POST"
action="{{route('admin.reviews.reject',$item->id)}}"
class="d-inline">

@csrf

@method('PUT')


<button class="btn btn-danger btn-sm">

Reject

</button>


</form>



</td>


</tr>


@endforeach


</table>


</div>


</div>


</div>


@endsection