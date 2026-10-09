<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <main class="container py-4">
        <div class="d-flex flex-column flex-sm-row gap-3 mb-4 justify-content-between align-items-sm-center">
            <h1 class="mb-0">Trash</h1>
            <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back to Blogs</a>
        </div>

        @forelse ($blogs as $blog)
            <div class="mb-3 card shadow-sm">
                <div class="d-flex flex-column flex-md-row gap-3 card-body justify-content-between">
                    <div>
                        <h2 class="card-title h5">{{ $blog->title }}</h2>
                        @if ($blog->description)
                            <p class="card-text">{{ $blog->description }}</p>
                        @endif
                        <small class="text-muted">Deleted {{ $blog->deleted_at->diffForHumans() }}</small>
                    </div>

                    <div class="d-flex flex-wrap gap-2 align-items-start">
                        <form action="{{ route('blogs.restore', $blog) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">Restore</button>
                        </form>

                        <form action="{{ route('blogs.force-delete', $blog->id) }}" method="POST"
                            onsubmit="return confirm('Permanently delete this blog?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Forever</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="mb-0 alert alert-info" role="status">Trash is empty.</div>
        @endforelse
    </main>

</body>

</html>
