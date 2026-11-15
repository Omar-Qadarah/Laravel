@extends('layouts.admin')

@section('title', 'Seller Details')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Seller Details</h2>
            <p class="text-muted mb-0">View seller information and products</p>
        </div>

        <a href="{{ route('sellers.index') }}" class="btn btn-light border">
            <i class="bi bi-arrow-left"></i> Back to Sellers
        </a>
    </div>

    <!-- Seller Information -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">Seller Information</h5>
        </div>

        <div class="card-body p-4">
            <h4 class="fw-bold mb-3">{{ $seller->shop_name }}</h4>

            <div class="row g-3">
                <div class="col-md-4">
                    <p class="text-muted mb-1">Seller ID</p>
                    <p class="fw-semibold mb-0">{{ $seller->id }}</p>
                </div>

                <div class="col-md-4">
                    <p class="text-muted mb-1">Owner</p>
                    <p class="fw-semibold mb-0">{{ $seller->user->name }}</p>
                </div>

                <div class="col-md-4">
                    <p class="text-muted mb-1">Email</p>
                    <p class="fw-semibold mb-0">{{ $seller->user->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Seller Products -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">Products Belonging to This Seller</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Stock</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($seller->products as $product)
                            <tr>
                                <td class="ps-4">{{ $product->id }}</td>
                                <td class="fw-semibold">{{ $product->name }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <h6 class="text-muted">No products found</h6>
                                    <p class="text-muted mb-0">
                                        This seller has no products yet.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection