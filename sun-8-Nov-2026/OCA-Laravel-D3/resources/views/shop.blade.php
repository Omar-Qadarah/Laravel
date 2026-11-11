<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Price</th>
            <th>Status</th>
            <th>Description</th>
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
                @if($loop->first)
                    <td>⭐ First Product</td>
                @elseif($loop->last)
                    <td>🏁 Last Product</td>
                @else
                    <td>😒 Middle child </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="5">All shelves are empty 🕸️🕸️</td>
            </tr>
        @endforelse
    </tbody>
</table>