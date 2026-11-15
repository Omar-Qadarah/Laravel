@extends('layouts.admin')

@section('title', 'Orders')

@section('content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Orders</h2>
            <p class="text-muted mb-0">Manage customer orders</p>
        </div>

        <a href="{{ route('orders.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Order
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Orders Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">All Orders</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Order ID</th>
                            <th>Items</th>
                            <th>Quantity</th>
                            <th>Customer</th>
                            <th>Order Date</th>
                            <th>Total</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orders as $order)
                                            <tr>
                                                <td class="ps-4 fw-semibold">#{{ $order->id }}</td>

                                                <td>
                                                    @foreach($order->orderitems as $item)
                                                        <div>{{ $item->product->name }}</div>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    @foreach($order->orderitems as $item)
                                                        <div>{{ $item->quantity }}</div>
                                                    @endforeach
                                                </td>

                                                <td>{{ $order->user->name }}</td>

                                                <td>{{ $order->created_at->format('Y-m-d') }}</td>

                                                <td class="fw-semibold">
                                                    {{ number_format(
                                $order->orderitems->sum(function ($item) {
                                    return $item->quantity * $item->product->price;
                                }),
                                2
                            ) }}
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">

                                                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-outline-primary"
                                                            title="Edit">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>

                                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this order?')">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                                <i class="bi bi-trash3-fill"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <h6 class="text-muted">No orders found</h6>
                                    <p class="text-muted mb-0">Start by adding your first order.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection