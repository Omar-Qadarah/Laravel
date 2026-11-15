
@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit Product</h2>
        <p class="text-muted mb-0">Update product information</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">Product Information</h5>
        </div>

        <div class="card-body p-4">

            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Product Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $product->name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Category</label>
                    <select name="cat_id" class="form-select">
                        <option value="">Choose category</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('cat_id', $product->cat_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Seller</label>
                    <select name="seller_id" class="form-select">
                        <option value="">Choose seller</option>

                        @foreach($sellers as $seller)
                            <option value="{{ $seller->id }}"
                                {{ old('seller_id', $product->seller_id) == $seller->id ? 'selected' : '' }}>
                                {{ $seller->shop_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control"
                            value="{{ old('price', $product->price) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Quantity</label>
                        <input type="number" name="quantity" class="form-control"
                            value="{{ old('quantity', $product->quantity) }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Current Image</label>

                    @if($product->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                width="120"
                                height="120"
                                class="rounded-3 object-fit-cover">
                        </div>
                    @else
                        <p class="text-muted">No image uploaded.</p>
                    @endif

                    <label class="form-label fw-semibold">Choose a New Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Product
                    </button>

                    <a href="{{ route('products.index') }}" class="btn btn-light border">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection
