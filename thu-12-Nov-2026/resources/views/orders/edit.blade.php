<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h2>Edit Order #{{ $order->id }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="form-label">Customer</label>
                <select name="user_id" class="form-select mb-3">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>

                <label class="form-label">Product</label>
                <select name="product_id" class="form-select mb-3">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}"
                            {{ old('product_id', $order->orderitems->first()->product_id ?? '') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} — Stock: {{ $product->quantity }}
                        </option>
                    @endforeach
                </select>

                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" min="1" class="form-control mb-3"
                    value="{{ old('quantity', $order->orderitems->first()->quantity ?? 1) }}">

                <button class="btn btn-primary">Update Order</button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>