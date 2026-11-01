@extends('layouts.admin')


@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">

Edit Category

</h4>




<div class="card shadow-sm">


<div class="card-body">


<form action="{{route('categories.update',$category->id)}}"
method="POST">


@csrf

@method('PUT')



<div class="mb-3">


<label class="form-label">

Country

</label>


<select name="country_id"
class="form-control">



@foreach($countries as $country)


<option value="{{$country->id}}"

@if($category->country_id==$country->id)

selected

@endif

>

{{$country->name}}

</option>


@endforeach



</select>


</div>




<div class="mb-3">


<label class="form-label">

Category Name

</label>


<input type="text"
name="name"
value="{{$category->name}}"
class="form-control"
required>


</div>





<div class="mb-3">


<label class="form-label">

Status

</label>



<select name="status"
class="form-control">


<option value="1"
@if($category->status==1)
selected
@endif>

Active

</option>



<option value="0"
@if($category->status==0)
selected
@endif>

Inactive

</option>



</select>


</div>




<button class="btn btn-success">

Update Category

</button>


<a href="{{route('categories.index')}}"
class="btn btn-secondary">

Back

</a>


</form>



</div>


</div>



</div>


@endsection