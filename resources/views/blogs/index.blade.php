@extends('layouts.app')

@section('title', 'All Blogs')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1 fw-bold">All Blogs</h1>
            <p class="text-muted mb-0">Browse latest blogs, articles, and insights</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('blogs.trash') }}" class="btn btn-outline-secondary">
                <i class="bi bi-trash"></i> Trash
            </a>
            <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add New Blog
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3">
            <form action="{{ route('blogs.search') }}" method="GET">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" name="search" id="searchInput" class="form-control border-start-0"
                        placeholder="Search blogs by title, description..." value="{{ request('search') }}">
                    <button type="submit" id="searchButton" class="btn btn-dark">
                        Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    @if ($blogs->isEmpty())
        <div class="card border-0 shadow-sm text-center py-5">
            <div class="card-body">
                <i class="bi bi-journal-x fs-1 text-muted d-block mb-3"></i>
                <h4 class="text-secondary">No blogs found</h4>
                <p class="text-muted">Start by creating your very first blog post.</p>
                <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Create Blog
                </a>
            </div>
        </div>
    @else
        <div class="row g-4">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">
                        @if ($blog->image?->path)
                            <img src="{{ asset('storage/' . $blog->image->path) }}" alt="{{ $blog->title }}"
                                class="card-img-top object-fit-cover" style="height: 200px;">
                        @else
                            <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                                <i class="bi bi-card-image fs-1"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge text-bg-light border text-secondary">
                                    <i class="bi bi-folder me-1"></i>{{ $blog->category?->name ?? 'Uncategorized' }}
                                </span>
                            </div>

                            <h2 class="card-title fs-5 fw-bold mb-2">
                                <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none text-dark">
                                    {{ $blog->getRawOriginal('title') }}
                                </a>
                            </h2>

                            <p class="card-text text-muted mb-3 flex-grow-1"
                                style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $blog->getRawOriginal('description') }}
                            </p>

                            @if ($blog->tags->isNotEmpty())
                                <div class="mb-3">
                                    @foreach ($blog->tags as $tag)
                                        <span class="badge text-bg-secondary text-decoration-none me-1">
                                            #{{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center pt-2 border-top small text-muted">
                                <span>
                                    <i class="bi bi-clock me-1"></i>{{ $blog->created_at->format('M d, Y') ?? $blog->created_at }}
                                </span>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-outline-primary">
                                    Read <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $blogs->withQueryString()->links() }}
        </div>
    @endif
@endsection