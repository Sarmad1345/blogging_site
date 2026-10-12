<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Blog</title>
</head>

<body>
    <div class="container mt-4 mb-5">
        <h1>Add Blog</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-input type="email" name="email" label="Email address" placeholder="name@example.com" />

            <x-input name="title" label="Title" placeholder="Blog title" />

            <x-textarea name="description" label="Description" placeholder="Blog description" />
            <x-select name="category_id" label="Category" :options="$categories" placeholder="select category" />

            <x-checkbox-group name="tags[]" label="Tags" :items="$tags" />

            <x-input type="file" name="file" label="Upload File" />

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
