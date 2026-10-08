<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Image;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(BlogRequest $request)
    {
        $path = $request->file('file')->store('images', 'public');


        $imageData = Image::create([
            "path" => $path,
        ]);

        Blog::create([
            "email" => $request->email,
            'title' => $request->title,
            'description' => $request->description,
            'image_id' => $imageData->id,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }


    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }
    public function update(BlogRequest $blogRequest, Blog $blog)
    {
        $blog->update([
            "email" => $blogRequest->email,
            "title" => $blogRequest->title,
            "description" => $blogRequest->description,
        ]);
        return redirect()->route("blogs.index")->with('success', 'Blog created successfully.');
    }
    public function destroy(int $id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
    public function search()
    {
        $searchTerm = request('search');
        $blogs = Blog::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->latest()
            ->paginate(5);

        return view('blogs.index', compact('blogs'));
    }



    public function trash()
    {
        $blogs = Blog::onlyTrashed()->latest('deleted_at')->get();

        return view('blogs.trash', compact('blogs'));
    }

    public function restore(Blog $blog)
    {
        $blog->restore();

        return back()->with('success', 'Blog restored.');
    }

    public function forceDelete(Blog $blog)
    {
        $blog->forceDelete();

        return back()->with('success', 'Blog permanently deleted.');
    }
}
