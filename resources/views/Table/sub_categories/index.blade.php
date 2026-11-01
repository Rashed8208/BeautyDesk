@extends('layouts.admin')

@section('content')

<div class="container-fluid">


<div class="d-flex justify-content-between align-items-center mb-4">

<h4 class="fw-bold">
Sub Categories
</h4>


<a href="{{route('sub-categories.create')}}"
class="btn btn-primary">

<i class="bi bi-plus-circle"></i>
Add Sub Category

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

<th>Category</th>

<th>Sub Category</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>



<tbody>


@forelse($subCategories as $subCategory)


<tr>


<td>
{{$loop->iteration}}
</td>


<td>
{{$subCategory->category->name}}
</td>


<td>
{{$subCategory->name}}
</td>



<td>

@if($subCategory->status)

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


<a href="{{route('sub-categories.edit',$subCategory->id)}}"
class="btn btn-sm btn-warning">

<i class="bi bi-pencil"></i>

</a>



<form action="{{route('sub-categories.destroy',$subCategory->id)}}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')


<button class="btn btn-sm btn-danger"
onclick="return confirm('Delete Sub Category?')">

<i class="bi bi-trash"></i>

</button>


</form>


</td>


</tr>


@empty

<tr>

<td colspan="5"
class="text-center">

No Data Found

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