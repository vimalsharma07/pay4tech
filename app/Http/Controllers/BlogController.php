<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->published()
            ->latest('published_at')
            ->paginate(9);

        return view('pages.blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        abort_unless($post->is_published && $post->published_at && $post->published_at->isPast(), 404);

        return view('pages.blog.show', [
            'post' => $post,
        ]);
    }
}

