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
    <div class="container">
        <div class="">
            <div class="col p-4 ">
                <a href="{{ route('blogs.index') }} " style=" font-size: 20px ">← Back to All
                    Blogs</a>
                <br>
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-4 form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" value="{{ $blog->email }}">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="title">title</label>
                        <input type="text" name="title" id="" value="{{ $blog->title }}">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description">description</label>
                        <input type="text" name="description" id="" value="{{ $blog->description }}">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="category_id">category</label>
                        <select name="category_id" id="category_id">
                            <option value="">-- Select category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $blog->category_id) == $category->id)>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
