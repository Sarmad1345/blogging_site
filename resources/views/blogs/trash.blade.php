<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trash</title>
</head>

<body>


    <div class="header">
        <h1>Trash</h1>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary"> Back to Blogs</a>
    </div>

    @forelse ($blogs as $blog)
        <div class="blog-item">
            <div>
                <div class="todo-title">{{ $blog->title }}</div>
                @if ($blog->description)
                    <div class="todo-desc">{{ $blog->description }}</div>
                @endif
                <div class="todo-desc">Deleted {{ $blog->deleted_at->diffForHumans() }}</div>
            </div>

            <div class="actions">
                <form action="{{ route('blogs.restore', $blog) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-primary btn-small">Restore</button>
                </form>

                <form action="{{ route('blogs.force-delete', $blog->id) }}" method="POST"
                    onsubmit="return confirm('Permanently delete this blog?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-small">Delete Forever</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty">Trash is empty.</div>
    @endforelse

</body>

</html>
