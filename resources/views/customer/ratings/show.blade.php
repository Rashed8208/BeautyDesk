
@extends('layouts.master')


@section('content')

<style>

    .rating-stars {
        display: inline-flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 8px;
    }

    .rating-stars input {
        position: absolute;
        opacity: 0;
        width: 1px;
        height: 1px;
    }

    .rating-stars label {
        cursor: pointer;
        color: #d1d5db;
        font-size: 35px;
        transition: color 0.2s;
    }

    .rating-stars input:checked ~ label,
    .rating-stars label:hover,
    .rating-stars label:hover ~ label {
        color: #f5b301;
    }

    .rating-stars input:focus-visible + label {
        outline: 2px solid #212529;
        outline-offset: 3px;
        border-radius: 4px;
    }

</style>


<div class="container py-5">

    {{-- Page Header --}}

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h3 class="fw-bold mb-2">
                Rate Product
            </h3>

            <p class="text-muted mb-0">
                Share your experience with this product
            </p>

        </div>

        <a href="{{ route('customer.ratings.index') }}"
           class="btn btn-outline-dark">

            <i class="bi bi-arrow-left me-1"></i>
            My Ratings

        </a>

    </div>


    {{-- Success Message --}}

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error Message --}}

    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif


    {{-- Validation Errors --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">


                    {{-- Product Information --}}

                    <h4 class="fw-bold mb-3">

                        {{ $product->name }}

                    </h4>


                    {{-- Average Rating --}}

                    <div class="mb-4">

                        @php

                            $averageRating = round(
                                (float) ($product->ratings_avg_rating ?? 0),
                                1
                            );

                            $totalRatings = $product->ratings_count ?? 0;

                        @endphp


                        <div class="d-flex align-items-center flex-wrap gap-2">

                            <span class="fs-5 fw-bold">

                                {{ number_format($averageRating, 1) }}

                            </span>


                            <div class="text-warning">

                                @for($star = 1; $star <= 5; $star++)

                                    @if($star <= round($averageRating))

                                        <i class="bi bi-star-fill"></i>

                                    @else

                                        <i class="bi bi-star text-muted"></i>

                                    @endif

                                @endfor

                            </div>


                            <span class="text-muted">

                                ({{ $totalRatings }} Ratings)

                            </span>

                        </div>

                    </div>



                    <hr class="my-4">



                    {{-- Rating Form --}}

                    <h5 class="fw-bold mb-3">

                        {{ $myRating ? 'Update Your Rating' : 'Give Your Rating' }}

                    </h5>


                    <form
                        action="{{ $myRating
                            ? route('customer.ratings.update', $myRating->id)
                            : route('customer.ratings.store', $product->id) }}"
                        method="POST"
                    >

                        @csrf


                        @if($myRating)

                            @method('PUT')

                        @endif


                        {{-- Star Selection --}}

                        @php

                            $selectedRating = old(
                                'rating',
                                $myRating->rating ?? 0
                            );

                        @endphp


                        <div class="mb-4">

                            <label class="form-label fw-semibold d-block">

                                Select Rating

                                <span class="text-danger">*</span>

                            </label>


                            <div class="rating-stars" role="group" aria-label="Select product rating">

                                @for($star = 5; $star >= 1; $star--)

                                    <input
                                        type="radio"
                                        name="rating"
                                        id="rating-{{ $star }}"
                                        value="{{ $star }}"
                                        required
                                        {{ (int) $selectedRating === $star ? 'checked' : '' }}
                                    >


                                    <label
                                        for="rating-{{ $star }}"
                                        title="{{ $star }} Stars"
                                        aria-label="{{ $star }} Stars"
                                    >

                                        <i class="bi bi-star-fill"></i>

                                    </label>

                                @endfor

                            </div>


                            @error('rating')

                                <div class="text-danger small mt-2">
                                    {{ $message }}
                                </div>

                            @enderror


                            <p class="text-muted small mt-2">

                                Choose between 1 and 5 stars.

                            </p>

                        </div>



                        {{-- Submit Button --}}

                        <button type="submit"
                                class="btn btn-dark px-4">

                            <i class="bi bi-star-fill me-1"></i>

                            {{ $myRating ? 'Update Rating' : 'Submit Rating' }}

                        </button>


                        <a href="{{ route('home') }}"
                           class="btn btn-outline-secondary ms-2">

                            Cancel

                        </a>

                    </form>


                    {{-- Delete Existing Rating --}}

                    @if($myRating)

                        <hr class="my-4">


                        <form
                            action="{{ route('customer.ratings.destroy', $myRating->id) }}"
                            method="POST"
                        >

                            @csrf

                            @method('DELETE')


                            <button type="submit"
                                    class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete your rating?')">

                                <i class="bi bi-trash me-1"></i>

                                Delete My Rating

                            </button>

                        </form>

                    @endif


                </div>

            </div>

        </div>

    </div>

</div>

@endsection
