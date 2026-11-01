@extends('layouts.admin')


@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">
Add Brand
</h4>




<div class="card shadow-sm">


<div class="card-body">


<form action="{{route('brands.store')}}"
method="POST"
enctype="multipart/form-data">


@csrf



<div class="mb-3">


<label class="form-label">

Select Sub Category

</label>



<select name="sub_category_id"
class="form-control"
required>



<option value="">
Choose Sub Category
</option>



@foreach($subCategories as $subCategory)


<option value="{{$subCategory->id}}">

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
placeholder="COSRX"
required>


</div>





<div class="mb-3">


<label class="form-label">

Brand Logo

</label>



<input type="file"
name="logo"
class="form-control">



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

Save Brand

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