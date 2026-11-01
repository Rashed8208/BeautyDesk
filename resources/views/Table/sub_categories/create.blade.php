@extends('layouts.admin')

@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">
Add Sub Category
</h4>



<div class="card shadow-sm">


<div class="card-body">


<form action="{{route('sub-categories.store')}}"
method="POST">


@csrf



<div class="mb-3">

<label class="form-label">
Select Category
</label>


<select name="category_id"
class="form-control"
required>


<option value="">
Choose Category
</option>


@foreach($categories as $category)


<option value="{{$category->id}}">

{{$category->name}}

</option>


@endforeach


</select>


</div>




<div class="mb-3">

<label class="form-label">
Sub Category Name
</label>


<input type="text"
name="name"
class="form-control"
placeholder="Face Serum"
required>


</div>




<div class="mb-3">

<label class="form-label">
Status
</label>


<select name="status"
class="form-control">


<option value="1">
Active
</option>


<option value="0">
Inactive
</option>


</select>


</div>




<button class="btn btn-primary">
Save
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