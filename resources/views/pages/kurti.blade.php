
@extends('layouts.master')

@section('content')

<div class="container-fluid px-0">

    <!-- Announcement Bar -->
    <div class="bg-dark text-white text-center py-2 small">
        BEAUTYDESK - DISCOVER YOUR STYLE
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3">
        <div class="container">

            <a href="{{ url('/') }}" class="navbar-brand fw-bold fs-3">
                Beauty<span class="text-danger">Desk</span>
            </a>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ url('/') }}" class="text-decoration-none text-dark">Home</a>
                <a href="{{ url('/saree') }}" class="text-decoration-none text-dark">Saree</a>
                <a href="{{ url('/kurti') }}" class="text-decoration-none text-danger fw-bold">Kurti</a>
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
                    src="https://yanchi.in/cdn/shop/files/pure-fine-cotton-print-kurti-622441.jpg?v=1750161548"
                    class="w-100 h-100 object-fit-cover"
                    alt="Women's floral cotton kurti"
                    onerror="this.onerror=null;this.src='https://www.blocksofindia.com/cdn/shop/files/3_7e50fe14-cb4b-444f-afb5-6ad9fb4a8a5a_1200x1200.jpg?v=1683107842';"
                >
            </div>

            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center bg-dark bg-opacity-50">

                <div class="text-white p-3 p-md-5">

                    <span class="text-uppercase small fw-semibold">
                        Women's Fashion Collection
                    </span>

                    <h1 class="display-5 fw-bold my-3">
                        Beautiful Kurti Collection
                    </h1>

                    <p class="d-none d-md-block fs-6">
                        Discover elegant cotton, printed and embroidered kurtis
                        for everyday wear and special occasions.
                    </p>

                    <a href="#products" class="btn btn-danger px-4 py-2">
                        Shop Collection
                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- Section Heading -->
    <div class="container mt-5">

        <div class="text-center mb-4">

            <p class="text-danger text-uppercase small fw-bold mb-2">
                Explore Our Collection
            </p>

            <h2 class="fw-bold">
                Women's Kurti Collection
            </h2>

            <p class="text-secondary">
                Find your favourite designs and styles.
            </p>

        </div>

        <!-- Search and Filter -->
        <div class="row g-3 align-items-center mb-4">

            <div class="col-12 col-md-5">

                <input
                    type="search"
                    id="productSearch"
                    class="form-control"
                    placeholder="Search your favourite kurti..."
                >

            </div>

            <div class="col-12 col-md-7">

                <div class="d-flex flex-wrap justify-content-md-end gap-2">

                    <button class="btn btn-danger filter-btn active"
                        data-filter="all" type="button">
                        All
                    </button>

                    <button class="btn btn-outline-danger filter-btn"
                        data-filter="cotton" type="button">
                        Cotton
                    </button>

                    <button class="btn btn-outline-danger filter-btn"
                        data-filter="printed" type="button">
                        Printed
                    </button>

                    <button class="btn btn-outline-danger filter-btn"
                        data-filter="embroidered" type="button">
                        Embroidered
                    </button>

                </div>

            </div>

        </div>

        <!-- Product Collection -->
        <div class="row g-3 g-md-4" id="products">

            <!-- Product 1 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton printed">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="ratio ratio-1x1 overflow-hidden">

                        <img
                            src="https://yanchi.in/cdn/shop/files/pure-fine-cotton-print-kurti-622441.jpg?v=1750161548"
                            class="card-img-top w-100 h-100 object-fit-cover"
                            alt="Mint Green Floral Cotton Kurti"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://www.blocksofindia.com/cdn/shop/files/3_7e50fe14-cb4b-444f-afb5-6ad9fb4a8a5a_1200x1200.jpg?v=1683107842';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-success mb-2">Featured</span>

                        <p class="small text-secondary mb-1">Cotton Printed</p>

                        <h6 class="fw-bold">Mint Green Floral Kurti</h6>

                        <h6 class="text-danger fw-bold">৳ 850</h6>

                        <a href="#contact" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 2 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton printed">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="ratio ratio-1x1 overflow-hidden">

                        <img
                            src="https://www.blocksofindia.com/cdn/shop/files/3_7e50fe14-cb4b-444f-afb5-6ad9fb4a8a5a_1200x1200.jpg?v=1683107842"
                            class="card-img-top w-100 h-100 object-fit-cover"
                            alt="Blue Floral Cotton Kurti"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://yanchi.in/cdn/shop/files/pure-fine-cotton-print-kurti-622441.jpg?v=1750161548';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-primary mb-2">Popular</span>

                        <p class="small text-secondary mb-1">Cotton Collection</p>

                        <h6 class="fw-bold">Blue Floral Cotton Kurti</h6>

                        <h6 class="text-danger fw-bold">৳ 950</h6>

                        <a href="#contact" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 3 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton printed">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="ratio ratio-1x1 overflow-hidden">

                        <img
                            src="https://raassio.com/cdn/shop/files/BLUE_COTTON_PRINTED_KURTI_WITH_LACE_AND_BUTTONS_6.jpg?v=1770718052"
                            class="card-img-top w-100 h-100 object-fit-cover"
                            alt="Blue Kalamkari Printed Kurti"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://www.weavesoftradition.com/cdn/shop/products/Kurta_1.4_1400x.jpg?v=1746800953';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-info mb-2">New Style</span>

                        <p class="small text-secondary mb-1">Printed Cotton</p>

                        <h6 class="fw-bold">Blue Kalamkari Kurti</h6>

                        <h6 class="text-danger fw-bold">৳ 1,050</h6>

                        <a href="#contact" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 4 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton printed">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="ratio ratio-1x1 overflow-hidden">

                        <img
                            src="https://gulabchand.com/cdn/shop/files/GCO-509-WHITE-BLUE-A.jpg?v=1716742455"
                            class="card-img-top w-100 h-100 object-fit-cover"
                            alt="White Blue Block Printed Kurti"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://jaipurvastrakala.com/cdn/shop/files/ck112.1_28132608-5cd3-42a5-8cf1-84fe9348dbaa.jpg?v=1754425006';"
                        >

                    </div>

                    <div class="card-body">

                        <p class="small text-secondary mb-1">Block Print</p>

                        <h6 class="fw-bold">White Blue Printed Kurti</h6>

                        <h6 class="text-danger fw-bold">৳ 1,150</h6>

                        <a href="#contact" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 5 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton printed">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="ratio ratio-1x1 overflow-hidden">

                        <img
                            src="https://jaipurvastrakala.com/cdn/shop/files/ck112.1_28132608-5cd3-42a5-8cf1-84fe9348dbaa.jpg?v=1754425006"
                            class="card-img-top w-100 h-100 object-fit-cover"
                            alt="Indigo Blue Printed Cotton Kurti"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://www.blocksofindia.com/cdn/shop/files/3_7e50fe14-cb4b-444f-afb5-6ad9fb4a8a5a_1200x1200.jpg?v=1683107842';"
                        >

                    </div>

                    <div class="card-body">

                        <p class="small text-secondary mb-1">Cotton Collection</p>

                        <h6 class="fw-bold">Indigo Blue Cotton Kurti</h6>

                        <h6 class="text-danger fw-bold">৳ 1,200</h6>

                        <a href="#contact" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 6 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton printed">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="ratio ratio-1x1 overflow-hidden">

                        <img
                            src="https://gulabchand.com/cdn/shop/files/GCO-509-PINK-A.jpg?v=1716742249"
                            class="card-img-top w-100 h-100 object-fit-cover"
                            alt="Pink Block Printed Kurti"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://yanchi.in/cdn/shop/files/pure-fine-cotton-print-kurti-622441.jpg?v=1750161548';"
                        >

                    </div>

                    <div class="card-body">

                        <span class="badge bg-danger mb-2">Trending</span>

                        <p class="small text-secondary mb-1">Printed Cotton</p>

                        <h6 class="fw-bold">Pink Floral Printed Kurti</h6>

                        <h6 class="text-danger fw-bold">৳ 990</h6>

                        <a href="#contact" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 7 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton printed">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="ratio ratio-1x1 overflow-hidden">

                        <img
                            src="https://www.weavesoftradition.com/cdn/shop/products/Kurta_1.4_1400x.jpg?v=1746800953"
                            class="card-img-top w-100 h-100 object-fit-cover"
                            alt="Red Hand Block Printed Kurti"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://gulabchand.com/cdn/shop/files/GCO-509-PINK-A.jpg?v=1716742249';"
                        >

                    </div>

                    <div class="card-body">

                        <p class="small text-secondary mb-1">Block Printed</p>

                        <h6 class="fw-bold">Red Hand Printed Kurti</h6>

                        <h6 class="text-danger fw-bold">৳ 1,350</h6>

                        <a href="#contact" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- Product 8 -->
            <div class="col-6 col-md-4 col-lg-3 product-item"
                data-category="cotton printed">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="ratio ratio-1x1 overflow-hidden">

                        <img
                            src="https://www.blocksofindia.com/cdn/shop/files/3_8d7faa4f-d36d-433c-bbc4-89ea64d46544_1200x1200.jpg?v=1683108332"
                            class="card-img-top w-100 h-100 object-fit-cover"
                            alt="Green Floral Cotton Kurti"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://yanchi.in/cdn/shop/files/pure-fine-cotton-print-kurti-622441.jpg?v=1750161548';"
                        >

                    </div>

                    <div class="card-body">

                        <p class="small text-secondary mb-1">Floral Collection</p>

                        <h6 class="fw-bold">Green Floral Cotton Kurti</h6>

                        <h6 class="text-danger fw-bold">৳ 1,100</h6>

                        <a href="#contact" class="btn btn-outline-danger btn-sm w-100">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            <!-- No Result -->
            <div class="col-12 text-center py-5 d-none" id="noProducts">

                <h5 class="text-secondary">
                    No Kurti Found!
                </h5>

                <p class="text-muted">
                    Try another product name or category.
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

        const searchValue = searchInput.value.toLowerCase().trim();

        let visibleCount = 0;

        productCards.forEach(function (card) {

            const categories = card.dataset.category.split(' ');

            const productText = card.textContent.toLowerCase();

            const matchesCategory =
                activeFilter === 'all' ||
                categories.includes(activeFilter);

            const matchesSearch =
                productText.includes(searchValue);

            const showProduct = matchesCategory && matchesSearch;

            card.classList.toggle('d-none', !showProduct);

            if (showProduct) {
                visibleCount++;
            }

        });

        noProducts.classList.toggle('d-none', visibleCount !== 0);

    }

    searchInput.addEventListener('input', filterProducts);

    filterButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            activeFilter = button.dataset.filter;

            filterButtons.forEach(function (btn) {

                btn.classList.remove('btn-danger', 'active');

                btn.classList.add('btn-outline-danger');

            });

            button.classList.remove('btn-outline-danger');

            button.classList.add('btn-danger', 'active');

            filterProducts();

        });

    });

});

</script>

@endsection
