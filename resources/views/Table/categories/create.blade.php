@extends('layouts.admin')


@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">

Add Category

</h4>



<div class="card shadow-sm">


<div class="card-body">


<form action="{{route('categories.store')}}"
method="POST">


@csrf



<div class="mb-3">

<label class="form-label">

Select Country

</label>


<select name="country_id"
class="form-control"
required>


<option value="">
Choose Country
</option>


@foreach($countries as $country)


<option value="{{$country->id}}">

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
class="form-control"
placeholder="Skincare"
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

Save Category

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