<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nav Bar</title>
    <style>
        .nav-link {
            text-decoration: none;
            color: #000000;
            text-transform: uppercase;
            padding: 10px;
        }

        .nav-link:hover {
            color: #0060c7;
        }
    </style>
</head>

<body>
    <div class="container"
        style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #f8f9fa;">
        <ul class="nav accordion flex"
            style="list-style-type: none; display:flex; gap: 10px; margin: 0px; padding: 0px; text-decoration: none">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs.index') }} ">All Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs.create') }}">Add Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs.trash') }}">Trash</a>
            </li>


        </ul>
        <div style="display: flex; gap: 10px; align-items: center;">

            <input type="text" name="search" id="" placeholder="Search blogs... "
                value="{{ request('search') }}">
            <button
                style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px;"
                type="submit">Search</button>
        </div>
    </div>

</body>

</html>
