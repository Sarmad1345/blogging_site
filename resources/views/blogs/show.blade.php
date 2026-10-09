<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="mb-4">
            <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary">&larr; Back to All Blogs</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="p-4 p-md-5 card-body">
                <img src="{{ asset('storage/' . $blog->image->path) }}" alt="Uploaded Image" height="200px"
                    class="d-block mb-4 mx-auto">

                <h1 class="mb-3">{{ $blog->title }}</h1>

                <div class="mb-3 text-muted">
                    Published on: {{ $blog->created_at ? $blog->created_at->format('M d, Y') : '' }}
                    <span class="mx-2">|</span>
                    Category: {{ $blog->category?->name ?? 'Uncategorized' }}
                </div>
                @if ($blog->tags->isNotEmpty())
                    <p>
                        Tags:
                        @foreach ($blog->tags as $tag)
                            <p class="badge text-bg-secondary text-decoration-none">#{{ $tag->name }}</p>
                        @endforeach
                    </p>
                @endif

                <div class="mb-4 lead">
                    {{ $blog->description }}
                </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>

                    <div class="actions">

                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
