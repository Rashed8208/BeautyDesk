<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'BeautyDesk Admin')</title>

    <link rel="stylesheet"
          href="{{ asset('adminassets/css/bootstrap.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('adminassets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <style>
        :root {
            --sidebar-width: 270px;
            --primary: #16745d;
            --primary-dark: #105744;
            --background: #f5f6f8;
            --text: #20252c;
            --muted: #818995;
            --border: #e9edf1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--background);
            color: var(--text);
            overflow-x: hidden;
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid #79bca8;
            outline-offset: 3px;
        }

        /* Sidebar */

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            height: 100dvh;
            background: #171d24;
            display: flex;
            flex-direction: column;
            z-index: 1050;
            transition: transform .25s ease;
        }

        .sidebar-header {
            padding: 30px 24px;
            border-bottom: 1px solid #28303a;
        }

        .brand-mark {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #ffffff;
        }

        .brand-mark:hover {
            color: #ffffff;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            background: #cce8dc;
            color: #174e3b;
            border-radius: 13px;
            display: grid;
            place-items: center;
            font-size: 23px;
        }

        .brand-title {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -.7px;
        }

        .brand-subtitle {
            font-size: 10px;
            color: #89939e;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 14px;
            scrollbar-width: thin;
            scrollbar-color: #39434f transparent;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: #39434f;
            border-radius: 10px;
        }

        .sidebar-heading {
            margin: 23px 14px 12px;
            font-size: 10px;
            font-weight: 600;
            color: #6e7a88;
            letter-spacing: 1.8px;
        }

        .sidebar-nav .nav-link,
        .sidebar-nav .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 45px;
            padding: 12px 14px;
            margin-bottom: 5px;
            border-radius: 10px;
            color: #a9b3c0;
            font-size: 13px;
            transition: background .18s ease, color .18s ease;
        }

        .sidebar-nav .nav-link i,
        .sidebar-nav .sidebar-link i {
            font-size: 18px;
            width: 22px;
            text-align: center;
        }

        .sidebar-nav .nav-link:hover,
        .sidebar-nav .sidebar-link:hover {
            background: #232c36;
            color: #ffffff;
        }

        .sidebar-nav .nav-link.active,
        .sidebar-nav .sidebar-link.active {
            background: #cce8dc;
            color: #174e3b;
            font-weight: 700;
        }

        .sidebar-nav .active::after {
            content: "";
            width: 6px;
            height: 6px;
            background: #22684f;
            border-radius: 50%;
            margin-left: auto;
        }

        .sidebar-footer {
            padding: 20px 24px;
            border-top: 1px solid #28303a;
            color: #96a3b0;
            font-size: 12px;
        }

        .sidebar-footer i {
            font-size: 8px;
            color: #8dcaad;
            margin-right: 8px;
        }

        /* Main */

        .admin-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            padding: 30px;
            background: var(--background);
        }

        .content-wrapper {
            width: 100%;
            max-width: 1650px;
            margin: 0 auto;
        }

        .content-wrapper h1,
        .content-wrapper h2,
        .content-wrapper h3,
        .content-wrapper h4,
        .content-wrapper h5 {
            color: var(--text);
        }

        /* Existing CRUD pages */

        .content-wrapper .card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(25, 34, 46, .025);
        }

        .content-wrapper .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border);
            padding: 20px 22px;
        }

        .content-wrapper .card-body {
            padding: 22px;
        }

        .content-wrapper .btn {
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            padding: 10px 16px;
        }

        .content-wrapper .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
        }

        .content-wrapper .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .content-wrapper .btn-outline-secondary {
            border-color: #dfe4e9;
            color: #596370;
            background: #ffffff;
        }

        .content-wrapper .btn-outline-secondary:hover {
            background: #edf5f1;
            border-color: #b8d6c9;
            color: var(--primary);
        }

        .content-wrapper .btn-light {
            background: #eef5f1;
            color: var(--primary);
            border-color: #eef5f1;
        }

        .content-wrapper .form-control,
        .content-wrapper .form-select {
            min-height: 42px;
            border-radius: 9px;
            border-color: #e0e5e9;
        }

        .content-wrapper .form-control:focus,
        .content-wrapper .form-select:focus {
            border-color: #6aa78f;
            box-shadow: 0 0 0 .2rem rgba(22, 116, 93, .1);
        }

        .content-wrapper .table {
            margin-bottom: 0;
        }

        .content-wrapper .table thead th {
            background: #f9fafb;
            color: #808995;
            font-weight: 600;
            font-size: 11px;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .content-wrapper .table tbody td {
            padding: 17px 20px;
            font-size: 12px;
            color: #586270;
            border-bottom-color: var(--border);
            vertical-align: middle;
        }

        .content-wrapper .table tbody tr:hover {
            background: #fbfcfd;
        }

        .content-wrapper .table tbody tr:last-child td {
            border-bottom: 0;
        }

        /* Mobile menu */

        .mobile-menu-button {
            display: none;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 10px 14px;
            margin-bottom: 18px;
        }

        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-content {
                width: 100%;
                margin-left: 0;
                padding: 24px;
            }

            .mobile-menu-button {
                display: inline-flex;
            }

            .sidebar-overlay.show {
                display: block;
                position: fixed;
                inset: 0;
                width: 100%;
                height: 100%;
                border: 0;
                background: rgba(12, 20, 27, .45);
                z-index: 1040;
            }

            body.sidebar-open {
                overflow: hidden;
            }
        }

        @media (max-width: 575px) {
            .admin-content {
                padding: 16px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .admin-sidebar,
            .sidebar-nav a {
                transition: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <button class="sidebar-overlay"
            id="sidebarOverlay"
            type="button"
            aria-label="Close navigation">
    </button>

    <aside class="admin-sidebar" id="adminSidebar">

        <div class="sidebar-header">

            <a href="{{ route('admin.dashboard') }}" class="brand-mark">

                <div class="brand-icon">
                    <i class="bi bi-bag-heart"></i>
                </div>

                <div>
                    <div class="brand-title">BeautyDesk</div>
                    <div class="brand-subtitle">Admin Panel</div>
                </div>

            </a>

        </div>

        <nav class="sidebar-nav">

            <div class="sidebar-heading">MAIN MENU</div>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>

            <div class="sidebar-heading">PRODUCT MANAGEMENT</div>

            <a href="{{ route('countries.index') }}"
               class="nav-link {{ request()->routeIs('countries.*') ? 'active' : '' }}">
                <i class="bi bi-globe"></i>
                Countries
            </a>

            <a href="{{ route('categories.index') }}"
               class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="bi bi-grid"></i>
                Categories
            </a>

            <a href="{{ route('sub-categories.index') }}"
               class="nav-link {{ request()->routeIs('sub-categories.*') ? 'active' : '' }}">
                <i class="bi bi-diagram-3"></i>
                Sub Categories
            </a>

            <a href="{{ route('brands.index') }}"
               class="nav-link {{ request()->routeIs('brands.*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i>
                Brands
            </a>

            <a href="{{ route('products.index') }}"
               class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                Products
            </a>

            <a href="{{ route('admin.orders.index') }}"
               class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="bi bi-receipt"></i>
                Orders
            </a>

            <a href="{{ route('admin.order-items.index') }}"
               class="nav-link {{ request()->routeIs('admin.order-items.*') ? 'active' : '' }}">
                <i class="bi bi-list"></i>
                Order Items
            </a>

            <a href="{{ route('admin.suppliers.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.suppliers.*') ? 'active' : '' }}">
                <i class="bi bi-truck"></i>
                <span>Suppliers</span>
            </a>

            <a href="{{ route('admin.purchases.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.purchases.*') ? 'active' : '' }}">
                <i class="bi bi-bag-check"></i>
                <span>Purchases</span>
            </a>

            <a href="{{ route('admin.stock.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.stock.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span>Stock Management</span>
            </a>

            <a href="{{ route('admin.currencies.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.currencies.*') ? 'active' : '' }}">
                <i class="bi bi-currency-exchange"></i>
                <span>Currency Management</span>
            </a>

        </nav>

        <div class="sidebar-footer">
            <i class="bi bi-circle-fill"></i>
            System Running
        </div>

    </aside>

    <main class="admin-content">

        <div class="content-wrapper">

            <button class="mobile-menu-button"
                    id="mobileMenuButton"
                    type="button"
                    aria-controls="adminSidebar"
                    aria-expanded="false">
                <i class="bi bi-list"></i>
                Menu
            </button>

            @yield('content')

        </div>

    </main>

    <script src="{{ asset('adminassets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        (() => {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const button = document.getElementById('mobileMenuButton');
            const mobile = window.matchMedia('(max-width: 991px)');

            function setOpen(open) {
                sidebar.classList.toggle('show', open);
                overlay.classList.toggle('show', open);
                document.body.classList.toggle('sidebar-open', open);
                button.setAttribute('aria-expanded', String(open));
                sidebar.inert = mobile.matches && !open;

                if (open) {
                    sidebar.querySelector('a').focus();
                }
            }

            button.addEventListener('click', () => {
                setOpen(!sidebar.classList.contains('show'));
            });

            overlay.addEventListener('click', () => {
                setOpen(false);
                button.focus();
            });

            document.addEventListener('keydown', (event) => {
                if (!sidebar.classList.contains('show')) return;

                if (event.key === 'Escape') {
                    setOpen(false);
                    button.focus();
                }

                if (event.key === 'Tab') {
                    const links = sidebar.querySelectorAll('a[href]');
                    const first = links[0];
                    const last = links[links.length - 1];

                    if (event.shiftKey && document.activeElement === first) {
                        event.preventDefault();
                        last.focus();
                    } else if (!event.shiftKey && document.activeElement === last) {
                        event.preventDefault();
                        first.focus();
                    }
                }
            });

            mobile.addEventListener('change', () => setOpen(false));

            setOpen(false);
        })();
    </script>

    @stack('scripts')

</body>
</html>