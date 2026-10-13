@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="mb-4">
                <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back to All Blogs
                </a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="p-4 p-md-5 card-body">
                    @if ($blog->image?->path)
                        <img src="{{ asset('storage/' . $blog->image->path) }}" alt="{{ $blog->title }}"
                            style="max-height: 380px; width: 100%; object-fit: cover;" class="d-block mb-4 mx-auto rounded shadow-sm">
                    @endif

                    <h1 class="mb-3 fw-bold display-6">{{ $blog->title }}</h1>

                    <div class="mb-3 text-muted small d-flex flex-wrap gap-3 align-items-center">
                        <span><i class="bi bi-calendar3 me-1"></i> Published on: {{ $blog->created_at }}</span>
                        <span>|</span>
                        <span><i class="bi bi-folder2 me-1"></i> Category: {{ $blog->category?->name ?? 'Uncategorized' }}</span>
                    </div>

                    @if ($blog->tags->isNotEmpty())
                        <div class="mb-4">
                            <span class="small text-muted me-1">Tags:</span>
                            @foreach ($blog->tags as $tag)
                                <span class="badge text-bg-secondary text-decoration-none me-1">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endif

                    <hr class="my-4">

                    <div class="mb-5 lead fs-6 text-secondary" style="white-space: pre-line; line-height: 1.8;">
                        {{ $blog->description }}
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>

                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                            onsubmit="return confirm('Move this blog to trash?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-trash me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection