
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BeautyDesk - Premium Beauty Products">

    <title>@yield('title', 'BeautyDesk | Premium Beauty Store')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Existing Ashion CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @stack('styles')
</head>

<body>

    

<!-- ==========================================
     RESPONSIVE FIXED BEAUTYDESK HEADER
=========================================== -->

<header class="bg-white shadow-sm fixed-top">

    <nav class="navbar navbar-expand-lg navbar-light bg-white">

        <div class="container-fluid px-3 px-lg-4">

            <!-- Logo -->
            <a class="navbar-brand me-3" href="{{ route('home') }}">
                <img
                    src="{{ asset('assets/img/logo.png') }}"
                    alt="BeautyDesk Logo"
                    class="img-fluid"
                    style="max-height: 55px; width: auto;"
                >
            </a>

            <!-- Mobile / Tablet Toggle -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#beautyDeskNavbar"
                aria-controls="beautyDeskNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="beautyDeskNavbar">

                <!-- Main Menu -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-2">

                    <!-- Home -->
                    <li class="nav-item">
                        <a
                            class="nav-link rounded-pill px-3 py-2 fw-semibold
                            {{ request()->routeIs('home') ? 'active bg-danger-subtle text-danger' : 'text-dark' }}"
                            href="{{ route('home') }}"
                        >
                            Home
                        </a>
                    </li>

                    <!-- Saree -->
                    <li class="nav-item">
                        <a
                            class="nav-link rounded-pill px-3 py-2 fw-semibold
                            {{ request()->routeIs('saree') ? 'active bg-danger-subtle text-danger' : 'text-dark' }}"
                            href="{{ route('saree') }}"
                        >
                            Saree
                        </a>
                    </li>

                    <!-- Kurti -->
                    <li class="nav-item">
                        <a
                            class="nav-link rounded-pill px-3 py-2 fw-semibold
                            {{ request()->routeIs('kurti') ? 'active bg-danger-subtle text-danger' : 'text-dark' }}"
                            href="{{ route('kurti') }}"
                        >
                            Kurti
                        </a>
                    </li>

                    <!-- Three Piece -->
                    <li class="nav-item">
                        <a
                            class="nav-link rounded-pill px-3 py-2 fw-semibold
                            {{ request()->routeIs('three-piece') ? 'active bg-danger-subtle text-danger' : 'text-dark' }}"
                            href="{{ route('three-piece') }}"
                        >
                            Three-Piece
                        </a>
                    </li>

                    <!-- Burqas -->
                    <li class="nav-item">
                        <a
                            class="nav-link rounded-pill px-3 py-2 fw-semibold
                            {{ request()->routeIs('abayas-burqas') ? 'active bg-danger-subtle text-danger' : 'text-dark' }}"
                            href="{{ route('abayas-burqas') }}"
                        >
                            Burqas
                        </a>
                    </li>

                    <!-- My Account Dropdown -->
                    @auth('customer')

                    <li class="nav-item dropdown">

                        <a
                            class="nav-link dropdown-toggle rounded-pill px-3 py-2 fw-semibold text-dark"
                            href="#"
                            id="myAccountDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa fa-user me-1"></i>
                            My Account
                        </a>

                        <ul
                            class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3"
                            aria-labelledby="myAccountDropdown"
                        >

                            <li>
                                <a class="dropdown-item py-2"
                                   href="{{ route('customer.profile.show') }}">
                                    <i class="fa fa-user me-2"></i>
                                    My Profile
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2"
                                   href="{{ route('wishlist.index') }}">
                                    <i class="fa fa-heart me-2"></i>
                                    Wishlist
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2"
                                   href="{{ route('customer.ratings.index') }}">
                                    <i class="fa fa-star me-2"></i>
                                    My Ratings
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2"
                                   href="{{ route('customer.reviews.index') }}">
                                    <i class="fa fa-comment me-2"></i>
                                    My Reviews
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="{{ route('customer.logout') }}" method="POST">
                                    @csrf

                                    <button
                                        type="submit"
                                        class="dropdown-item py-2 text-danger"
                                    >
                                        <i class="fa fa-sign-out me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </li>

                    @endauth

                    <!-- Contact -->
                    <li class="nav-item">
                        <a
                            class="nav-link rounded-pill px-3 py-2 fw-semibold text-dark"
                            href="#"
                        >
                            Contact
                        </a>
                    </li>

                </ul>

                <!-- Right Side Actions -->
                <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-3">

                    <!-- Guest Authentication Links -->
                    @guest('customer')

                    <div class="d-flex align-items-center justify-content-lg-end gap-3">

                        <a
                            href="{{ route('customer.login') }}"
                            class="text-dark text-decoration-none fw-semibold"
                        >
                            <i class="fa fa-sign-in me-1"></i>
                            Login
                        </a>

                        <a
                            href="{{ route('customer.register') }}"
                            class="text-dark text-decoration-none fw-semibold"
                        >
                            <i class="fa fa-user-plus me-1"></i>
                            Register
                        </a>

                    </div>

                    @endguest

                    <!-- Cart and Checkout -->
                    <div class="d-flex align-items-center justify-content-lg-end gap-3">

                        <a
                            href="{{ route('checkout') }}"
                            class="text-dark text-decoration-none"
                            aria-label="Checkout"
                            title="Checkout"
                        >
                            <i class="fa-solid fa-credit-card fs-5"></i>
                            <span class="d-lg-none ms-2">Checkout</span>
                        </a>

                        <a
                            href="{{ route('cart') }}"
                            class="text-dark text-decoration-none"
                            aria-label="Shopping Cart"
                            title="Shopping Cart"
                        >
                            <i class="fa-solid fa-cart-shopping fs-5"></i>
                            <span class="d-lg-none ms-2">Cart</span>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </nav>

</header>



    <!-- ==========================================
         MAIN CONTENT
    =========================================== -->

    <main class="container-fluid px-0">
        @yield('content')
    </main>


    <!-- ==========================================
         RESPONSIVE FOOTER
    =========================================== -->

    <footer class="footer mt-5">

        <div class="container py-4">

            <div class="row g-4">

                <!-- About -->
                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="footer__about">

                        <div class="footer__logo mb-3">
                            <a href="{{ route('home') }}">
                                <img
                                    src="{{ asset('assets/img/logo.png') }}"
                                    alt="BeautyDesk Logo"
                                    class="img-fluid"
                                    style="max-height: 55px; width: auto;"
                                >
                            </a>
                        </div>

                        <p>
                            Discover your beauty essentials at BeautyDesk.
                            Explore skincare, cosmetics and personal care products.
                        </p>

                        <div class="footer__payment d-flex flex-wrap gap-2">

                            <a href="#" aria-label="Payment method">
                                <img src="{{ asset('assets/img/payment/payment-1.png') }}" alt="Payment" class="img-fluid">
                            </a>

                            <a href="#" aria-label="Payment method">
                                <img src="{{ asset('assets/img/payment/payment-2.png') }}" alt="Payment" class="img-fluid">
                            </a>

                            <a href="#" aria-label="Payment method">
                                <img src="{{ asset('assets/img/payment/payment-3.png') }}" alt="Payment" class="img-fluid">
                            </a>

                            <a href="#" aria-label="Payment method">
                                <img src="{{ asset('assets/img/payment/payment-4.png') }}" alt="Payment" class="img-fluid">
                            </a>

                            <a href="#" aria-label="Payment method">
                                <img src="{{ asset('assets/img/payment/payment-5.png') }}" alt="Payment" class="img-fluid">
                            </a>

                        </div>

                    </div>

                </div>


                <!-- Quick Links -->
                <div class="col-6 col-sm-6 col-lg-2">

                    <div class="footer__widget">

                        <h6>Quick Links</h6>

                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('home') }}">Home</a>
                            </li>

                            <li class="mb-2">
                                <a href="#">About</a>
                            </li>

                            <li class="mb-2">
                                <a href="#">Contact</a>
                            </li>

                            <li class="mb-2">
                                <a href="#">FAQ</a>
                            </li>
                        </ul>

                    </div>

                </div>


                <!-- Account -->
                <div class="col-6 col-sm-6 col-lg-2">

                    <div class="footer__widget">

                        <h6>My Account</h6>

                        <ul class="list-unstyled">

                            @auth('customer')

                                <li class="mb-2">
                                    <a href="{{ route('customer.profile.show') }}">
                                        My Profile
                                    </a>
                                </li>

                                <li class="mb-2">
                                    <a href="{{ route('wishlist.index') }}">
                                        Wishlist
                                    </a>
                                </li>

                                <li class="mb-2">
                                    <a href="{{ route('customer.ratings.index') }}">
                                        My Ratings
                                    </a>
                                </li>

                                <li class="mb-2">
                                    <a href="{{ route('customer.reviews.index') }}">
                                        My Reviews
                                    </a>
                                </li>

                            @else

                                <li class="mb-2">
                                    <a href="{{ route('customer.login') }}">Login</a>
                                </li>

                                <li class="mb-2">
                                    <a href="{{ route('customer.register') }}">Register</a>
                                </li>

                            @endauth

                            <li class="mb-2">
                                <a href="{{ route('cart') }}">Cart</a>
                            </li>

                            <li class="mb-2">
                                <a href="{{ route('checkout') }}">Checkout</a>
                            </li>

                        </ul>

                    </div>

                </div>


                <!-- Newsletter / Social -->
                <div class="col-12 col-lg-4">

                    <div class="footer__newslatter">

                        <h6>Newsletter</h6>

                        <form action="#" method="GET" class="d-flex flex-column flex-sm-row gap-2">

                            <input
                                type="email"
                                class="form-control"
                                placeholder="Your email address"
                                aria-label="Your email address"
                            >

                            <button type="submit" class="site-btn">
                                Subscribe
                            </button>

                        </form>

                        <div class="footer__social mt-3 d-flex flex-wrap gap-3">

                            <a href="#" aria-label="Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>

                            <a href="#" aria-label="Twitter">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>

                            <a href="#" aria-label="YouTube">
                                <i class="fa-brands fa-youtube"></i>
                            </a>

                            <a href="#" aria-label="Instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>

                            <a href="#" aria-label="Pinterest">
                                <i class="fa-brands fa-pinterest"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Copyright -->
            <div class="row mt-4">

                <div class="col-12">

                    <div class="footer__copyright__text text-center">

                        <p class="mb-0">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            BeautyDesk. All rights reserved.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </footer>


    <!-- ==========================================
         JAVASCRIPT
    =========================================== -->

    <!-- Bootstrap Bundle: required for mobile navbar and dropdown -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Existing Ashion scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    

    @stack('scripts')

</body>
</html>
