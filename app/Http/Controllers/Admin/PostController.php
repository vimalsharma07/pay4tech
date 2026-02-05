<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Support\HtmlSanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->latest()->paginate(20);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title']);
        $data = $this->handleCoverUpload($request, $data);
        $data = $this->handlePublishedAt($data);
        $data['content'] = HtmlSanitizer::sanitize($data['content']);

        Post::create($data);

        Cache::forget('sitemap.xml');

        return redirect()->route('admin.posts.index')->with('toast', 'Blog post created.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validated($request, $post->id);

        if (!empty($data['slug']) && $data['slug'] !== $post->slug) {
            $data['slug'] = $this->uniqueSlug($data['slug'], $post->id);
        } elseif (empty($data['slug'])) {
            $data['slug'] = $post->slug;
        }

        $data = $this->handleCoverUpload($request, $data);
        $data = $this->handlePublishedAt($data, $post);
        $data['content'] = HtmlSanitizer::sanitize($data['content']);

        $post->fill($data)->save();

        Cache::forget('sitemap.xml');

        return redirect()->route('admin.posts.edit', $post)->with('toast', 'Blog post saved.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:190'],
            'slug' => ['nullable', 'string', 'max:190'],
            'excerpt' => ['nullable', 'string', 'max:300'],
            'content' => ['required', 'string', 'max:200000'],
            'meta_title' => ['nullable', 'string', 'max:190'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'is_published' => ['nullable'],
            'published_at' => ['nullable', 'date'],
            'cover' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
        ]);
    }

    private function uniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source);
        $base = $base !== '' ? $base : 'post';

        $slug = $base;
        $i = 2;

        while (
            Post::query()
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }

    private function handleCoverUpload(Request $request, array $data): array
    {
        if (!$request->hasFile('cover')) {
            return $data;
        }

        File::ensureDirectoryExists(public_path('uploads/blog'));

        $file = $request->file('cover');
        $ext = $file->getClientOriginalExtension() ?: 'jpg';
        $name = 'cover-' . date('YmdHis') . '-' . Str::random(6) . '.' . $ext;
        $file->move(public_path('uploads/blog'), $name);

        $data['cover_image_path'] = 'uploads/blog/' . $name;

        return $data;
    }

    private function handlePublishedAt(array $data, ?Post $existing = null): array
    {
        $data['is_published'] = (bool)($data['is_published'] ?? false);

        if ($data['is_published']) {
            if (!empty($data['published_at'])) {
                // keep provided date
                return $data;
            }

            // If publishing now and no date provided, set to now (or keep existing)
            $data['published_at'] = $existing?->published_at ?? now();
        } else {
            // Draft: keep published_at if you want to schedule later; but default clear.
            if (empty($data['published_at'])) {
                $data['published_at'] = null;
            }
        }

        return $data;
    }
}

