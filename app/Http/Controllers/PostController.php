<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show()
    {
        $blogs =  Blog::with('category', 'image')->latest()->get();
        return ["data" => $blogs];
    }
}
