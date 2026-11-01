
@extends('layouts.master')


@section('content')

<div class="container py-5">


    {{-- Page Header --}}

    <div class="row mb-4">

        <div class="col-12">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h3 class="fw-bold mb-2">
                        Edit Profile
                    </h3>

                    <p class="text-muted mb-0">
                        Update your personal information
                    </p>

                </div>


                <a href="{{ route('customer.profile.show') }}"
                   class="btn btn-outline-dark">

                    <i class="bi bi-arrow-left me-1"></i>

                    Back to Profile

                </a>

            </div>

        </div>

    </div>



    <div class="row justify-content-center">

        <div class="col-lg-9">


            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">


                    {{-- Validation Error Summary --}}

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                Please check the following errors:
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif



                    <form action="{{ route('customer.profile.update') }}"
                          method="POST">

                        @csrf

                        @method('PUT')



                        {{-- Personal Information --}}

                        <h5 class="fw-bold mb-4">
                            Personal Information
                        </h5>



                        <div class="row g-4">


                            {{-- Full Name --}}

                            <div class="col-md-6">

                                <label for="name"
                                       class="form-label fw-semibold">

                                    Full Name

                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $customer->name) }}"
                                    placeholder="Enter your full name"
                                    maxlength="255"
                                    required
                                >


                                @error('name')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>



                            {{-- Email Address --}}

                            <div class="col-md-6">

                                <label for="email"
                                       class="form-label fw-semibold">

                                    Email Address

                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $customer->email) }}"
                                    placeholder="Enter your email address"
                                    maxlength="255"
                                    required
                                >


                                @error('email')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>



                            {{-- Phone Number --}}

                            <div class="col-md-6">

                                <label for="phone"
                                       class="form-label fw-semibold">

                                    Phone Number

                                </label>


                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $customer->phone) }}"
                                    placeholder="Enter your phone number"
                                    maxlength="20"
                                >


                                @error('phone')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>



                            {{-- Address --}}

                            <div class="col-12">

                                <label for="address"
                                       class="form-label fw-semibold">

                                    Address

                                </label>


                                <textarea
                                    id="address"
                                    name="address"
                                    rows="3"
                                    maxlength="255"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Enter your full address"
                                >{{ old('address', $customer->address) }}</textarea>


                                @error('address')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>


                        </div>



                        <hr class="my-5">



                        {{-- Change Password --}}

                        <h5 class="fw-bold mb-2">
                            Change Password
                        </h5>


                        <p class="text-muted small mb-4">
                            Leave these fields empty if you don't want to change your password.
                        </p>



                        <div class="row g-4">


                            {{-- Current Password --}}

                            <div class="col-12">

                                <label for="current_password"
                                       class="form-label fw-semibold">

                                    Current Password

                                </label>


                                <input
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="Enter current password"
                                    autocomplete="current-password"
                                >


                                @error('current_password')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>



                            {{-- New Password --}}

                            <div class="col-md-6">

                                <label for="password"
                                       class="form-label fw-semibold">

                                    New Password

                                </label>


                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter new password"
                                    minlength="8"
                                    autocomplete="new-password"
                                >


                                @error('password')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>



                            {{-- Confirm New Password --}}

                            <div class="col-md-6">

                                <label for="password_confirmation"
                                       class="form-label fw-semibold">

                                    Confirm New Password

                                </label>


                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm new password"
                                    minlength="8"
                                    autocomplete="new-password"
                                >

                            </div>


                        </div>



                        {{-- Action Buttons --}}

                        <div class="d-flex justify-content-end flex-wrap gap-3 mt-5">


                            <a href="{{ route('customer.profile.show') }}"
                               class="btn btn-outline-secondary px-4">

                                Cancel

                            </a>



                            <button type="submit"
                                    class="btn btn-dark px-4">

                                <i class="bi bi-check-circle me-1"></i>

                                Save Changes

                            </button>


                        </div>


                    </form>


                </div>

            </div>


        </div>

    </div>


</div>

@endsection
