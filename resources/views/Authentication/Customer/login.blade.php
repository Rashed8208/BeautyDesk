@extends('layouts.master')

@section('content')

<section class="login-section py-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">

                        <h3 class="text-center mb-4">
                            Customer Login
                        </h3>


                        @if(session('success'))

                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>

                        @endif


                        @if($errors->any())

                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>

                        @endif


                        <form
                            action="{{ route('customer.login.submit') }}"
                            method="POST"
                        >

                            @csrf


                            <div class="mb-3">

                                <label class="form-label">
                                    Email Address
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

                                <label>
                                    <input
                                        type="checkbox"
                                        name="remember"
                                        value="1"
                                    >

                                    Remember Me
                                </label>

                            </div>


                            <button
                                type="submit"
                                class="btn btn-dark w-100"
                            >
                                Login
                            </button>

                        </form>


                        <p class="text-center mt-4 mb-0">

                            Don't have an account?

                            <a href="{{ route('customer.register') }}">
                                Register Now
                            </a>

                        </p>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection