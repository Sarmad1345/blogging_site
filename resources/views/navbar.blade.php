{{-- resources/views/navbar.blade.php --}}
<nav class="mb-4 navbar navbar-expand-lg bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('blogs.index') }}">My Blog</a>

        <ul class="mb-2 mb-lg-0 navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs.index') }}">All Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs.create') }}">Add Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs.trash') }}">Trash</a>
            </li>
        </ul>

        <form action="{{ route('blogs.search') }}" method="GET" class="d-flex" role="search">
            <input class="me-2 form-control" type="search" name="search" placeholder="Search blogs..."
                value="{{ request('search') }}">
            <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
    </div>
</nav>
