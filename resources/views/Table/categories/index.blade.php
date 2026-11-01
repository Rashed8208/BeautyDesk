@extends('layouts.admin')

@section('content')


<div class="container-fluid">


<div class="d-flex justify-content-between align-items-center mb-4">

<h4 class="fw-bold">
Categories
</h4>


<a href="{{ route('categories.create') }}"
class="btn btn-primary">

<i class="bi bi-plus-circle"></i>
Add Category

</a>


</div>



@if(session('success'))

<div class="alert alert-success">
{{ session('success') }}
</div>

@endif




<div class="card shadow-sm">

<div class="card-body">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">

<tr>

<th>#</th>

<th>Country</th>

<th>Category Name</th>

<th>Status</th>

<th width="180">
Action
</th>


</tr>

</thead>



<tbody>


@forelse($categories as $category)


<tr>


<td>
{{ $loop->iteration }}
</td>


<td>

{{ $category->country->name }}

</td>



<td>

{{ $category->name }}

</td>




<td>


@if($category->status)

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


<a href="{{route('categories.edit',$category->id)}}"
class="btn btn-sm btn-warning">

<i class="bi bi-pencil"></i>

</a>



<form action="{{route('categories.destroy',$category->id)}}"
method="POST"
class="d-inline">


@csrf

@method('DELETE')


<button class="btn btn-sm btn-danger"
onclick="return confirm('Delete Category?')">


<i class="bi bi-trash"></i>


</button>


</form>



</td>


</tr>



@empty


<tr>

<td colspan="5"
class="text-center">

No Category Found

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