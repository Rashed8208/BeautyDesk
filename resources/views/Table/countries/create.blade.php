@extends('layouts.admin')

@section('content')


<div class="container-fluid">


<h4 class="fw-bold mb-4">
    Add Country
</h4>



<div class="card shadow-sm">


<div class="card-body">


<form action="{{ route('countries.store') }}"
      method="POST">


@csrf



<div class="mb-3">

<label class="form-label">
    Country Name
</label>


<input type="text"
       name="name"
       class="form-control"
       placeholder="Enter country name"
       required>


</div>





<div class="mb-3">

<label class="form-label">
    Flag Image Path
</label>


<input type="text"
       name="flag"
       class="form-control"
       placeholder="flags/korea.png">


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

Save Country

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