<!DOCTYPE html>
<html>
<head>
    <title>OCA Blog</title>
</head>
<body>
    <h1>OCA Blog</h1>

    @if ($posts->isEmpty())
        <p>No posts yet.</p>
    @else
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
