
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold mb-0">
            Supplier Management
        </h4>

        <a href="{{ route('admin.suppliers.create') }}"
           class="btn btn-primary">
            + Add Supplier
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($suppliers as $supplier)

                            <tr>

                                <td>
                                    {{ $suppliers->firstItem() + $loop->index }}
                                </td>

                                <td>{{ $supplier->name }}</td>

                                <td>{{ $supplier->company_name ?? '-' }}</td>

                                <td>{{ $supplier->phone }}</td>

                                <td>{{ $supplier->email ?? '-' }}</td>

                                <td>
                                    @if($supplier->status === 'active')
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

                                        <a href="{{ route('admin.suppliers.edit', $supplier->id) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this supplier?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No suppliers found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $suppliers->links() }}
            </div>

        </div>

    </div>

</div>

@endsection
