@extends('layouts.master')


@section('content')

<div class="container py-5">

    {{-- Page Header --}}

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h3 class="fw-bold mb-2">
                My Wishlist
            </h3>

            <p class="text-muted mb-0">
                Manage your favourite beauty products
            </p>

        </div>

        <a href="{{ route('home') }}"
           class="btn btn-outline-dark">

            <i class="bi bi-arrow-left me-1"></i>

            Continue Shopping

        </a>

    </div>


    {{-- Success Message --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>

    @endif


    {{-- Wishlist Product Count --}}

    @php
        $availableWishlists = $wishlists->filter(
            fn ($item) => $item->product !== null
        );
    @endphp

    <div class="mb-4">

        <h6 class="text-muted">

            Total Wishlist Items:

            <span class="fw-bold text-dark">
                {{ $availableWishlists->count() }}
            </span>

        </h6>

    </div>


    {{-- Wishlist Products --}}

    <div class="row g-4">

        @forelse($availableWishlists as $item)

            @php
                $product = $item->product;

                $image = $product->image
                    ? asset('uploads/products/' . $product->image)
                    : null;
            @endphp

            <div class="col-6 col-md-4 col-lg-3">

                <div class="card border-0 shadow-sm h-100">

                    {{-- Product Image --}}

                    <div class="position-relative">

                        @if($image)

                            <img
                                src="{{ $image }}"
                                alt="{{ $product->name }}"
                                class="card-img-top"
                                style="height: 230px; object-fit: cover;"
                            >

                        @else

                            <div class="bg-light d-flex justify-content-center align-items-center"
                                 style="height: 230px;">

                                <i class="bi bi-image fs-1 text-muted"></i>

                            </div>

                        @endif


                        {{-- Remove Heart Button --}}

                        <form
                            action="{{ route('wishlist.destroy', $item->id) }}"
                            method="POST"
                            class="position-absolute top-0 end-0 m-2"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-light rounded-circle shadow-sm"
                                title="Remove from Wishlist"
                                onclick="return confirm('Remove this product from wishlist?')"
                            >

                                <i class="bi bi-heart-fill text-danger"></i>

                            </button>

                        </form>

                    </div>


                    {{-- Product Information --}}

                    <div class="card-body d-flex flex-column">

                        <h6 class="fw-semibold mb-2">

                            {{ $product->name }}

                        </h6>


                        {{-- Product Price --}}

                        <div class="mb-3">

                            @if(!is_null($product->price))

                                <span class="fw-bold text-danger fs-6">

                                    ৳{{ number_format($product->price, 2) }}

                                </span>

                            @else

                                <span class="text-muted">
                                    Price unavailable
                                </span>

                            @endif

                        </div>


                        {{-- Remove Button --}}

                        <div class="mt-auto">

                            <form
                                action="{{ route('wishlist.destroy', $item->id) }}"
                                method="POST"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-outline-danger btn-sm w-100"
                                    onclick="return confirm('Are you sure you want to remove this product?')"
                                >

                                    <i class="bi bi-trash me-1"></i>

                                    Remove

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            {{-- Empty Wishlist --}}

            <div class="col-12">

                <div class="text-center py-5">

                    <i class="bi bi-heart text-muted"
                       style="font-size: 65px;">
                    </i>

                    <h4 class="fw-bold mt-3">
                        Your Wishlist is Empty
                    </h4>

                    <p class="text-muted mt-2">
                        You haven't added any beauty products to your wishlist yet.
                    </p>

                    <a href="{{ route('home') }}"
                       class="btn btn-dark mt-3">

                        <i class="bi bi-bag me-1"></i>

                        Start Shopping

                    </a>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection