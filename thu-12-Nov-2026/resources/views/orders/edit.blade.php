@extends('layouts.admin')

@section('title', 'Edit Order')

@section('content')

    <!-- Page Heading -->
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit Order #{{ $order->id }}</h2>
        <p class="text-muted mb-0">Update customer and product information</p>
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

    <!-- Edit Order Form -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">Order Information</h5>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Customer -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Customer</label>

                    <select name="user_id" class="form-select">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('user_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Product Information</h5>

                @php
                    $firstItem = $order->orderitems->first();
                @endphp

                <!-- Product -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Product</label>

                    <select name="product_id" class="form-select">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id', $firstItem->product_id ?? '') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} — Stock: {{ $product->quantity }}
                            </option>
                        @endforeach
                    </select>

                    @error('product_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quantity -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Quantity</label>

                    <input type="number" name="quantity" min="1" class="form-control"
                        value="{{ old('quantity', $firstItem->quantity ?? 1) }}">

                    @error('quantity')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Order
                    </button>

                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

@endsection