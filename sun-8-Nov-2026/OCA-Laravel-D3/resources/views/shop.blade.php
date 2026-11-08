<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }}</td>

                @if ($product['in_stock'])
                    <td>In stock</td>
                @else
                    <td>Out of stock</td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="4">All shelves are empty 🕸️🕸️</td>
            </tr>
        @endforelse
    </tbody>
</table>