
@extends('layouts.master')


@section('content')

<div class="container py-5">


    {{-- Page Header --}}

    <div class="row mb-4">

        <div class="col-12">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h3 class="fw-bold mb-2">
                        My Profile
                    </h3>

                    <p class="text-muted mb-0">
                        Manage your personal account information
                    </p>

                </div>


                <a href="{{ route('customer.profile.edit') }}"
                   class="btn btn-dark">

                    <i class="bi bi-pencil-square me-1"></i>

                    Edit Profile

                </a>

            </div>

        </div>

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



    <div class="row justify-content-center">

        <div class="col-lg-9">


            {{-- Profile Card --}}

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">


                    {{-- Customer Information Header --}}

                    <div class="text-center mb-4">

                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light mb-3"
                             style="width: 90px; height: 90px;">

                            <i class="bi bi-person-circle text-secondary"
                               style="font-size: 60px;">
                            </i>

                        </div>


                        <h4 class="fw-bold mb-1">

                            {{ $customer->name }}

                        </h4>


                        <p class="text-muted mb-0">

                            {{ $customer->email }}

                        </p>

                    </div>



                    <hr class="my-4">



                    {{-- Personal Information --}}

                    <h5 class="fw-bold mb-4">
                        Personal Information
                    </h5>



                    <div class="row g-4">


                        {{-- Full Name --}}

                        <div class="col-md-6">

                            <label class="text-muted small mb-2">
                                Full Name
                            </label>

                            <div class="fw-semibold">

                                {{ $customer->name }}

                            </div>

                        </div>



                        {{-- Email Address --}}

                        <div class="col-md-6">

                            <label class="text-muted small mb-2">
                                Email Address
                            </label>

                            <div class="fw-semibold text-break">

                                {{ $customer->email }}

                            </div>

                        </div>



                        {{-- Phone Number --}}

                        <div class="col-md-6">

                            <label class="text-muted small mb-2">
                                Phone Number
                            </label>

                            <div class="fw-semibold">

                                {{ $customer->phone ?: 'Not Provided' }}

                            </div>

                        </div>



                        {{-- Account Created --}}

                        <div class="col-md-6">

                            <label class="text-muted small mb-2">
                                Member Since
                            </label>

                            <div class="fw-semibold">

                                {{ $customer->created_at?->format('d M, Y') ?? 'Not Available' }}

                            </div>

                        </div>



                        {{-- Address --}}

                        <div class="col-12">

                            <label class="text-muted small mb-2">
                                Address
                            </label>

                            <div class="fw-semibold">

                                {{ $customer->address ?: 'Not Provided' }}

                            </div>

                        </div>


                    </div>



                    <hr class="my-4">



                    {{-- Account Actions --}}

                    <div class="d-flex flex-wrap gap-3">


                        <a href="{{ route('customer.profile.edit') }}"
                           class="btn btn-dark">

                            <i class="bi bi-pencil-square me-1"></i>

                            Update Profile

                        </a>



                        <a href="{{ route('wishlist.index') }}"
                           class="btn btn-outline-danger">

                            <i class="bi bi-heart me-1"></i>

                            My Wishlist

                        </a>



                        <a href="{{ route('home') }}"
                           class="btn btn-outline-secondary">

                            <i class="bi bi-bag me-1"></i>

                            Continue Shopping

                        </a>


                    </div>


                </div>

            </div>


        </div>

    </div>


</div>

@endsection
