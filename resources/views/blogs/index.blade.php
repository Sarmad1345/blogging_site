<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-4">

        <h1 class="mb-4">All Blogs</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('blogs.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search blogs..."
                    value="{{ request('search') }}">

                <button type="submit" id="searchButton" class="btn btn-dark">
                    Search
                </button>
            </div>
        </form>

        <div class="mb-4">
            <a href="{{ route('blogs.trash') }}" class="btn btn-secondary">
                Trash
            </a>

            <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                + Add New Blog
            </a>
        </div>

        @if ($blogs->isEmpty())

            <p>No blogs found.</p>
        @else
            <div class="row g-4">

                @foreach ($blogs as $blog)
                    <div class="col-md-4">

                        <div class="card h-100 shadow-sm">

                            <div class="card-body">
                                <div>
                                    <img src="{{ asset('storage/' . $blog->image->path) }}" alt="Uploaded Image"
                                        height="200px" width="100%" class="d-block mb-3 accordion-item mx-auto">
                                </div>


                                <h2 class="card-title fs-4">
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none">
                                        {{ $blog->title }}
                                    </a>
                                </h2>

                                <p class="card-text"
                                    style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $blog->description }}
                                </p>
                                @if ($blog->tags->isNotEmpty())
                                    <div class="my-2">
                                        @foreach ($blog->tags as $tag)
                                            <p class="badge text-bg-secondary text-decoration-none">
                                                #{{ $tag->name }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <small class="d-block">
                                    Category:
                                    {{ $blog->category?->name ?? 'Uncategorized' }}
                                </small>

                                <small class="text-muted">
                                    Published on:
                                    {{ $blog->created_at?->format('M d, Y') }}
                                </small>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            <div class="mt-4">
                {{ $blogs->withQueryString()->links() }}
            </div>

        @endif

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
