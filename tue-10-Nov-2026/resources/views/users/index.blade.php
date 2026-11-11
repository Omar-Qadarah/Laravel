<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Users</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('users.create') }}">Create User</a></p>

    @if ($users->isEmpty())
        <p>No users found.</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>
                    {{ $user->name }} — {{ $user->email }}

                    <a href="{{ route('users.show', $user) }}">View</a>
                    <a href="{{ route('users.edit', $user) }}">Edit</a>

                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
