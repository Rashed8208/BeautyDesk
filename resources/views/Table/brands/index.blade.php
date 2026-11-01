@extends('layouts.admin')

@section('content')


<div class="container-fluid">


<div class="d-flex justify-content-between align-items-center mb-4">


<h4 class="fw-bold">
Brands
</h4>



<a href="{{route('brands.create')}}"
class="btn btn-primary">

<i class="bi bi-plus-circle"></i>
Add Brand

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


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>

<th>#</th>

<th>Logo</th>

<th>Sub Category</th>

<th>Brand Name</th>

<th>Status</th>

<th width="150">
Action
</th>


</tr>


</thead>




<tbody>


@forelse($brands as $brand)


<tr>


<td>

{{$loop->iteration}}

</td>




<td>


@if($brand->logo)


<img src="{{asset('uploads/brands/'.$brand->logo)}}"
width="50"
height="50"
class="rounded object-fit-cover">


@else


<span class="text-muted">
No Logo
</span>


@endif


</td>




<td>

{{$brand->subCategory->name}}

</td>



<td>

{{$brand->name}}

</td>




<td>


@if($brand->status)


<span class="badge bg-success">
Active
</span>


@else


<span class="badge bg-danger">
Inactive
</span>


@endif


</td>




<td>



<a href="{{route('brands.edit',$brand->id)}}"
class="btn btn-sm btn-warning">


<i class="bi bi-pencil"></i>


</a>





<form action="{{route('brands.destroy',$brand->id)}}"
method="POST"
class="d-inline">


@csrf

@method('DELETE')


<button class="btn btn-sm btn-danger"
onclick="return confirm('Delete Brand?')">


<i class="bi bi-trash"></i>


</button>


</form>


</td>


</tr>


@empty


<tr>

<td colspan="6"
class="text-center">

No Brand Found

</td>


</tr>


@endforelse



</tbody>


</table>



</div>


</div>


</div>


</div>


@endsection