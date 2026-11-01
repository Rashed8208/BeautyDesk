
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">
                        Edit Supplier
                    </h5>

                </div>

                <div class="card-body p-4">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.suppliers.update', $supplier->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Supplier Name *</label>

                                <input type="text"
                                       name="name"
                                       value="{{ old('name', $supplier->name) }}"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>

                                <input type="text"
                                       name="company_name"
                                       value="{{ old('company_name', $supplier->company_name) }}"
                                       class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone *</label>

                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone', $supplier->phone) }}"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>

                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $supplier->email) }}"
                                       class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Address</label>

                                <textarea name="address"
                                          rows="3"
                                          class="form-control">{{ old('address', $supplier->address) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status</label>

                                <select name="status" class="form-select">

                                    <option value="active"
                                        @selected(old('status', $supplier->status) === 'active')>
                                        Active
                                    </option>

                                    <option value="inactive"
                                        @selected(old('status', $supplier->status) === 'inactive')>
                                        Inactive
                                    </option>

                                </select>
                            </div>

                        </div>

                        <div class="mt-4 d-flex gap-2">

                            <button type="submit" class="btn btn-primary">
                                Update Supplier
                            </button>

                            <a href="{{ route('admin.suppliers.index') }}"
                               class="btn btn-outline-secondary">
                                Back
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
