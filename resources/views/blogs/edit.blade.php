<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Blog</title>
</head>

<body>
    <div class="container mt-4 mb-5">
        <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary mb-3">← Back to All Blogs</a>
        <h1 class="mb-4">Edit Blog</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-input type="email" name="email" label="Email address" :value="$blog->email" placeholder="name@example.com" />

            <x-input name="title" label="Title" :value="$blog->title" placeholder="Blog title" />

            <x-textarea name="description" label="Description" :value="$blog->description" placeholder="Blog description" />

            <x-select name="category_id" label="Category" :options="$categories" :selected="$blog->category_id" placeholder="-- Select category --" />

            <x-checkbox-group name="tags[]" label="Tags" :items="$tags" :selected="$blog->tags->pluck('id')->all()" />

            <div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
