@extends('layouts.master')


@section('content')

<div class="container py-5">

    {{-- Page Header --}}

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h3 class="fw-bold mb-2">
                My Product Ratings
            </h3>

            <p class="text-muted mb-0">
                View and manage your product ratings
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

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>

    @endif


    {{-- Ratings Count --}}

    <div class="mb-4">

        <h6 class="text-muted">

            Total Ratings:

            <span class="fw-bold text-dark">
                {{ $ratings->total() }}
            </span>

        </h6>

    </div>


    {{-- Ratings List --}}

    <div class="row g-4">

        @forelse($ratings as $item)

            @if($item->product)

                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body p-4 d-flex flex-column">

                            {{-- Product Name --}}

                            <h5 class="fw-bold mb-3">

                                {{ $item->product->name }}

                            </h5>


                            {{-- Star Rating --}}

                            <div class="mb-3">

                                @for($star = 1; $star <= 5; $star++)

                                    @if($star <= $item->rating)

                                        <i class="bi bi-star-fill text-warning"></i>

                                    @else

                                        <i class="bi bi-star text-muted"></i>

                                    @endif

                                @endfor

                                <span class="ms-2 fw-semibold">

                                    {{ $item->rating }}/5

                                </span>

                            </div>


                            {{-- Rating Date --}}

                            <p class="text-muted small mb-4">

                                Rated on:

                                {{ $item->created_at->format('d M, Y') }}

                            </p>


                            {{-- Action Buttons --}}

                            <div class="mt-auto d-flex gap-2">

                                <a href="{{ route('customer.ratings.show', $item->product_id) }}"
                                   class="btn btn-outline-dark btn-sm flex-fill">

                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit Rating

                                </a>


                                <form action="{{ route('customer.ratings.destroy', $item->id) }}"
                                      method="POST"
                                      class="flex-fill">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm w-100"
                                            onclick="return confirm('Delete this rating?')">

                                        <i class="bi bi-trash me-1"></i>
                                        Delete

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        @empty

            {{-- Empty Ratings --}}

            <div class="col-12">

                <div class="text-center py-5">

                    <i class="bi bi-star text-muted"
                       style="font-size: 65px;"></i>

                    <h4 class="fw-bold mt-3">
                        No Ratings Yet
                    </h4>

                    <p class="text-muted mt-2">
                        You haven't rated any beauty products yet.
                    </p>

                    <a href="{{ route('home') }}"
                       class="btn btn-dark mt-3">

                        <i class="bi bi-bag me-1"></i>
                        Explore Products

                    </a>

                </div>

            </div>

        @endforelse

    </div>


    {{-- Pagination --}}

    @if($ratings->hasPages())

        <div class="mt-5">

            {{ $ratings->links('pagination::bootstrap-5') }}

        </div>

    @endif

</div>

@endsection