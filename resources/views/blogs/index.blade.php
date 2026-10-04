<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Blogs</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px auto; max-width: 800px; line-height: 1.6; }
        .btn { display: inline-block; padding: 6px 12px; text-decoration: none; border-radius: 4px; border: 1px solid #ccc; background: #f4f4f4; color: #333; cursor: pointer; }
        .btn-primary { background: #007bff; color: white; border-color: #007bff; }
        .btn-danger { background: #dc3545; color: white; border-color: #dc3545; }
        .alert { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 4px; }
        .blog-item { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 6px; }
        .blog-actions { margin-top: 10px; }
    </style>
</head>
<body>
    <h1>All Blogs</h1>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">+ Add New Blog</a>
    </p>

    @if ($blogs->isEmpty())
        <p>No blogs found.</p>
    @else
        @foreach ($blogs as $blog)
            <div class="blog-item">
                <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
                <p>{{ Str::limit($blog->content, 120) }}</p>
                <div class="blog-actions">
                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn">View</a>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn">Edit</a>
                    
                    {{-- Pure HTML Delete Form (No JavaScript) --}}
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</body>
</html>