
@extends('layouts.admin')

@section('title', 'Create Order')

@section('content')

    <!-- Page Heading -->
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Create Order</h2>
        <p class="text-muted mb-0">Create a new customer order</p>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger rounded-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Order Form -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">Order Information</h5>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <!-- Customer -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Customer</label>

                    <select name="user_id" class="form-select">
                        <option value="">Choose customer</option>

                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('user_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="my-4">

                <!-- Products -->
                <h5 class="fw-bold mb-3">Products</h5>

                <div class="row g-3 mb-4">

                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Product</label>

                        <select name="products[0][product_id]" class="form-select">
                            <option value="">Choose product</option>

                            @foreach($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('products.0.product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} — {{ number_format($product->price, 2) }}
                                </option>
                            @endforeach
                        </select>

                        @error('products.0.product_id')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Quantity</label>

                        <input type="number"
                               name="products[0][quantity]"
                               class="form-control"
                               min="1"
                               value="{{ old('products.0.quantity', 1) }}">

                        @error('products.0.quantity')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Create Order
                    </button>

                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

@endsection
