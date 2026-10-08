<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $blog->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px auto;
            max-width: 800px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            border: 1px solid #ccc;
            background: #f4f4f4;
            color: #333;
            cursor: pointer;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
            border-color: #dc3545;
        }

        .content {
            margin: 20px 0;
            font-size: 18px;
            white-space: pre-line;
        }

        .actions {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <p><a href="{{ route('blogs.index') }}">&larr; Back to All Blogs</a></p>

    <h1>{{ $blog->title }}</h1>
    <small>Published on: {{ $blog->created_at ? $blog->created_at->format('M d, Y') : '' }}</small>

    <div class="description">
        {{ $blog->description }}
    </div>
    <small> | Category: {{ $blog->category?->name ?? 'Uncategorized' }}</small>


    <div class="actions">
        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn">Edit</a>

        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</body>


</html>
