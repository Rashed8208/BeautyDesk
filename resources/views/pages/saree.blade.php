
@extends('layouts.master')

@section('content')

<div class="container-fluid px-0">

    <!-- Announcement -->
    <div class="bg-dark text-white text-center py-2 small">
        BEAUTYDESK — EXPLORE OUR SAREE COLLECTION
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-3">
        <div class="container">

            <a href="{{ url('/') }}" class="navbar-brand fw-bold fs-3">
                Beauty<span class="text-danger">Desk</span>
            </a>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ url('/') }}" class="text-decoration-none text-dark">Home</a>
                <a href="{{ url('/saree') }}" class="text-decoration-none text-danger fw-bold">Saree</a>
                <a href="{{ url('/kurti') }}" class="text-decoration-none text-dark">Kurti</a>
                <a href="{{ url('/borka') }}" class="text-decoration-none text-dark">Borka</a>
                <a href="{{ url('/three-piece') }}" class="text-decoration-none text-dark">Three Piece</a>
            </div>

        </div>
    </nav>

    <!-- Hero Banner -->
    <div class="container mt-4">

        <div class="position-relative overflow-hidden rounded-3">

            <div class="ratio ratio-21x9">

                <img
                    src="https://goswadeshi.in/cdn/shop/files/gctsgcosaa0298__3_1800x1800.jpg?v=1736936414"
                    class="w-100 h-100 object-fit-cover"
                    alt="Beautiful Bengal Cotton Saree"
                    onerror="this.onerror=null;this.src='https://apisap.fabindia.com/medias/20274135-01.jpg?context=bWFzdGVyfGltYWdlc3wyMjE3OTN8aW1hZ2UvanBlZ3xhRFkxTDJneU1DOHhNemN5Tnprek5qQTJPVFl6TlRBdk1qQXlOelF4TXpWZk1ERXVhbkJufDc2NjEwNWNhN2U2MmU4MTNkNWQ2ODE0MzY4MDcyYTcxNDc2MmUxNzI4OGM2ZGVlNjA4NTc4YzYxNThjZWVkZWM';"
                >

            </div>

            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center">

                <div class="text-white p-3 p-md-5">

                    <span class="small text-uppercase fw-bold">
                        Elegance in Every Thread
                    </span>

                    <h1 class="display-5 fw-bold my-3">
                        Discover Your Perfect Saree
                    </h1>

                    <p class="d-none d-md-block">
                        Explore beautiful silk, cotton, handloom and
                        party wear sarees for every occasion.
                    </p>

                    <a href="#products" class="btn btn-danger px-4 py-2">
                        Explore Collection
                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- Collection Heading -->
    <div class="container mt-5">

        <div class="text-center mb-4">

            <p class="text-danger text-uppercase small fw-bold">
                Our Collection
            </p>

            <h2 class="fw-bold">
                Beautiful Sarees
            </h2>

            <p class="text-secondary">
                Find your favourite saree for every special moment.
            </p>

        </div>

        <!-- Search and Filter -->
        <div class="row g-3 align-items-center mb-4">

            <div class="col-12 col-md-5">

                <input
                    type="search"
                    id="productSearch"
                    class="form-control"
                    placeholder="Search your favourite saree..."
                    aria-label="Search sarees"
                >

            </div>

            <div class="col-12 col-md-7">

                <div class="d-flex flex-wrap justify-content-md-end gap-2">

                    <button type="button"
                        class="btn btn-danger filter-btn active"
                        data-filter="all">
                        All Sarees
                    </button>

                    <button type="button"
                        class="btn btn-outline-danger filter-btn"
                        data-filter="silk">
                        Silk
                    </button>

                    <button type="button"
                        class="btn btn-outline-danger filter-btn"
                        data-filter="cotton">
                        Cotton
                    </button>

                    <button type="button"
                        class="btn btn-outline-danger filter-btn"
                        data-filter="party">
                        Party Wear
                    </button>

                </div>

            </div>

        </div>

        <!-- Products -->
        <div class="row g-3 g-md-4" id="products">

            <!-- Product 1 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton">

                <div class="card h-100 shadow-sm border-0">

                    <div class="ratio ratio-3x4 overflow-hidden">

                        <img
                            src="https://goswadeshi.in/cdn/shop/files/gctsgcosaa0298__3_1800x1800.jpg?v=1736936414"
                            class="w-100 h-100 object-fit-cover"
                            alt="Magenta Orange Bengal Cotton Handloom Saree"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://apisap.fabindia.com/medias/20274135-01.jpg?context=bWFzdGVyfGltYWdlc3wyMjE3OTN8aW1hZ2UvanBlZ3xhRFkxTDJneU1DOHhNemN5Tnprek5qQTJPVFl6TlRBdk1qQXlOelF4TXpWZk1ERXVhbkJufDc2NjEwNWNhN2U2MmU4MTNkNWQ2ODE0MzY4MDcyYTcxNDc2MmUxNzI4OGM2ZGVlNjA4NTc4YzYxNThjZWVkZWM';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-success mb-2">Featured</span>

                        <p class="small text-secondary mb-1">Cotton Saree</p>

                        <h6 class="fw-bold">Magenta Bengal Cotton Saree</h6>

                        <h6 class="text-danger fw-bold">৳ 2,500</h6>

                        <a href="#products" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 2 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="silk">

                <div class="card h-100 shadow-sm border-0">

                    <div class="ratio ratio-3x4 overflow-hidden">

                        <img
                            src="https://medias.utsavfashion.com/media/catalog/product/cache/1/image/500x/040ec09b1e35df139433887a97daa66f/h/a/handloom-cotton-silk-saree-in-dark-grey-v1-sbea1101.jpg"
                            class="w-100 h-100 object-fit-cover"
                            alt="Dark Grey Cotton Silk Saree"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://global.indiehaat.com/cdn/shop/products/LokKdgZ.jpg?v=1747630506';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-primary mb-2">Popular</span>

                        <p class="small text-secondary mb-1">Silk Collection</p>

                        <h6 class="fw-bold">Dark Grey Cotton Silk Saree</h6>

                        <h6 class="text-danger fw-bold">৳ 2,850</h6>

                        <a href="#products" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 3 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="silk">

                <div class="card h-100 shadow-sm border-0">

                    <div class="ratio ratio-3x4 overflow-hidden">

                        <img
                            src="https://global.indiehaat.com/cdn/shop/products/LokKdgZ.jpg?v=1747630506"
                            class="w-100 h-100 object-fit-cover"
                            alt="Grey Red Ilkal Handloom Saree"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://medias.utsavfashion.com/media/catalog/product/cache/1/image/500x/040ec09b1e35df139433887a97daa66f/h/a/handloom-cotton-silk-saree-in-dark-grey-v1-sbea1101.jpg';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-info mb-2">New</span>

                        <p class="small text-secondary mb-1">Handloom Silk</p>

                        <h6 class="fw-bold">Grey Red Border Silk Saree</h6>

                        <h6 class="text-danger fw-bold">৳ 3,200</h6>

                        <a href="#products" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 4 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton">

                <div class="card h-100 shadow-sm border-0">

                    <div class="ratio ratio-3x4 overflow-hidden">

                        <img
                            src="https://apisap.fabindia.com/medias/20274135-01.jpg?context=bWFzdGVyfGltYWdlc3wyMjE3OTN8aW1hZ2UvanBlZ3xhRFkxTDJneU1DOHhNemN5Tnprek5qQTJPVFl6TlRBdk1qQXlOelF4TXpWZk1ERXVhbkJufDc2NjEwNWNhN2U2MmU4MTNkNWQ2ODE0MzY4MDcyYTcxNDc2MmUxNzI4OGM2ZGVlNjA4NTc4YzYxNThjZWVkZWM"
                            class="w-100 h-100 object-fit-cover"
                            alt="Yellow Pink Handwoven Cotton Saree"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://img.esaras.in/catalog/product/cache/ad98b6f2671193d583ca1e385c36654e/5/2/526_2319.jpg';"
                        >

                    </div>

                    <div class="card-body">

                        <p class="small text-secondary mb-1">Cotton Collection</p>

                        <h6 class="fw-bold">Yellow Pink Handwoven Saree</h6>

                        <h6 class="text-danger fw-bold">৳ 1,450</h6>

                        <a href="#products" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 5 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton">

                <div class="card h-100 shadow-sm border-0">

                    <div class="ratio ratio-3x4 overflow-hidden">

                        <img
                            src="https://img.esaras.in/catalog/product/cache/ad98b6f2671193d583ca1e385c36654e/5/2/526_2319.jpg"
                            class="w-100 h-100 object-fit-cover"
                            alt="Blue Handloom Pure Cotton Saree"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://goswadeshi.in/cdn/shop/files/gctsgcosaa0298__3_1800x1800.jpg?v=1736936414';"
                        >

                    </div>

                    <div class="card-body">

                        <p class="small text-secondary mb-1">Pure Cotton</p>

                        <h6 class="fw-bold">Blue Handloom Cotton Saree</h6>

                        <h6 class="text-danger fw-bold">৳ 1,650</h6>

                        <a href="#products" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 6 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="party">

                <div class="card h-100 shadow-sm border-0">

                    <div class="ratio ratio-3x4 overflow-hidden">

                        <img
                            src="https://myblacktree.com/cdn/shop/files/0Q8A1553_98f17027-8a1e-4b52-8575-69a33137d86d.jpg?v=1730122674&width=1946"
                            class="w-100 h-100 object-fit-cover"
                            alt="Pink Teal Border Occasion Saree"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://sarvati.com/cdn/shop/files/SRT-VN-MUL_COTTON_101_PISTA_1.jpg?v=1736847949&width=1080';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-danger mb-2">Exclusive</span>

                        <p class="small text-secondary mb-1">Party Collection</p>

                        <h6 class="fw-bold">Pink Teal Border Saree</h6>

                        <h6 class="text-danger fw-bold">৳ 3,500</h6>

                        <a href="#products" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 7 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton">

                <div class="card h-100 shadow-sm border-0">

                    <div class="ratio ratio-3x4 overflow-hidden">

                        <img
                            src="https://sarvati.com/cdn/shop/files/SRT-VN-MUL_COTTON_101_PISTA_1.jpg?v=1736847949&width=1080"
                            class="w-100 h-100 object-fit-cover"
                            alt="Olive Green Mulmul Cotton Saree"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://img.esaras.in/catalog/product/cache/ad98b6f2671193d583ca1e385c36654e/5/2/526_2319.jpg';"
                        >

                    </div>

                    <div class="card-body">

                        <p class="small text-secondary mb-1">Mulmul Cotton</p>

                        <h6 class="fw-bold">Olive Green Cotton Saree</h6>

                        <h6 class="text-danger fw-bold">৳ 1,850</h6>

                        <a href="#products" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 8 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="party silk">

                <div class="card h-100 shadow-sm border-0">

                    <div class="ratio ratio-3x4 overflow-hidden">

                        <img
                            src="https://medias.utsavfashion.com/media/catalog/product/cache/1/image/500x/040ec09b1e35df139433887a97daa66f/h/a/handloom-cotton-silk-saree-in-dark-grey-v1-sbea1101.jpg"
                            class="w-100 h-100 object-fit-cover"
                            alt="Designer Grey Silk Saree"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://myblacktree.com/cdn/shop/files/0Q8A1553_98f17027-8a1e-4b52-8575-69a33137d86d.jpg?v=1730122674&width=1946';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-warning text-dark mb-2">Special</span>

                        <p class="small text-secondary mb-1">Designer Collection</p>

                        <h6 class="fw-bold">Designer Silk Occasion Saree</h6>

                        <h6 class="text-danger fw-bold">৳ 3,800</h6>

                        <a href="#products" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- No Products -->
            <div class="col-12 text-center py-5 d-none" id="noProducts">

                <h5 class="text-secondary">
                    No Sarees Found!
                </h5>

                <p class="text-muted">
                    Please try another product name or category.
                </p>

            </div>

        </div>

    </div>

    <!-- Benefits -->
    <div class="container my-5">

        <div class="row g-3 text-center bg-light rounded-3 py-4">

            <div class="col-12 col-md-4">
                <h6 class="fw-bold">Beautiful Collections</h6>
                <p class="text-secondary small mb-0">
                    Explore traditional and modern sarees.
                </p>
            </div>

            <div class="col-12 col-md-4">
                <h6 class="fw-bold">Easy Shopping</h6>
                <p class="text-secondary small mb-0">
                    Browse your favourite designs.
                </p>
            </div>

            <div class="col-12 col-md-4">
                <h6 class="fw-bold">Customer Support</h6>
                <p class="text-secondary small mb-0">
                    Get help with your product enquiries.
                </p>
            </div>

        </div>

    </div>

</div>

<!-- Search and Filter -->
<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('productSearch');

    const filterButtons = document.querySelectorAll('.filter-btn');

    const productCards = document.querySelectorAll('.product-item');

    const noProducts = document.getElementById('noProducts');

    let activeFilter = 'all';

    function filterProducts() {

        const searchTerm = searchInput.value.toLowerCase().trim();

        let visibleCount = 0;

        productCards.forEach(function (card) {

            const categories = card.dataset.category.split(' ');

            const text = card.textContent.toLowerCase();

            const matchesCategory =
                activeFilter === 'all' ||
                categories.includes(activeFilter);

            const matchesSearch = text.includes(searchTerm);

            const show = matchesCategory && matchesSearch;

            card.classList.toggle('d-none', !show);

            if (show) {
                visibleCount++;
            }

        });

        noProducts.classList.toggle('d-none', visibleCount !== 0);

    }

    searchInput.addEventListener('input', filterProducts);

    filterButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            activeFilter = button.dataset.filter;

            filterButtons.forEach(function (item) {

                item.classList.remove('btn-danger', 'active');

                item.classList.add('btn-outline-danger');

            });

            button.classList.remove('btn-outline-danger');

            button.classList.add('btn-danger', 'active');

            filterProducts();

        });

    });

});

</script>

@endsection
