<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login</title>


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body class="bg-light">


<div class="container">

    <div
        class="row justify-content-center align-items-center"
        style="min-height:100vh;"
    >

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow">

                <div class="card-body p-4">

                    <h3 class="text-center mb-4">
                        Admin Login
                    </h3>


                    @if($errors->any())

                        <div class="alert alert-danger">

                            {{ $errors->first() }}

                        </div>

                    @endif


                    <form
                        action="{{ route('admin.login.submit') }}"
                        method="POST"
                    >

                        @csrf


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

                </div>

            </div>

        </div>

    </div>

</div>


</body>
</html>