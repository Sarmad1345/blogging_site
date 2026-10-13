<nav class="mb-4 navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('blogs.index') }}">
            <i class="me-1 bi bi-journal-text"></i> My Blog
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="mb-2 mb-lg-0 navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blogs.index') ? 'active' : '' }}"
                        href="{{ route('blogs.index') }}">
                        All Blogs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blogs.create') ? 'active' : '' }}"
                        href="{{ route('blogs.create') }}">
                        + Add Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blogs.trash') ? 'active' : '' }}"
                        href="{{ route('blogs.trash') }}">
                        Trash
                    </a>
                </li>
            </ul>

            <form action="{{ route('blogs.search') }}" method="GET" class="d-flex me-lg-3 my-2 my-lg-0"
                role="search">
                <div class="input-group">
                    <input class="form-control form-control-sm" type="search" name="search"
                        placeholder="Search blogs..." value="{{ request('search') }}" aria-label="Search">
                    <button class="btn btn-outline-light btn-sm" type="submit">Search</button>
                </div>
            </form>

            <ul class="mb-2 mb-lg-0 navbar-nav align-items-lg-center">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="me-1 bi bi-person-circle"></i> {{ auth()->user()->name ?? 'Account' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li><span class="dropdown-item-text text-muted small">{{ auth()->user()->email ?? '' }}</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="me-1 bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                            href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
