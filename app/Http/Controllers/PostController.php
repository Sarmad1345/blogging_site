<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class PostController extends Controller
{
    public function show()
    {
        $blogs =  Blog::with('category', 'image', 'tags')->latest()->get();
        return ["data" => $blogs];
    }
}
