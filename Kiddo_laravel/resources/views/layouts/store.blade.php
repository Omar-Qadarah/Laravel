<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Kiddo's") | Kiddo's</title>
    <meta name="description" content="Kiddo's is a toy store in Jordan for kids aged 3 to 12. Pay cash on delivery.">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/kiddos-icon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;700;800&family=Nunito:wght@500;600;700;800&display=swap" rel="stylesheet">

    @foreach ([
        'style.css',
        'storefront.css',
        'storefront-ux.css',
        'store-design.css',
        'customer-polish.css',
        'customer-motion.css',
        'landing.css',
    ] as $stylesheet)
        <link rel="stylesheet" href="{{ asset('assets/css/' . $stylesheet) }}">
    @endforeach

    <script src="{{ asset('assets/js/storefront.js') }}" defer></script>
    <script src="{{ asset('assets/js/storefront-ux.js') }}" defer></script>
    <script src="{{ asset('assets/js/customer-motion.js') }}" defer></script>
    @stack('styles')
</head>
<body>
    <header class="site-header shop-header">
        <div class="container shop-header-row">
            <a class="brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/kiddos-logo.png') }}"
                     alt="Kiddo's" width="183" height="44">
            </a>

            <nav class="shop-nav" aria-label="Main">
                <ul>
                    <li><a class="is-active" href="{{ url('/') }}" aria-current="page">Home</a></li>
                    <li><a href="{{ url('/products') }}">Toys</a></li>
                    <li><a href="{{ url('/categories') }}">Categories</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Kiddo's. All rights reserved.</p>
            <p>Thoughtful toys for every stage of childhood, delivered across Jordan.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>