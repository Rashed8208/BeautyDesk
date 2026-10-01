<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">

    @stack('styles')
</head>

<body>

    <!-- Header Section Begin -->
        <header class="header fixed-top bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-6 col-lg-2 col-xl-3">
                    <div class="header__logo">
                        <a href="">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Women’s</a></li>
                            <li><a href="#">Men’s</a></li>
                            <li><a href="./shop.html">Shop</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="#">Login</a>
                            <a href="#">Register</a>
                        </div>

                        <ul class="header__right__widget">
                            <li>
                                <a href="{{ route('checkout') }}" title="Checkout"><span class="fa-solid fa-credit-card"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('cart') }}" title="Cart"><span class="fa-solid fa-cart-shopping"></span> </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

<main class="pt-5 mt-4">
    @yield('content')
</main>

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            </a>
                        </div>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt cilisis.
                        </p>

                        <div class="footer__payment">
                            <a href="#"><img src="{{ asset('assets/img/payment/payment-1.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/img/payment/payment-2.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/img/payment/payment-3.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/img/payment/payment-4.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/img/payment/payment-5.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>Quick links</h6>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Orders Tracking</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>NEWSLETTER</h6>

                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>

                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright__text">
                        <p>
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script>
                            All rights reserved |
                            This template is made with
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            by
                            <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @stack('scripts')
    </footer>
    <!-- Footer Section End -->

</body>
</html>