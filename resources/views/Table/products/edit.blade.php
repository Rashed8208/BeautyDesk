@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Edit Product
        </h4>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>
            Back

        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">


            <form action="{{ route('products.update',$product->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                <div class="row">


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Product Name
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $product->name }}"
                               class="form-control">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            SKU
                        </label>

                        <input type="text"
                               value="{{ $product->sku }}"
                               class="form-control"
                               readonly>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Price
                        </label>

                        <input type="number"
                               name="price"
                               value="{{ $product->price }}"
                               class="form-control">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Sale Price
                        </label>

                        <input type="number"
                               name="sale_price"
                               value="{{ $product->sale_price }}"
                               class="form-control">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Stock
                        </label>

                        <input type="number"
                               name="stock"
                               value="{{ $product->stock }}"
                               class="form-control">

                    </div>


                    <div class="col-12 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control">{{ $product->description }}</textarea>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>


                        <select name="status"
                                class="form-select">


                            <option value="active"
                            {{ $product->status=='active'?'selected':'' }}>
                                Active
                            </option>


                            <option value="inactive"
                            {{ $product->status=='inactive'?'selected':'' }}>
                                Inactive
                            </option>


                        </select>


                    </div>


                </div>


                <button class="btn btn-primary">

                    Update Product

                </button>


            </form>


        </div>

    </div>


</div>


@endsection