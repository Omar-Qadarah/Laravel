@extends('layouts.admin')

@section('title', 'Products')

@section('content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Products</h2>
            <p class="text-muted mb-0">Manage your store products</p>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Product
        </a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Products Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">All Products</h5>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Seller</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <!-- Image -->
                                <td class="ps-4">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="55"
                                            height="55" class="rounded object-fit-cover">
                                    @else
                                        <div class="bg-secondary-subtle rounded d-flex align-items-center justify-content-center"
                                            style="width: 55px; height: 55px;">
                                            <span class="text-secondary small">No image</span>
                                        </div>
                                    @endif
                                </td>

                                <!-- Name -->
                                <td class="fw-semibold">
                                    {{ $product->name }}
                                </td>

                                <!-- Description -->
                                <td class="text-muted">
                                    {{ $product->description }}
                                </td>

                                <!-- Relationships -->
                                <td>{{ $product->catigore->name }}</td>
                                <td>{{ $product->seller->shop_name }}</td>

                                <!-- Price and Stock -->
                                <td class="fw-semibold">
                                    {{ number_format($product->price, 2) }}
                                </td>
                                <td>{{ $product->quantity }}</td>

                                <!-- Actions -->
                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this product?')">

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
                                <td colspan="8" class="text-center py-5">
                                    <h6 class="text-muted">No products found</h6>
                                    <p class="text-muted mb-0">
                                        Start by adding your first product.
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