@extends('layouts.admin')


@section('content')


<div class="container-fluid">


<div class="d-flex justify-content-between mb-4">


<h4 class="fw-bold">
Products
</h4>


<a href="{{route('products.create')}}"
class="btn btn-primary">

<i class="bi bi-plus-circle"></i>
Add Product

</a>


</div>




@if(session('success'))

<div class="alert alert-success">
{{session('success')}}
</div>

@endif




<div class="card shadow-sm">


<div class="card-body">


<div class="table-responsive">


<table class="table table-hover">


<thead>

<tr>

<th>#</th>

<th>Image</th>

<th>Name</th>

<th>Price</th>

<th>Stock</th>

<th>Status</th>

<th>Action</th>


</tr>

</thead>



<tbody>


@foreach($products as $product)


<tr>


<td>{{$loop->iteration}}</td>


<td>

@if($product->thumbnail)

<img src="{{asset('uploads/products/'.$product->thumbnail)}}"
width="60">

@endif

</td>



<td>
{{$product->name}}
</td>


<td>
৳ {{$product->price}}
</td>


<td>
{{$product->stock}}
</td>



<td>

<span class="badge bg-success">
{{$product->status}}
</span>

</td>



<td>


<a href="{{route('products.edit',$product->id)}}"
class="btn btn-sm btn-warning">

Edit

</a>



<form action="{{route('products.destroy',$product->id)}}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')


<button class="btn btn-sm btn-danger">

Delete

</button>


</form>


</td>


</tr>


@endforeach



</tbody>


</table>


</div>


</div>

</div>


</div>


@endsection