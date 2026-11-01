
@extends('layouts.master')

@section('title', 'Burqa Collection | BeautyDesk')

@section('content')

<!-- ============================
     BURQA PAGE BANNER
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
                Burqa Collection
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
                Our Burqa Collection
            </h2>

            <p class="text-muted mb-0">
                Find your perfect style from our exclusive burqa collection.
            </p>

        </div>

        <div class="col-md-5 text-md-end">

            <a href="#products" class="btn btn-dark btn-sm px-3">
                All Burqas
            </a>

            <a href="#products" class="btn btn-outline-dark btn-sm px-3">
                Premium Burqas
            </a>

        </div>

    </div>

</section>


<!-- ============================
     BURQA PRODUCTS
============================= -->

<section class="container pb-5" id="products">

    <div class="row g-4">


        <!-- PRODUCT 1 -->

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card border-0 shadow-sm h-100">

                <img
                    src="https://salehabagas.com/cdn/shop/files/may-2024-258_74d200de-a26f-4609-842b-2bf72a5a071f.jpg?v=1716321197&width=1445"
                    class="card-img-top img-fluid"
                    alt="Classic Black Burqa"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Black+Burqa';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Burqa
                    </span>

                    <h6 class="fw-bold">
                        Classic Black Burqa
                    </h6>

                    <p class="text-muted small">
                        Elegant full-length black burqa.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,500
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
                    src="https://cdn.salla.sa/Zddep/9M9nxeDYrsnswqzqJ4TnFjBDADSQXliDTZq5XZQR.jpg"
                    class="card-img-top img-fluid"
                    alt="Black Niqab Burqa"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Black+Niqab+Burqa';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Burqa
                    </span>

                    <h6 class="fw-bold">
                        Black Niqab Burqa
                    </h6>

                    <p class="text-muted small">
                        Beautiful burqa with matching niqab.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,800
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
                    src="https://baitulburqa.shop/cdn/shop/files/Burqa567255226.jpg?v=1766063652&width=533"
                    class="card-img-top img-fluid"
                    alt="Embroidered Burqa"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Embroidered+Burqa';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Burqa
                    </span>

                    <h6 class="fw-bold">
                        Embroidered Burqa
                    </h6>

                    <p class="text-muted small">
                        Premium burqa with embroidery.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 3,200
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
                    src="https://media.6media.me/media/catalog/product/1/0/10609-8.jpg"
                    class="card-img-top img-fluid"
                    alt="Saudi Style Burqa"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Saudi+Style+Burqa';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Burqa
                    </span>

                    <h6 class="fw-bold">
                        Saudi Style Burqa
                    </h6>

                    <p class="text-muted small">
                        Graceful full coverage burqa.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,900
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
                    src="https://mala.pk/cdn/shop/files/flowlineabaya_1.webp?v=1782202715&width=3840"
                    class="card-img-top img-fluid"
                    alt="Flowing Black Burqa"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Flowing+Burqa';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Burqa
                    </span>

                    <h6 class="fw-bold">
                        Flowing Black Burqa
                    </h6>

                    <p class="text-muted small">
                        Stylish loose-fitting burqa.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 3,000
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
                    src="https://cdn.salla.sa/QpBVa/jefjk5rFtPmHxnaozxmUYCtdhtfbdZ9aNCmCWfce.jpg"
                    class="card-img-top img-fluid"
                    alt="Premium Full Length Burqa"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x800/f1f1f1/333?text=Premium+Burqa';"
                >

                <div class="card-body">

                    <span class="badge bg-dark mb-2">
                        Burqa
                    </span>

                    <h6 class="fw-bold">
                        Premium Full Length Burqa
                    </h6>

                    <p class="text-muted small">
                        Comfortable premium burqa design.
                    </p>

                    <h5 class="fw-bold">
                        ৳ 2,600
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

<!-- <section class="bg-light py-5">

    <div class="container text-center">

        <h3 class="fw-bold">
            BeautyDesk Burqa Collection
        </h3>

        <p class="text-muted mb-0">
            Elegant Style. Beautiful Collection. Premium Comfort.
        </p>

    </div>

</section> -->

@endsection
