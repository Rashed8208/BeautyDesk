
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Edit Currency
            </h4>

            <p class="text-muted mb-0">
                Update currency information
            </p>
        </div>

        <a href="{{ route('admin.currencies.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Back

        </a>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-semibold mb-0">

                        Edit: {{ $currency->name }}

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

                    <form action="{{ route('admin.currencies.update', $currency->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Currency Name *
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name', $currency->name) }}"
                                       maxlength="100"
                                       required>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Currency Code *
                                </label>

                                <input type="text"
                                       name="code"
                                       class="form-control text-uppercase"
                                       value="{{ old('code', $currency->code) }}"
                                       maxlength="3"
                                       pattern="[A-Za-z]{3}"
                                       required>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Currency Symbol *
                                </label>

                                <input type="text"
                                       name="symbol"
                                       class="form-control"
                                       value="{{ old('symbol', $currency->symbol) }}"
                                       maxlength="10"
                                       required>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Exchange Rate *
                                </label>

                                <input type="number"
                                       name="exchange_rate"
                                       class="form-control"
                                       value="{{ old('exchange_rate', $currency->exchange_rate) }}"
                                       min="0.00000001"
                                       max="9999999999.99999999"
                                       step="0.00000001"
                                       @if($currency->is_default)
                                           readonly
                                       @endif
                                       required>

                                @if($currency->is_default)

                                    <small class="text-muted">
                                        Default currency rate must be 1.
                                    </small>

                                @else

                                    <small class="text-muted">
                                        Current rate relative to default currency
                                    </small>

                                @endif

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Status *
                                </label>

                                <select name="status"
                                        class="form-select"
                                        required>

                                    <option value="active"
                                        @selected(old('status', $currency->status) === 'active')>

                                        Active

                                    </option>

                                    <option value="inactive"
                                        @selected(old('status', $currency->status) === 'inactive')
                                        @disabled($currency->is_default)>

                                        Inactive

                                    </option>

                                </select>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label d-block">
                                    Default Currency
                                </label>

                                <input type="hidden"
                                       name="is_default"
                                       value="0">

                                <div class="form-check form-switch mt-2">

                                    <input type="checkbox"
                                           name="is_default"
                                           value="1"
                                           class="form-check-input"
                                           id="isDefault"
                                           @checked(old('is_default', $currency->is_default ? '1' : '0') == '1')
                                           @disabled($currency->is_default)>

                                    <label class="form-check-label"
                                           for="isDefault">

                                        Set as Default Currency

                                    </label>

                                </div>

                                @if($currency->is_default)

                                    <input type="hidden"
                                           name="is_default"
                                           value="1">

                                    <small class="text-muted">
                                        To change default, edit another currency.
                                    </small>

                                @endif

                            </div>

                        </div>

                        <div class="d-flex gap-2 mt-4">

                            <button type="submit"
                                    class="btn btn-primary px-4">

                                <i class="bi bi-check-circle me-1"></i>
                                Update Currency

                            </button>

                            <a href="{{ route('admin.currencies.index') }}"
                               class="btn btn-outline-secondary">

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
