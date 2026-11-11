<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input id="name" type="text" name="name"
               value="{{ old('name', $user->name) }}" required>

        <label for="email">Email</label>
        <input id="email" type="email" name="email"
               value="{{ old('email', $user->email) }}" required>

        <label for="password">New password (leave blank to keep current)</label>
        <input id="password" type="password" name="password">

        <label for="password_confirmation">Confirm new password</label>
        <input id="password_confirmation" type="password" name="password_confirmation">

        <button type="submit">Save changes</button>
    </form>

    <p><a href="{{ route('users.index') }}">Back to users</a></p>
</body>
</html>