@extends('layouts.app')

@section('title', 'Trash')

@section('content')
    <div class="d-flex flex-column flex-sm-row gap-3 mb-4 justify-content-between align-items-sm-center">
        <div>
            <h1 class="h3 mb-1 fw-bold"><i class="bi bi-trash3 me-2 text-danger"></i> Trash</h1>
            <p class="text-muted mb-0">View or restore deleted blogs</p>
        </div>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back to Blogs
        </a>
    </div>

    @forelse ($blogs as $blog)
        <div class="mb-3 card shadow-sm border-0">
            <div class="d-flex flex-column flex-md-row gap-3 card-body justify-content-between align-items-md-center">
                <div>
                    <h2 class="card-title h5 mb-1 fw-bold">{{ $blog->title }}</h2>
                    @if ($blog->description)
                        <p class="card-text text-muted mb-2 text-truncate" style="max-width: 600px;">
                            {{ $blog->description }}
                        </p>
                    @endif
                    <small class="text-muted">
                        <i class="bi bi-clock-history me-1"></i> Deleted {{ $blog->deleted_at->diffForHumans() }}
                    </small>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <form action="{{ route('blogs.restore', $blog) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Restore
                        </button>
                    </form>

                    <form action="{{ route('blogs.force-delete', $blog->id) }}" method="POST"
                        onsubmit="return confirm('Permanently delete this blog? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-x-circle me-1"></i> Delete Forever
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="card border-0 shadow-sm text-center py-5">
            <div class="card-body">
                <i class="bi bi-trash fs-1 text-muted d-block mb-2"></i>
                <h5 class="text-secondary">Trash is empty</h5>
                <p class="text-muted mb-3">No deleted blogs found.</p>
                <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary btn-sm">
                    Back to Blogs
                </a>
            </div>
        </div>
    @endforelse
@endsection