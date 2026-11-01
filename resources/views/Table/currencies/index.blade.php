
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Currency Management
            </h4>

            <p class="text-muted mb-0">
                Manage currencies and exchange rates
            </p>
        </div>

        <a href="{{ route('admin.currencies.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>
            Add Currency

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger">

            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

        </div>

    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-semibold mb-0">
                All Currencies
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>#</th>
                            <th>Currency</th>
                            <th>Code</th>
                            <th>Symbol</th>
                            <th>Exchange Rate</th>
                            <th>Default</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($currencies as $currency)

                            <tr>

                                <td>
                                    {{ $currencies->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $currency->name }}
                                </td>

                                <td>

                                    <span class="badge bg-light text-dark border">
                                        {{ $currency->code }}
                                    </span>

                                </td>

                                <td class="fs-5">
                                    {{ $currency->symbol }}
                                </td>

                                <td>
                                    {{ rtrim(rtrim(number_format($currency->exchange_rate, 8, '.', ''), '0'), '.') }}
                                </td>

                                <td>

                                    @if($currency->is_default)

                                        <span class="badge bg-primary">
                                            Default
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($currency->status === 'active')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('admin.currencies.edit', $currency->id) }}"
                                           class="btn btn-sm btn-outline-primary">

                                            <i class="bi bi-pencil-square"></i>
                                            Edit

                                        </a>

                                        @if(!$currency->is_default)

                                            <form action="{{ route('admin.currencies.destroy', $currency->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this currency?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger">

                                                    <i class="bi bi-trash"></i>
                                                    Delete

                                                </button>

                                            </form>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center py-5 text-muted">

                                    <i class="bi bi-currency-exchange fs-2 d-block mb-2"></i>

                                    No currencies found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $currencies->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
