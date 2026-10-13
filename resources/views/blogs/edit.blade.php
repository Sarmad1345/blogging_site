@extends('layouts.app')

@section('title', 'Edit Blog')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 fw-bold">Edit Blog</h1>
                <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back to All Blogs
                </a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <x-input type="email" name="email" label="Email address" :value="$blog->email" placeholder="name@example.com" />

                        <x-input name="title" label="Title" :value="$blog->title" placeholder="Blog title" />

                        <x-textarea name="description" label="Description" :value="$blog->description" placeholder="Blog description" />

                        <x-select name="category_id" label="Category" :options="$categories" :selected="$blog->category_id" placeholder="-- Select category --" />

                        <x-checkbox-group name="tags[]" label="Tags" :items="$tags" :selected="$blog->tags->pluck('id')->all()" />

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-save me-1"></i> Update
                            </button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection