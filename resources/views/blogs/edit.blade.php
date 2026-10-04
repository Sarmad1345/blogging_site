<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px auto; max-width: 600px; line-height: 1.6; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        textarea { height: 150px; }
        .btn { display: inline-block; padding: 8px 16px; text-decoration: none; border-radius: 4px; border: 1px solid #ccc; background: #f4f4f4; color: #333; cursor: pointer; }
        .btn-primary { background: #007bff; color: white; border-color: #007bff; }
        .error { color: #dc3545; font-size: 14px; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>Edit Blog</h1>

    <p><a href="{{ route('blogs.index') }}">&larr; Back to All Blogs</a></p>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</body>
</html>