@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <h3 class="fw-bold mb-4">
        Order #{{ $order->order_number }}
    </h3>

    <div class="row g-4">

        <div class="col-lg-5">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h5>Customer Information</h5>

                    <hr>

                    <p><strong>Name:</strong> {{ $order->customer_name }}</p>

                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>

                    <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>

                    <p><strong>Address:</strong> {{ $order->shipping_address }}</p>

                    <p><strong>City:</strong> {{ $order->city }}</p>

                    <p><strong>Payment:</strong> {{ ucfirst($order->payment_method) }}</p>

                    <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>

                    <p><strong>Order Status:</strong> {{ ucfirst($order->order_status) }}</p>

                </div>

            </div>

        </div>

        <div class="col-lg-7">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h5>Ordered Products</h5>

                    <hr>

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($order->items as $item)

                                    <tr>

                                        <td>
                                            {{ $item->product_name }}

                                            @if($item->variation_name)
                                                <small class="d-block text-muted">
                                                    {{ $item->variation_name }}
                                                </small>
                                            @endif
                                        </td>

                                        <td>
                                            ৳{{ number_format($item->price, 2) }}
                                        </td>

                                        <td>
                                            {{ $item->quantity }}
                                        </td>

                                        <td>
                                            ৳{{ number_format($item->total, 2) }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    <hr>

                    <p>Subtotal: ৳{{ number_format($order->subtotal, 2) }}</p>

                    <p>Shipping: ৳{{ number_format($order->shipping_charge, 2) }}</p>

                    <p>Discount: ৳{{ number_format($order->discount, 2) }}</p>

                    <h5 class="fw-bold">
                        Grand Total: ৳{{ number_format($order->total_amount, 2) }}
                    </h5>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection