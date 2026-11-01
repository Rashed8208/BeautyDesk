@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Add Product
        </h4>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">


            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                @csrf


                <div class="row">


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Country
                        </label>

                        <select name="country_id" class="form-select">

                            <option value="">
                                Select Country
                            </option>

                            @foreach($countries as $country)

                            <option value="{{ $country->id }}">
                                {{ $country->name }}
                            </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Category
                        </label>

                        <select name="category_id" class="form-select">

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Sub Category
                        </label>

                        <select name="sub_category_id" class="form-select">

                            <option value="">
                                Select Sub Category
                            </option>

                            @foreach($subCategories as $subCategory)

                            <option value="{{ $subCategory->id }}">
                                {{ $subCategory->name }}
                            </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Brand
                        </label>

                        <select name="brand_id" class="form-select">

                            <option value="">
                                Select Brand
                            </option>

                            @foreach($brands as $brand)

                            <option value="{{ $brand->id }}">
                                {{ $brand->name }}
                            </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Product Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter product name">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            SKU
                        </label>

                        <input type="text"
                               name="sku"
                               class="form-control"
                               placeholder="Product SKU">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Price
                        </label>

                        <input type="number"
                               name="price"
                               class="form-control">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Sale Price
                        </label>

                        <input type="number"
                               name="sale_price"
                               class="form-control">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Stock
                        </label>

                        <input type="number"
                               name="stock"
                               class="form-control">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Thumbnail Image
                        </label>

                        <input type="file"
                               name="thumbnail"
                               class="form-control">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="active">
                                Active
                            </option>

                            <option value="inactive">
                                Inactive
                            </option>

                        </select>

                    </div>


                    <div class="col-12 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Product description"></textarea>

                    </div>


                </div>


                <button type="submit" class="btn btn-primary">

                    Save Product

                </button>


            </form>


        </div>

    </div>


</div>

@endsection