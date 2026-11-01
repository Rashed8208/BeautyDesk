@extends('layouts.master')

@section('content')

<section class="register-section py-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">

                        <h3 class="text-center mb-4">
                            Create Account
                        </h3>


                        @if($errors->any())

                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <form
                            action="{{ route('customer.register.submit') }}"
                            method="POST"
                        >

                            @csrf


                            <div class="mb-3">

                                <label class="form-label">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control"
                                    required
                                >

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control"
                                    required
                                >

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Phone
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="form-control"
                                >

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required
                                >

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Confirm Password
                                </label>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    required
                                >

                            </div>


                            <button
                                type="submit"
                                class="btn btn-dark w-100"
                            >
                                Register
                            </button>

                        </form>


                        <p class="text-center mt-4 mb-0">

                            Already have an account?

                            <a href="{{ route('customer.login') }}">
                                Login
                            </a>

                        </p>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection