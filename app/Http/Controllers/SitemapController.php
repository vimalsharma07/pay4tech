<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = Cache::remember('sitemap.xml', now()->addHours(6), function () {
            $urls = [
                route('home'),
                route('services'),
                route('work'),
                route('about'),
                route('contact'),
                route('blog.index'),
            ];

            $items = array_map(function (string $loc) {
                return [
                    'loc' => $loc,
                    'lastmod' => now()->toDateString(),
                ];
            }, $urls);

            $postItems = Post::query()
                ->published()
                ->latest('published_at')
                ->get(['slug', 'updated_at', 'published_at'])
                ->map(function (Post $post) {
                    return [
                        'loc' => route('blog.show', $post),
                        'lastmod' => ($post->updated_at ?? $post->published_at ?? now())->toDateString(),
                    ];
                })
                ->all();

            $items = array_merge($items, $postItems);

            return view('sitemap.xml', ['items' => $items])->render();
        });

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}

