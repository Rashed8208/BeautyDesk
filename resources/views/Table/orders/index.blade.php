@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Orders</h3>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($orders as $order)

                            <tr>

                                <td>
                                    {{ $order->order_number }}
                                </td>

                                <td>
                                    {{ $order->customer_name }}
                                </td>

                                <td>
                                    ৳{{ number_format($order->total_amount, 2) }}
                                </td>

                                <td>
                                    {{ ucfirst($order->payment_status) }}
                                </td>

                                <td>
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($order->order_status) }}
                                    </span>
                                </td>

                                <td>
                                    {{ $order->created_at->format('d M Y') }}
                                </td>

                                <td>
                                    <a
                                        href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-sm btn-dark"
                                    >
                                        View
                                    </a>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No orders found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{ $orders->links() }}

        </div>

    </div>

</div>

@endsection