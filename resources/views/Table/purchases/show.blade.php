
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold mb-0">Purchase Invoice</h4>

        <div class="d-flex gap-2">

            <a href="{{ route('admin.purchases.index') }}"
               class="btn btn-outline-secondary">
                Back
            </a>

            <button type="button"
                    class="btn btn-dark"
                    onclick="window.print()">
                <i class="bi bi-printer"></i>
                Print
            </button>

        </div>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row mb-4">

                <div class="col-md-6">

                    <h3 class="fw-bold">BeautyDesk</h3>

                    <p class="text-muted mb-1">
                        Product Purchase Invoice
                    </p>

                </div>

                <div class="col-md-6 text-md-end">

                    <h5 class="fw-bold">
                        {{ $purchase->invoice_no }}
                    </h5>

                    <p class="mb-1">
                        Date:
                        {{ $purchase->purchase_date->format('d M Y') }}
                    </p>

                    <span class="badge bg-success">
                        Stock Received
                    </span>

                </div>

            </div>

            <hr>

            <div class="mb-4">

                <h6 class="fw-bold">Supplier Information</h6>

                <p class="mb-1">
                    {{ $purchase->supplier?->name ?? '-' }}
                </p>

                <p class="mb-1">
                    {{ $purchase->supplier?->company_name }}
                </p>

                <p class="mb-1">
                    {{ $purchase->supplier?->phone }}
                </p>

                <p class="text-muted">
                    {{ $purchase->supplier?->address }}
                </p>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th class="text-end">Quantity</th>
                            <th class="text-end">Unit Cost</th>
                            <th class="text-end">Subtotal</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($purchase->items as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $item->product?->name ?? '-' }}
                                </td>

                                <td class="text-end">
                                    {{ $item->quantity }}
                                </td>

                                <td class="text-end">
                                    ৳{{ number_format($item->unit_cost, 2) }}
                                </td>

                                <td class="text-end">
                                    ৳{{ number_format($item->subtotal, 2) }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                    <tfoot>

                        <tr class="table-light">

                            <th colspan="4" class="text-end">
                                Grand Total
                            </th>

                            <th class="text-end">
                                ৳{{ number_format($purchase->total_amount, 2) }}
                            </th>

                        </tr>

                    </tfoot>

                </table>

            </div>

            @if($purchase->note)

                <div class="mt-4">

                    <h6 class="fw-bold">Note</h6>

                    <p>{{ $purchase->note }}</p>

                </div>

            @endif

        </div>

    </div>

</div>

<style>

@media print {

    .admin-sidebar,
    .navbar,
    .btn {
        display: none !important;
    }

    .card {
        box-shadow: none !important;
        border: 0 !important;
    }

    @page {
        size: A4;
        margin: 15mm;
    }

}

</style>

@endsection
