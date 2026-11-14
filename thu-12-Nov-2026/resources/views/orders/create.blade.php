<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h2 class="mb-4">Create Order</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Customer</label>
                        <select name="user_id" class="form-select">
                            <option value="">Choose customer</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <h5>Products</h5>

                    <div class="mb-3">
                        <label class="form-label">Product</label>
                        <select name="products[0][product_id]" class="form-select">
                            <option value="">Choose product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('products.0.product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} — {{ number_format($product->price, 2) }}
                                </option>
                            @endforeach
                        </select>

                        <label class="form-label mt-2">Quantity</label>
                        <input type="number" name="products[0][quantity]" class="form-control" min="1"
                            value="{{ old('products.0.quantity', 1) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Create Order</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>

                </form>

            </div>
        </div>
    </div>

</body>

</html>