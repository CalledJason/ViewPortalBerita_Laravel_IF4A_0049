<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $featured = Post::first();

        $posts = Post::where('id', '!=', $featured->id)->get();

        return view('index', compact('featured', 'posts'));
    }
}
