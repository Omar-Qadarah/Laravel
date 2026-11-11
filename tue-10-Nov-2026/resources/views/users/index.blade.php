<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Users</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($users->isEmpty())
        <p>No users found.</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }} — {{ $user->email }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>