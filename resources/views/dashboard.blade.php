@extends('layouts.admin')

@section('title', 'Dashboard | BeautyDesk')

@push('styles')
<style>
    .admin-shell,
    .admin-main {
        width: 100%;
        min-width: 0;
    }

    /* Navbar */

    .admin-navbar {
        padding: 0 0 25px;
        margin-bottom: 26px;
        border-bottom: 1px solid #e2e6ea;
    }

    .navbar-label {
        color: #98a0aa;
        font-size: 11px;
    }

    .navbar-label strong {
        color: #48515d;
        font-weight: 600;
    }

    .navbar-actions {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .navbar-date {
        font-size: 11px;
        color: #7e8793;
    }

    .profile-button {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-avatar {
        width: 39px;
        height: 39px;
        border-radius: 12px;
        background: #deeee6;
        color: #246349;
        display: grid;
        place-items: center;
        font-size: 14px;
        font-weight: 700;
    }

    .profile-name {
        font-size: 12px;
        font-weight: 600;
        color: #34404b;
    }

    .profile-role {
        display: block;
        font-size: 10px;
        font-weight: 400;
        color: #89929c;
        margin-top: 3px;
    }

    /* Heading */

    .page-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 26px;
    }

    .eyebrow {
        color: #7a858f;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .page-heading h1 {
        font-size: 30px;
        font-weight: 700;
        letter-spacing: -1px;
        margin-bottom: 8px;
    }

    .page-heading-copy > p:last-child {
        color: #87909b;
        font-size: 12px;
        margin-bottom: 0;
    }

    .heading-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    /* Metric cards */

    .metric-card {
        height: 100%;
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 22px;
    }

    .metric-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 14px;
    }

    .metric-label {
        color: #7d8793;
        font-size: 12px;
    }

    .metric-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: grid;
        place-items: center;
        font-size: 17px;
    }

    .metric-primary .metric-icon {
        background: #e5f1eb;
        color: #30775a;
    }

    .metric-success .metric-icon {
        background: #eaf0fa;
        color: #6285b8;
    }

    .metric-warning .metric-icon {
        background: #fbf2df;
        color: #b68e42;
    }

    .metric-danger .metric-icon {
        background: #f0ecf8;
        color: #9478b5;
    }

    .metric-value {
        color: #252e37;
        font-size: 29px;
        font-weight: 700;
        letter-spacing: -.8px;
    }

    .metric-meta {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        color: #949da6;
        font-size: 10px;
        margin-top: 14px;
    }

    .metric-growth {
        color: #408363;
        background: #eef6f1;
        padding: 4px 7px;
        border-radius: 5px;
        font-weight: 600;
    }

    /* Panels */

    .panel {
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }

    .panel-header {
        padding: 23px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
    }

    .section-title {
        font-size: 15px;
        font-weight: 650;
        margin-bottom: 6px;
    }

    .panel-header p {
        color: #9199a3;
        font-size: 11px;
        margin-bottom: 0;
    }

    .panel-label {
        font-size: 10px;
        color: #738278;
        background: #f1f6f3;
        border: 1px solid #e5eee8;
        border-radius: 7px;
        padding: 7px 10px;
        white-space: nowrap;
    }

    .sales-summary {
        padding: 0 23px;
        display: flex;
        align-items: baseline;
        gap: 12px;
    }

    .sales-summary strong {
        font-size: 27px;
        color: #2a343b;
        font-weight: 700;
        letter-spacing: -.7px;
    }

    .sales-summary span {
        color: #5d9477;
        font-size: 10px;
        font-weight: 600;
    }

    /* Chart */

    .chart-bars {
        display: flex;
        align-items: flex-end;
        height: 240px;
        gap: 20px;
        margin: 15px 23px 22px;
        padding-top: 10px;
        background:
            repeating-linear-gradient(
                to top,
                transparent 0,
                transparent 49px,
                #f1f4f6 49px,
                #f1f4f6 50px
            );
    }

    .chart-column {
        flex: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .chart-column span {
        width: 70%;
        max-width: 43px;
        background: #dcece3;
        border-radius: 6px 6px 2px 2px;
    }

    .chart-column.highlight span {
        background: #287558;
    }

    .chart-column small {
        font-size: 10px;
        color: #8e98a2;
    }

    .bar-42 span { height: 42%; }
    .bar-58 span { height: 58%; }
    .bar-51 span { height: 51%; }
    .bar-72 span { height: 72%; }
    .bar-66 span { height: 66%; }
    .bar-83 span { height: 83%; }

    /* Activity */

    .activity-list {
        padding: 0 23px;
    }

    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 20px 0;
        border-bottom: 1px solid #eef1f4;
    }

    .activity-item:last-child {
        border-bottom: 0;
    }

    .activity-icon {
        width: 37px;
        height: 37px;
        flex-shrink: 0;
        border-radius: 11px;
        background: #edf5f0;
        color: #58836d;
        display: grid;
        place-items: center;
        font-size: 17px;
    }

    .activity-icon.gold {
        background: #fbf5e8;
        color: #b39a62;
    }

    .activity-icon.purple {
        background: #f1edf8;
        color: #9980b4;
    }

    .activity-item strong {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #46515e;
        margin-bottom: 5px;
    }

    .activity-item p {
        color: #929aa5;
        font-size: 11px;
        line-height: 1.7;
        margin-bottom: 0;
    }

    .activity-time {
        display: block;
        color: #abb2ba;
        font-size: 9px;
        margin-top: 7px;
    }

    /* Table */

    .customer-avatar {
        width: 36px;
        height: 36px;
        border-radius: 11px;
        display: grid;
        place-items: center;
        background: #eff3f6;
        color: #738292;
        font-size: 11px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .customer-name {
        font-size: 12px;
        color: #46505c;
        font-weight: 600;
    }

    .customer-email {
        font-size: 10px;
        color: #9aa2ad;
        margin-top: 3px;
    }

    .order-number {
        color: #497862;
        font-weight: 650;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 10px;
        font-weight: 600;
        padding: 6px 9px;
        border-radius: 6px;
        white-space: nowrap;
    }

    .status-badge::before {
        content: "";
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
    }

    .status-delivered {
        color: #5e8c70;
        background: #eef6f0;
    }

    .status-processing {
        color: #b29558;
        background: #fcf6e8;
    }

    .status-shipped {
        color: #8b7ab4;
        background: #f2eef9;
    }

    .dashboard-footer {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-top: 23px;
        color: #9aa3ad;
        font-size: 10px;
    }

    .preview-label {
        color: #8a959f;
        font-size: 10px;
        margin-bottom: 15px;
    }

    @media (max-width: 767px) {
        .page-heading {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-heading h1 {
            font-size: 26px;
        }

        .metric-card {
            padding: 18px;
        }

        .metric-value {
            font-size: 25px;
        }

        .chart-bars {
            gap: 12px;
        }

        .dashboard-footer {
            flex-wrap: wrap;
        }
    }

    @media (max-width: 575px) {
        .navbar-date,
        .profile-copy {
            display: none;
        }

        .panel-header {
            padding: 20px 17px;
        }

        .activity-list {
            padding: 0 17px;
        }
    }
</style>
@endpush

@section('content')

    <div class="admin-shell">

        <div class="admin-main">

            <!-- Navbar -->

            <nav class="navbar admin-navbar navbar-expand">

                <div class="container-fluid px-0">

                    <div class="navbar-label">
                        Workspace
                        <span class="mx-2">/</span>
                        <strong>Dashboard</strong>
                    </div>

                    <div class="navbar-actions ms-auto">

                        <span class="navbar-date">
                            <i class="bi bi-calendar3 me-2"></i>
                            {{ now()->format('d M Y') }}
                        </span>

                        <div class="profile-button">

                            <span class="profile-avatar">
                                {{ mb_strtoupper(mb_substr(auth('web')->user()?->name ?? 'Admin', 0, 1)) }}
                            </span>

                            <div class="profile-copy">
                                <span class="profile-name">
                                    {{ auth('web')->user()?->name ?? 'Admin' }}
                                </span>

                                <span class="profile-role">
                                    Store Administrator
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            </nav>

            <main class="dashboard-content">

                <div class="container-fluid px-0">

                    <!-- Heading -->

                    <div class="page-heading">

                        <div class="page-heading-copy">

                            <p class="eyebrow">BeautyDesk Overview</p>

                            <h1>Welcome back, {{ auth('web')->user()?->name ?? 'Admin' }}.</h1>

                            <p>Here's what's happening with your beauty store.</p>

                        </div>

                        <div class="heading-actions">

                            <a href="{{ route('admin.orders.index') }}"
                               class="btn btn-outline-secondary">
                                <i class="bi bi-receipt me-1"></i>
                                View Orders
                            </a>

                            <a href="{{ route('products.index') }}"
                               class="btn btn-primary">
                                <i class="bi bi-bag-heart me-1"></i>
                                Manage Products
                            </a>

                        </div>

                    </div>

                    <p class="preview-label">
                        Design preview — figures, chart and orders below are sample data.
                    </p>

                    <!-- Metrics -->

                    <section class="row g-3"
                             aria-label="Sample store metrics">

                        <div class="col-12 col-sm-6 col-xl-3">

                            <article class="metric-card metric-primary">

                                <div class="metric-top">
                                    <span class="metric-label">Total Revenue</span>
                                    <span class="metric-icon">
                                        <i class="bi bi-wallet2"></i>
                                    </span>
                                </div>

                                <div class="metric-value">৳ 48,240</div>

                                <div class="metric-meta">
                                    <span class="metric-growth">↗ 12.5%</span>
                                    <span>vs. last month</span>
                                </div>

                            </article>

                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">

                            <article class="metric-card metric-success">

                                <div class="metric-top">
                                    <span class="metric-label">Total Orders</span>
                                    <span class="metric-icon">
                                        <i class="bi bi-bag-check"></i>
                                    </span>
                                </div>

                                <div class="metric-value">1,284</div>

                                <div class="metric-meta">
                                    <span class="metric-growth">↗ 8.2%</span>
                                    <span>vs. last month</span>
                                </div>

                            </article>

                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">

                            <article class="metric-card metric-warning">

                                <div class="metric-top">
                                    <span class="metric-label">Customers</span>
                                    <span class="metric-icon">
                                        <i class="bi bi-people"></i>
                                    </span>
                                </div>

                                <div class="metric-value">8,742</div>

                                <div class="metric-meta">
                                    <span class="metric-growth">↗ 5.1%</span>
                                    <span>vs. last month</span>
                                </div>

                            </article>

                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">

                            <article class="metric-card metric-danger">

                                <div class="metric-top">
                                    <span class="metric-label">Total Products</span>
                                    <span class="metric-icon">
                                        <i class="bi bi-box-seam"></i>
                                    </span>
                                </div>

                                <div class="metric-value">236</div>

                                <div class="metric-meta">
                                    <span class="metric-growth">18 new</span>
                                    <span>added this month</span>
                                </div>

                            </article>

                        </div>

                    </section>

                    <!-- Sales and activity -->

                    <section class="row g-3 mt-1">

                        <div class="col-12 col-xl-8">

                            <div class="panel h-100">

                                <div class="panel-header">

                                    <div>
                                        <h2 class="section-title">Sales Performance</h2>
                                        <p>Sample revenue overview across six months.</p>
                                    </div>

                                    <span class="panel-label">Jan — Jun</span>

                                </div>

                                <div class="sales-summary">
                                    <strong>৳ 48,240</strong>
                                    <span>Sample revenue</span>
                                </div>

                                <div class="chart-bars"
                                     role="img"
                                     aria-label="Illustrative sales trend: Jan 42, Feb 58, Mar 51, Apr 72, May 66, Jun 83.">

                                    <div class="chart-column bar-42">
                                        <span></span>
                                        <small>Jan</small>
                                    </div>

                                    <div class="chart-column bar-58">
                                        <span></span>
                                        <small>Feb</small>
                                    </div>

                                    <div class="chart-column bar-51">
                                        <span></span>
                                        <small>Mar</small>
                                    </div>

                                    <div class="chart-column bar-72">
                                        <span></span>
                                        <small>Apr</small>
                                    </div>

                                    <div class="chart-column bar-66">
                                        <span></span>
                                        <small>May</small>
                                    </div>

                                    <div class="chart-column bar-83 highlight">
                                        <span></span>
                                        <small>Jun</small>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-xl-4">

                            <div class="panel h-100">

                                <div class="panel-header">

                                    <div>
                                        <h2 class="section-title">Recent Activity</h2>
                                        <p>Sample updates from your store.</p>
                                    </div>

                                </div>

                                <div class="activity-list">

                                    <div class="activity-item">

                                        <span class="activity-icon">
                                            <i class="bi bi-bag-heart"></i>
                                        </span>

                                        <div>
                                            <strong>New collection added</strong>
                                            <p>Korean skincare products added to the catalog.</p>
                                            <span class="activity-time">10 minutes ago</span>
                                        </div>

                                    </div>

                                    <div class="activity-item">

                                        <span class="activity-icon purple">
                                            <i class="bi bi-truck"></i>
                                        </span>

                                        <div>
                                            <strong>Orders dispatched</strong>
                                            <p>The latest delivery batch is on its way.</p>
                                            <span class="activity-time">35 minutes ago</span>
                                        </div>

                                    </div>

                                    <div class="activity-item">

                                        <span class="activity-icon gold">
                                            <i class="bi bi-box-seam"></i>
                                        </span>

                                        <div>
                                            <strong>Inventory updated</strong>
                                            <p>New stock received from your supplier.</p>
                                            <span class="activity-time">1 hour ago</span>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>

                    <!-- Orders -->

                    <section class="panel mt-3">

                        <div class="panel-header">

                            <div>
                                <h2 class="section-title">Recent Orders</h2>
                                <p>Sample customer orders for this design preview.</p>
                            </div>

                            <a href="{{ route('admin.orders.index') }}"
                               class="btn btn-outline-secondary btn-sm">
                                View All
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </div>

                        <div class="table-responsive">

                            <table class="table align-middle">

                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>
                                            <span class="order-number">#BD-1001</span>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center gap-2">

                                                <span class="customer-avatar">SA</span>

                                                <div>
                                                    <div class="customer-name">Sarah Ahmed</div>
                                                    <div class="customer-email">sarah@example.com</div>
                                                </div>

                                            </div>
                                        </td>

                                        <td>COSRX Snail Essence</td>
                                        <td>৳ 2,450</td>

                                        <td>
                                            <span class="status-badge status-delivered">
                                                Delivered
                                            </span>
                                        </td>

                                        <td>08 Oct 2026</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="order-number">#BD-1002</span>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center gap-2">

                                                <span class="customer-avatar">NK</span>

                                                <div>
                                                    <div class="customer-name">Nadia Khan</div>
                                                    <div class="customer-email">nadia@example.com</div>
                                                </div>

                                            </div>
                                        </td>

                                        <td>Beauty of Joseon Sunscreen</td>
                                        <td>৳ 1,850</td>

                                        <td>
                                            <span class="status-badge status-processing">
                                                Processing
                                            </span>
                                        </td>

                                        <td>09 Oct 2026</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="order-number">#BD-1003</span>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center gap-2">

                                                <span class="customer-avatar">MA</span>

                                                <div>
                                                    <div class="customer-name">Maliha Akter</div>
                                                    <div class="customer-email">maliha@example.com</div>
                                                </div>

                                            </div>
                                        </td>

                                        <td>Laneige Lip Sleeping Mask</td>
                                        <td>৳ 2,100</td>

                                        <td>
                                            <span class="status-badge status-shipped">
                                                Shipped
                                            </span>
                                        </td>

                                        <td>09 Oct 2026</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </section>

                    <div class="dashboard-footer">
                        <span>© {{ date('Y') }} BeautyDesk</span>
                        <span>Beauty store management</span>
                    </div>

                </div>

            </main>

        </div>

    </div>

@endsection