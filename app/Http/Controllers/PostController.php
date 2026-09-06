<?php

namespace App\Http\Controllers;
use Illuminate\Http\Requests; 
use \App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $post = Post::all();
        return view('posts.index', compact('post'));
    }
}
