
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Create Purchase</h4>
            <p class="text-muted mb-0">
                Add products and update inventory
            </p>
        </div>

        <a href="{{ route('admin.purchases.index') }}"
           class="btn btn-outline-secondary">
            Back
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please correct the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.purchases.store') }}"
          method="POST"
          id="purchaseForm">

        @csrf

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-3">
                <h5 class="fw-bold mb-0">Purchase Information</h5>
            </div>

            <div class="card-body">

                <div class="row g-3">

                    <div class="col-md-6">

                        <label class="form-label">Supplier *</label>

                        <select name="supplier_id"
                                class="form-select"
                                required>

                            <option value="">Select Supplier</option>

                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    @selected(old('supplier_id') == $supplier->id)>
                                    {{ $supplier->name }}
                                    @if($supplier->company_name)
                                        - {{ $supplier->company_name }}
                                    @endif
                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">Purchase Date *</label>

                        <input type="date"
                               name="purchase_date"
                               class="form-control"
                               value="{{ old('purchase_date', date('Y-m-d')) }}"
                               max="{{ date('Y-m-d') }}"
                               required>

                    </div>

                    <div class="col-12">

                        <label class="form-label">Purchase Note</label>

                        <textarea name="note"
                                  class="form-control"
                                  rows="2"
                                  placeholder="Optional note">{{ old('note') }}</textarea>

                    </div>

                </div>

            </div>

        </div>

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">Purchase Items</h5>

                <button type="button"
                        class="btn btn-primary btn-sm"
                        onclick="addPurchaseRow()">
                    <i class="bi bi-plus-lg"></i>
                    Add Product
                </button>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead class="table-light">
                            <tr>
                                <th style="min-width:230px">Product</th>
                                <th>Current Stock</th>
                                <th style="min-width:100px">Quantity</th>
                                <th style="min-width:130px">Unit Cost (৳)</th>
                                <th>Subtotal (৳)</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="purchaseItems"></tbody>

                    </table>

                </div>

                <div class="row justify-content-end mt-3">

                    <div class="col-md-4">

                        <div class="bg-light rounded p-3">

                            <div class="d-flex justify-content-between align-items-center">

                                <span class="fw-semibold">Grand Total</span>

                                <h4 class="fw-bold mb-0" id="grandTotal">
                                    ৳0.00
                                </h4>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="d-flex justify-content-end gap-2">

            <a href="{{ route('admin.purchases.index') }}"
               class="btn btn-outline-secondary">
                Cancel
            </a>

            <button type="submit"
                    class="btn btn-success"
                    id="savePurchaseBtn">
                <i class="bi bi-check-circle me-1"></i>
                Save Purchase
            </button>

        </div>

    </form>

</div>

<template id="purchaseRowTemplate">

    <tr class="purchase-row">

        <td>

            <select class="form-select product-select"
                    data-field="product_id"
                    required>

                <option value="">Select Product</option>

                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                            data-stock="{{ $product->stock ?? 0 }}">
                        {{ $product->name }}
                    </option>
                @endforeach

            </select>

        </td>

        <td>
            <span class="badge bg-secondary current-stock">
                0
            </span>
        </td>

        <td>

            <input type="number"
                   class="form-control item-quantity"
                   data-field="quantity"
                   min="1"
                   max="1000000"
                   value="1"
                   step="1"
                   required>

        </td>

        <td>

            <input type="number"
                   class="form-control item-cost"
                   data-field="unit_cost"
                   min="0"
                   max="9999999999.99"
                   step="0.01"
                   value="0"
                   required>

        </td>

        <td>
            <span class="fw-semibold item-subtotal">
                0.00
            </span>
        </td>

        <td>

            <button type="button"
                    class="btn btn-sm btn-outline-danger remove-row">
                <i class="bi bi-trash"></i>
                Remove
            </button>

        </td>

    </tr>

</template>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const tbody = document.getElementById('purchaseItems');

    const rowTemplate = document.getElementById('purchaseRowTemplate');

    const grandTotal = document.getElementById('grandTotal');

    const form = document.getElementById('purchaseForm');

    const saveButton = document.getElementById('savePurchaseBtn');

    let nextIndex = 0;

    function updateTotal() {

        let total = 0;

        tbody.querySelectorAll('.purchase-row').forEach(function (row) {

            const quantity = Number(
                row.querySelector('.item-quantity').value
            ) || 0;

            const unitCost = Number(
                row.querySelector('.item-cost').value
            ) || 0;

            const subtotal = quantity * unitCost;

            row.querySelector('.item-subtotal').textContent =
                subtotal.toFixed(2);

            total += subtotal;

        });

        grandTotal.textContent = '৳' + total.toFixed(2);

    }

    function addRow(item = {}) {

        const fragment = rowTemplate.content.cloneNode(true);

        const row = fragment.querySelector('tr');

        const index = nextIndex++;

        row.querySelectorAll('[data-field]').forEach(function (field) {

            field.name = 'items[' + index + '][' + field.dataset.field + ']';

        });

        row.querySelector('.product-select').value =
            item.product_id || '';

        row.querySelector('.item-quantity').value =
            item.quantity ?? 1;

        row.querySelector('.item-cost').value =
            item.unit_cost ?? 0;

        tbody.appendChild(fragment);

        const addedRow = tbody.lastElementChild;

        updateRowStock(addedRow);

        updateTotal();

    }

    function updateRowStock(row) {

        const select = row.querySelector('.product-select');

        const selectedOption = select.selectedOptions[0];

        const stock = selectedOption
            ? selectedOption.dataset.stock || '0'
            : '0';

        row.querySelector('.current-stock').textContent = stock;

    }

    window.addPurchaseRow = function () {

        addRow();

    };

    tbody.addEventListener('input', function (event) {

        if (
            event.target.matches('.item-quantity') ||
            event.target.matches('.item-cost')
        ) {
            updateTotal();
        }

    });

    tbody.addEventListener('change', function (event) {

        if (event.target.matches('.product-select')) {

            updateRowStock(event.target.closest('tr'));

            updateTotal();

        }

    });

    tbody.addEventListener('click', function (event) {

        const removeButton = event.target.closest('.remove-row');

        if (!removeButton) {
            return;
        }

        removeButton.closest('tr').remove();

        updateTotal();

    });

    form.addEventListener('submit', function (event) {

        const rows = Array.from(
            tbody.querySelectorAll('.purchase-row')
        );

        if (rows.length === 0) {

            event.preventDefault();

            alert('Please add at least one product.');

            return;

        }

        const selectedProducts = rows.map(function (row) {

            return row.querySelector('.product-select').value;

        });

        if (
            selectedProducts.some(value => !value) ||
            new Set(selectedProducts).size !== selectedProducts.length
        ) {

            event.preventDefault();

            alert('Please select different products for each row.');

            return;

        }

        if (!form.checkValidity()) {
            return;
        }

        saveButton.disabled = true;

        saveButton.innerHTML = 'Saving...';

    });

    const oldItems = @json(old('items', []));

    if (Array.isArray(oldItems) && oldItems.length > 0) {

        oldItems.forEach(function (item) {
            addRow(item);
        });

    } else {

        addRow();

    }

});

</script>

@endsection
