
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Dashboard Overview</h2>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h6 class="text-muted">Users</h6>
                    <h2 class="fw-bold">{{ $usersCount }}</h2>
                    <a href="{{ route('listUsers') }}">View Users →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h6 class="text-muted">Sellers</h6>
                    <h2 class="fw-bold">{{ $sellersCount }}</h2>
                    <a href="{{ route('sellers.index') }}">View Sellers →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h6 class="text-muted">Categories</h6>
                    <h2 class="fw-bold">{{ $categoriesCount }}</h2>
                    <a href="{{ route('categories.index') }}">View Categories →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h6 class="text-muted">Products</h6>
                    <h2 class="fw-bold">{{ $productsCount }}</h2>
                    <a href="{{ route('products.index') }}">View Products →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h6 class="text-muted">Orders</h6>
                    <h2 class="fw-bold">{{ $ordersCount }}</h2>
                    <a href="{{ route('orders.index') }}">View Orders →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h6 class="text-muted">Total Revenue</h6>
                    <h2 class="fw-bold">{{ number_format($totalRevenue, 2) }}</h2>
                    <span class="text-muted">Total sales value</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Orders -->
    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">Recent Orders</h5>
        </div>

        <div class="card-body p-4">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($recentOrders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>
                                    {{ number_format(
                                        $order->orderitems->sum(function ($item) {
                                            return $item->quantity * $item->product->price;
                                        }), 2
                                    ) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    No orders found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <a href="{{ route('orders.index') }}" class="btn btn-primary">
                View All Orders
            </a>

        </div>
    </div>

@endsection
