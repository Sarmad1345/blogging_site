@extends('layouts.app')

@section('title', 'Add Blog')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 fw-bold">Add New Blog</h1>
                <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back to Blogs
                </a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <x-input type="email" name="email" label="Email address" placeholder="name@example.com" />

                        <x-input name="title" label="Title" placeholder="Blog title" />

                        <x-textarea name="description" label="Description" placeholder="Blog description" />

                        <x-select name="category_id" label="Category" :options="$categories" placeholder="select category" />

                        <x-checkbox-group name="tags[]" label="Tags" :items="$tags" />

                        <x-input type="file" name="file" label="Upload File" />

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> Submit
                            </button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection