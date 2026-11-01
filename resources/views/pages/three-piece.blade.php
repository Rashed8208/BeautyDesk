
@extends('layouts.master')

@section('title', 'Three Piece Collection | BeautyDesk')

@section('content')

<!-- ============================
     PAGE BANNER
============================= -->




<!-- ============================
     BREADCRUMB
============================= -->

<div class="container mt-4">

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ url('/') }}" class="text-decoration-none text-dark">
                    Home
                </a>
            </li>

            <li class="breadcrumb-item active">
                Three Piece
            </li>

        </ol>

    </nav>

</div>


<!-- ============================
     COLLECTION HEADER
============================= -->

<section class="container py-4">

    <div class="row align-items-center g-3">

        <div class="col-md-7">

            <h2 class="fw-bold mb-2">
                Our Three Piece Collection
            </h2>

            <p class="text-muted mb-0">
                Discover beautiful three piece salwar kameez collections.
            </p>

        </div>

        <div class="col-md-5 text-md-end">

            <a href="#products" class="btn btn-dark btn-sm px-3">
                All Products
            </a>

            <a href="#products" class="btn btn-outline-dark btn-sm px-3">
                Cotton
            </a>

            <a href="#products" class="btn btn-outline-dark btn-sm px-3">
                Embroidered
            </a>

        </div>

    </div>

</section>


<!-- ============================
     THREE PIECE PRODUCTS
============================= -->

<section class="container pb-5" id="products">

    <div class="row g-4">


        <!-- PRODUCT 1 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://www.yellowclothing.net/cdn/shop/files/031626_Yellow_0577.jpg?v=1774351526"
                    class="card-img-top img-fluid"
                    alt="Teal Embroidered Three Piece"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Three+Piece';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Embroidered
                    </span>

                    <h6 class="fw-bold">
                        Teal Embroidered Three Piece
                    </h6>

                    <p class="text-muted small">
                        Elegant embroidered lawn three piece with dupatta.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,850
                    </h5>

                    <a href="#products" class="btn btn-dark btn-sm w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>


        <!-- PRODUCT 2 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://salitexonline.com/cdn/shop/files/Model_standing_with_202604130104_2.webp?v=1776345482"
                    class="card-img-top img-fluid"
                    alt="Black Embroidered Three Piece"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Three+Piece';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Premium
                    </span>

                    <h6 class="fw-bold">
                        Black Embroidered Three Piece
                    </h6>

                    <p class="text-muted small">
                        Premium black cambric suit with matching dupatta.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,450
                    </h5>

                    <a href="#products" class="btn btn-dark btn-sm w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>


        <!-- PRODUCT 3 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://chinyereintl.com/cdn/shop/products/IMG_3468.jpg?v=1739620095"
                    class="card-img-top img-fluid"
                    alt="Mustard Yellow Three Piece"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Three+Piece';"
                >

                <div class="card-body">

                    <span class="badge bg-secondary mb-2">
                        Party Wear
                    </span>

                    <h6 class="fw-bold">
                        Mustard Yellow Three Piece
                    </h6>

                    <p class="text-muted small">
                        Beautiful embroidered traditional three piece.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,650
                    </h5>

                    <a href="#products" class="btn btn-dark btn-sm w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>


        <!-- PRODUCT 4 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://www.simaals.com/cdn/shop/files/369_cc3856b8-ea47-4226-aaf9-25d924733920.webp?v=1781875848&width=1080"
                    class="card-img-top img-fluid"
                    alt="Turquoise Floral Three Piece"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Three+Piece';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Printed
                    </span>

                    <h6 class="fw-bold">
                        Turquoise Floral Three Piece
                    </h6>

                    <p class="text-muted small">
                        Floral printed shirt, trouser and dupatta.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 1,850
                    </h5>

                    <a href="#products" class="btn btn-dark btn-sm w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>


        <!-- PRODUCT 5 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://www.yellowclothing.net/cdn/shop/files/DSC8645_5e3442b3-ae08-4c9b-87dd-60b58e40caeb_1200x.jpg?v=1746951576"
                    class="card-img-top img-fluid"
                    alt="Black Floral Lawn Three Piece"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Three+Piece';"
                >

                <div class="card-body">

                    <span class="badge bg-secondary mb-2">
                        Lawn
                    </span>

                    <h6 class="fw-bold">
                        Black Floral Lawn Three Piece
                    </h6>

                    <p class="text-muted small">
                        Stylish floral lawn suit with matching dupatta.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,100
                    </h5>

                    <a href="#products" class="btn btn-dark btn-sm w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>


        <!-- PRODUCT 6 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://www.yourlibaas.com/cdn/shop/products/Khaadi-Embroidered-3-Piece-Full-Suit-B2103025-Green.jpg?v=1633600441"
                    class="card-img-top img-fluid"
                    alt="Green Khaadi Three Piece"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Three+Piece';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Embroidered
                    </span>

                    <h6 class="fw-bold">
                        Green Khaadi Three Piece
                    </h6>

                    <p class="text-muted small">
                        Elegant green embroidered lawn collection.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,750
                    </h5>

                    <a href="#products" class="btn btn-dark btn-sm w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>


        <!-- PRODUCT 7 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://www.yellowclothing.net/cdn/shop/files/DSC00209_26b65597-c1c6-4fac-951c-35ae134c846d_533x.jpg?v=1773383719"
                    class="card-img-top img-fluid"
                    alt="Pink Printed Three Piece"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Three+Piece';"
                >

                <div class="card-body">

                    <span class="badge bg-secondary mb-2">
                        Printed
                    </span>

                    <h6 class="fw-bold">
                        Pink Printed Three Piece
                    </h6>

                    <p class="text-muted small">
                        Beautiful pink lawn suit with printed dupatta.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 1,950
                    </h5>

                    <a href="#products" class="btn btn-dark btn-sm w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>


        <!-- PRODUCT 8 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://zeenwoman.com/cdn/shop/products/WFM33247_1024x.jpg?v=1673941838"
                    class="card-img-top img-fluid"
                    alt="Sky Blue Floral Three Piece"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Three+Piece';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Cotton
                    </span>

                    <h6 class="fw-bold">
                        Sky Blue Floral Three Piece
                    </h6>

                    <p class="text-muted small">
                        Beautiful sky blue printed lawn three piece.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,250
                    </h5>

                    <a href="#products" class="btn btn-dark btn-sm w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>


    </div>

</section>


<!-- ============================
     BOTTOM BANNER
============================= -->



@endsection
