
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">Stock Management</h4>
            <p class="text-muted mb-0">Current product inventory</p>
        </div>

        <a href="{{ route('admin.stock.movements') }}"
           class="btn btn-outline-primary">
            <i class="bi bi-clock-history me-1"></i>
            Stock History
        </a>

    </div>

    <div class="row g-3 mb-4">

        <div class="col-lg-3 col-sm-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">
                    <p class="text-muted mb-2">Total Products</p>
                    <h3 class="fw-bold mb-0">
                        {{ number_format($totalProducts) }}
                    </h3>
                </div>

            </div>

        </div>

        <div class="col-lg-3 col-sm-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">
                    <p class="text-muted mb-2">Total Stock Units</p>
                    <h3 class="fw-bold mb-0">
                        {{ number_format($totalStock) }}
                    </h3>
                </div>

            </div>

        </div>

        <div class="col-lg-3 col-sm-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">
                    <p class="text-muted mb-2">Low Stock Products</p>
                    <h3 class="fw-bold text-warning mb-0">
                        {{ number_format($lowStockCount) }}
                    </h3>
                </div>

            </div>

        </div>

        <div class="col-lg-3 col-sm-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">
                    <p class="text-muted mb-2">Out of Stock</p>
                    <h3 class="fw-bold text-danger mb-0">
                        {{ number_format($outOfStockCount) }}
                    </h3>
                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <form method="GET"
                  action="{{ route('admin.stock.index') }}">

                <div class="row g-2">

                    <div class="col-md-5">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Search product name...">

                    </div>

                    <div class="col-md-auto">

                        <button class="btn btn-primary" type="submit">
                            Search
                        </button>

                        <a href="{{ route('admin.stock.index') }}"
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
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Available Stock</th>
                            <th>Stock Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $product)

                            <tr>

                                <td>
                                    {{ $products->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $product->name }}
                                </td>

                                <td>
                                    {{ number_format($product->stock ?? 0) }}
                                </td>

                                <td>

                                    @if($product->stock <= 0)

                                        <span class="badge bg-danger">
                                            Out of Stock
                                        </span>

                                    @elseif($product->stock <= 5)

                                        <span class="badge bg-warning text-dark">
                                            Low Stock
                                        </span>

                                    @else

                                        <span class="badge bg-success">
                                            In Stock
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4"
                                    class="text-center py-4 text-muted">
                                    No products found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $products->links() }}
            </div>

        </div>

    </div>

</div>

@endsection
