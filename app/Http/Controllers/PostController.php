<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();

        return view('posts.index', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('status', 'post-updated');
    }

    public function destroy(Post $post)
    {
        if (Gate::denies('delete', $post)) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus postingan ini.');
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('status', 'post-deleted');
    }
}
