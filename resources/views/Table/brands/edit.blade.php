@extends('layouts.admin')


@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">

Edit Brand

</h4>




<div class="card shadow-sm">


<div class="card-body">



<form action="{{route('brands.update',$brand->id)}}"
method="POST"
enctype="multipart/form-data">


@csrf

@method('PUT')




<div class="mb-3">


<label class="form-label">

Sub Category

</label>



<select name="sub_category_id"
class="form-control">



@foreach($subCategories as $subCategory)



<option value="{{$subCategory->id}}"


@if($brand->sub_category_id==$subCategory->id)

selected

@endif


>


{{$subCategory->name}}


</option>



@endforeach



</select>


</div>





<div class="mb-3">


<label class="form-label">

Brand Name

</label>



<input type="text"
name="name"
class="form-control"
value="{{$brand->name}}">


</div>





<div class="mb-3">


<label class="form-label">

Current Logo

</label>


<br>


@if($brand->logo)


<img src="{{asset('uploads/brands/'.$brand->logo)}}"
width="80"
class="rounded mb-2">


@endif



<input type="file"
name="logo"
class="form-control">


<small class="text-muted">

Leave empty if you don't want to change logo

</small>


</div>





<div class="mb-3">


<label class="form-label">

Status

</label>



<select name="status"
class="form-control">



<option value="1"

@if($brand->status)

selected

@endif

>

Active

</option>




<option value="0"

@if(!$brand->status)

selected

@endif

>

Inactive

</option>



</select>


</div>




<button class="btn btn-success">

Update Brand

</button>



<a href="{{route('brands.index')}}"
class="btn btn-secondary">

Back

</a>




</form>



</div>


</div>


</div>


@endsection