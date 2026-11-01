@extends('layouts.admin')

@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">
    Edit Country
</h4>



<div class="card shadow-sm">


<div class="card-body">


<form action="{{ route('countries.update',$country->id) }}"
method="POST">


@csrf

@method('PUT')



<div class="mb-3">


<label class="form-label">
Country Name
</label>


<input type="text"
name="name"
value="{{ $country->name }}"
class="form-control"
required>


</div>





<div class="mb-3">


<label class="form-label">
Flag Image
</label>


<input type="text"
name="flag"
value="{{ $country->flag }}"
class="form-control">


</div>






<div class="mb-3">


<label class="form-label">
Status
</label>


<select name="status"
class="form-control">


<option value="1"
@if($country->status==1) selected @endif>

Active

</option>



<option value="0"
@if($country->status==0) selected @endif>

Inactive

</option>


</select>



</div>




<button class="btn btn-success">

Update Country

</button>


<a href="{{ route('countries.index') }}"
class="btn btn-secondary">

Back

</a>



</form>


</div>


</div>



</div>


@endsection