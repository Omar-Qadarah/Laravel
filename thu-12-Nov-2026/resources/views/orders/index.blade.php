<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Orders</h2>

                    <a href="{{ route('orders.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Order
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">

                        <thead class="table-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Items</th>
                                <th>quentity</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->id }}</td>
                                                            <td>
                                                                @foreach($order->orderitems as $item)
                                                                    <div>
                                                                        {{ $item->product->name }}
                                                                    </div>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($order->orderitems as $item)
                                                                    <div>
                                                                        {{ $item->quantity }}
                                                                    </div>
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $order->user->name }}</td>
                                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>

                                                            <td>
                                                                {{ number_format(
                                                                    $order->orderitems->sum(function ($item) {
                                                                        return $item->quantity * $item->product->price;
                                                                    }),
                                                                    2
                                                                ) }}
                                                            </td>

                                                            <td class="text-center">
                                                                <div class="d-flex justify-content-center gap-2">
                                                                    <a href="{{route('orders.edit', $order->id)}}"
                                                                        class="btn btn-sm btn-outline-primary">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </a>

                                                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this order?')">

                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                            <i class="bi bi-trash3-fill"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <h6 class="text-secondary">No orders found</h6>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

</body>

</html>