@extends('layouts.admin')


@section('content')


<div class="container-fluid py-4">



<h3 class="fw-bold mb-4">

Order Items

</h3>




<div class="card border-0 shadow-sm">


<div class="card-body">



<div class="table-responsive">


<table class="table align-middle">


<thead class="table-light">


<tr>


<th>
Order
</th>


<th>
Product
</th>


<th>
Variation
</th>


<th>
Price
</th>


<th>
Quantity
</th>


<th>
Total
</th>


</tr>


</thead>




<tbody>


@forelse($items as $item)



<tr>



<td>

<a href="{{route('admin.orders.show',$item->order_id)}}">

#{{$item->order->order_number}}

</a>


</td>



<td>

{{$item->product_name}}

</td>




<td>


{{$item->variation_name ?? '-'}}


</td>




<td>

৳{{number_format($item->price,2)}}

</td>




<td>

{{$item->quantity}}

</td>




<td>

৳{{number_format($item->total,2)}}

</td>



</tr>



@empty


<tr>

<td colspan="6"
class="text-center">


No Items Found


</td>


</tr>


@endforelse



</tbody>


</table>


</div>




{{ $items->links() }}



</div>


</div>



</div>


@endsection