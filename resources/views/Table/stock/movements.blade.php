
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">Stock Movement History</h4>
            <p class="text-muted mb-0">
                Track inventory changes
            </p>
        </div>

        <a href="{{ route('admin.stock.index') }}"
           class="btn btn-outline-secondary">
            Back to Stock
        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <form method="GET"
                  action="{{ route('admin.stock.movements') }}">

                <div class="row g-2">

                    <div class="col-md-5">

                        <select name="product_id" class="form-select">

                            <option value="">All Products</option>

                            @foreach($products as $product)

                                <option value="{{ $product->id }}"
                                    @selected(request('product_id') == $product->id)>
                                    {{ $product->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3">

                        <select name="type" class="form-select">

                            <option value="">All Types</option>

                            <option value="in"
                                @selected(request('type') === 'in')>
                                Stock In
                            </option>

                            <option value="out"
                                @selected(request('type') === 'out')>
                                Stock Out
                            </option>

                        </select>

                    </div>

                    <div class="col-md-auto">

                        <button type="submit" class="btn btn-primary">
                            Filter
                        </button>

                        <a href="{{ route('admin.stock.movements') }}"
                           class="btn btn-outline-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Before</th>
                            <th>After</th>
                            <th>Reference</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($movements as $movement)

                            <tr>

                                <td>
                                    {{ $movement->created_at->format('d M Y, h:i A') }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $movement->product?->name ?? '-' }}
                                </td>

                                <td>

                                    @if($movement->type === 'in')

                                        <span class="badge bg-success">
                                            Stock In
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Stock Out
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($movement->type === 'in')
                                        <span class="text-success fw-semibold">
                                            +{{ $movement->quantity }}
                                        </span>
                                    @else
                                        <span class="text-danger fw-semibold">
                                            -{{ $movement->quantity }}
                                        </span>
                                    @endif

                                </td>

                                <td>{{ $movement->stock_before }}</td>

                                <td>{{ $movement->stock_after }}</td>

                                <td>

                                    @if($movement->purchase_id)

                                        <a href="{{ route('admin.purchases.show', $movement->purchase_id) }}">
                                            {{ $movement->reference_no }}
                                        </a>

                                    @else

                                        {{ $movement->reference_no ?? '-' }}

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7"
                                    class="text-center py-4 text-muted">
                                    No stock movements found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $movements->links() }}
            </div>

        </div>

    </div>

</div>

@endsection
