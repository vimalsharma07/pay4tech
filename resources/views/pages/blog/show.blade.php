@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' — Pay4Tech Blog')
@section('meta_description', $post->meta_description ?: ($post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 160)))
@section('og_type', 'article')

@push('head')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $post->title,
            'description' => $post->meta_description ?: ($post->excerpt ?: null),
            'datePublished' => optional($post->published_at)->toAtomString(),
            'dateModified' => optional($post->updated_at)->toAtomString(),
            'author' => [
                '@type' => 'Organization',
                'name' => ($site?->name ?: 'Pay4Tech'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => ($site?->name ?: 'Pay4Tech'),
                'logo' => !empty($site?->logo_path)
                    ? ['@type' => 'ImageObject', 'url' => asset($site->logo_path)]
                    : null,
            ],
            'image' => $post->cover_image_path ? [asset($post->cover_image_path)] : null,
            'mainEntityOfPage' => url()->current(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="page-hero__inner reveal">
                <div class="blog-crumbs muted">
                    <a href="{{ route('blog.index') }}">Blog</a>
                    <span>•</span>
                    <span>{{ optional($post->published_at)->format('M d, Y') }}</span>
                </div>
                <h1 class="page-hero__title">{{ $post->title }}</h1>
                <p class="page-hero__subtitle">{{ $post->excerpt ?: $post->meta_description }}</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <article class="article reveal">
                @if($post->cover_image_path)
                    <div class="article__cover" aria-hidden="true">
                        <img src="{{ asset($post->cover_image_path) }}" alt="">
                    </div>
                @endif

                <div class="article__content">
                    {!! $post->content !!}
                </div>

                <div class="article__footer">
                    <a class="btn btn--ghost" href="{{ route('blog.index') }}">Back to Blog</a>
                    <a class="btn btn--primary" href="{{ route('contact') }}">Work with Pay4Tech</a>
                </div>
            </article>
        </div>
    </section>
@endsection

