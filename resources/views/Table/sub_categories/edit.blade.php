@extends('layouts.admin')

@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">
Edit Sub Category
</h4>



<div class="card shadow-sm">


<div class="card-body">


<form action="{{route('sub-categories.update',$subCategory->id)}}"
method="POST">


@csrf

@method('PUT')



<div class="mb-3">

<label>
Category
</label>


<select name="category_id"
class="form-control">


@foreach($categories as $category)


<option value="{{$category->id}}"

@if($subCategory->category_id==$category->id)
selected
@endif

>

{{$category->name}}

</option>


@endforeach


</select>


</div>




<div class="mb-3">


<label>
Sub Category Name
</label>


<input type="text"
name="name"
class="form-control"
value="{{$subCategory->name}}">


</div>




<div class="mb-3">


<label>
Status
</label>


<select name="status"
class="form-control">


<option value="1"
@if($subCategory->status)
selected
@endif>

Active

</option>


<option value="0"
@if(!$subCategory->status)
selected
@endif>

Inactive

</option>


</select>


</div>



<button class="btn btn-success">
Update
</button>


<a href="{{route('sub-categories.index')}}"
class="btn btn-secondary">

Back

</a>


</form>


</div>


</div>


</div>


@endsection