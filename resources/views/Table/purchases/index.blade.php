
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">Purchase Management</h4>
            <p class="text-muted mb-0">Manage product purchase records</p>
        </div>

        <a href="{{ route('admin.purchases.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            New Purchase
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Supplier</th>
                            <th>Purchase Date</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($purchases as $purchase)

                            <tr>

                                <td>
                                    {{ $purchases->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $purchase->invoice_no }}
                                </td>

                                <td>
                                    {{ $purchase->supplier?->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $purchase->purchase_date->format('d M Y') }}
                                </td>

                                <td>
                                    ৳{{ number_format($purchase->total_amount, 2) }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.purchases.show', $purchase->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                        View
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    No purchase records found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $purchases->links() }}
            </div>

        </div>

    </div>

</div>

@endsection
