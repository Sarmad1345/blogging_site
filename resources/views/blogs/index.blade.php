<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Blogs</title>

</head>

<body>
    <h1>All Blogs</h1>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('blogs.search') }}" method="GET" style="margin-bottom: 1rem;">
        <input type="text" name="search" id="searchInput" placeholder="Search blogs..." value="{{ request('search') }}">
        <button type="submit" id="searchButton">Search</button>
    </form>

    <a href="{{ route('blogs.trash') }}">Trash</a>

    <p>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">+ Add New Blog</a>
    </p>

    @if ($blogs->isEmpty())
        <p>No blogs found.</p>
    @else
        @foreach ($blogs as $blog)
            <div class="blog-item">
                <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
                <p>{{ $blog->description }}</p>

                <small>Published on: {{ $blog->created_at ? $blog->created_at->format('M d, Y') : '' }}</small>


            </div>
        @endforeach
        {{ $blogs->withQueryString()->links() }}

    @endif
</body>

</html>
