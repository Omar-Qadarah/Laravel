@isset($name)
<h1>Hello, {{ $name }}!</h1>
<p>Welcome from {{ $city }}</p>
@endisset
@if(strtoupper($city) == 'AMMAN')
    <p>Welcome from the capital of Jordan</p>
@elseif(strtoupper($city) == 'RUSSEIFEH' || strtoupper($city) == 'ZARQA')
    <p>Welcome from the other side</p>
@else
    <p>Welcome to Jordan! GG</p>
@endif
@empty($cart)
    <p>Your cart is empty🕸️🕸️</p>
@else 
    <p>You have {{ count($cart) }} item(s)</p>
@endempty
@guest
    <span>Hello stranger!</span>
@else
    <span>Welcome {{ auth()->user()->name }}</span>
@endguest