<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <div class="admin-wrapper">

        <!-- Sidebar -->
        <aside class="sidebar">

            <div class="sidebar-brand">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Store Admin</span>
            </div>

            <div class="sidebar-menu">
                <p class="menu-heading">MAIN MENU</p>

                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-house"></i>
                    Dashboard
                </a>

                <a href="{{ route('categories.index') }}">
                    <i class="bi bi-tags"></i>
                    Categories
                </a>

                <a href="{{ route('products.index') }}">
                    <i class="bi bi-box-seam"></i>
                    Products
                </a>

                <a href="{{ route('sellers.index') }}">
                    <i class="bi bi-shop"></i>
                    Sellers
                </a>

                <p class="menu-heading">MANAGEMENT</p>

                <a href="{{ route('listUsers') }}">
                    <i class="bi bi-people"></i>
                    Users
                </a>

                <a href="{{ route('orders.index') }}">
                    <i class="bi bi-receipt"></i>
                    Orders
                </a>
            </div>

        </aside>

        <!-- Main Content -->
        <div class="main-area">

            <!-- Topbar -->
            <header class="topbar">
                <span>STORE ADMINISTRATION</span>

                <div>
                    <i class="bi bi-person-circle"></i>
                    Admin User
                </div>
            </header>

            <!-- Page Content -->
            <main class="page-content">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>