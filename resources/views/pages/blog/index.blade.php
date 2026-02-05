@extends('layouts.app')

@section('title', 'Blog — Pay4Tech | Insights & Guides')
@section('meta_description', 'Pay4Tech blog: web development, Laravel, performance, SEO, cybersecurity, and business automation. Practical guides and insights.')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="page-hero__inner reveal">
                <h1 class="page-hero__title">Blog</h1>
                <p class="page-hero__subtitle">Practical guides, insights, and updates — written to help you ship better software.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="blog-grid">
                @forelse($posts as $post)
                    <article class="blog-card reveal">
                        <a class="blog-card__link" href="{{ route('blog.show', $post) }}">
                            <div class="blog-card__media" aria-hidden="true">
                                @if($post->cover_image_path)
                                    <img src="{{ asset($post->cover_image_path) }}" alt="">
                                @else
                                    <div class="blog-card__placeholder">
                                        <span class="grad">Pay4Tech</span>
                                    </div>
                                @endif
                            </div>
                            <div class="blog-card__body">
                                <div class="blog-card__meta muted">
                                    <span>{{ optional($post->published_at)->format('M d, Y') }}</span>
                                    <span>•</span>
                                    <span>Article</span>
                                </div>
                                <h2 class="blog-card__title">{{ $post->title }}</h2>
                                <p class="blog-card__excerpt">
                                    {{ $post->excerpt ?: \Illuminate\Support\Str::limit($post->meta_description ?: strip_tags($post->content), 140) }}
                                </p>
                                <div class="blog-card__cta">
                                    <span class="muted">Read more</span>
                                </div>
                            </div>
                        </a>
                    </article>
                @empty
                    <div class="panel reveal">
                        <h2 class="panel__title">No posts yet</h2>
                        <p class="panel__text">Create your first blog post from the Admin panel.</p>
                        @auth
                            @if(auth()->user()?->is_admin)
                                <div style="margin-top: 12px;">
                                    <a class="btn btn--primary" href="{{ route('admin.posts.index') }}">Go to Admin → Blog</a>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endforelse
            </div>

            @if($posts->hasPages())
                <div class="pager" style="margin-top: 16px;">
                    <div class="pager__inner">
                        @if($posts->previousPageUrl())
                            <a class="btn btn--ghost" href="{{ $posts->previousPageUrl() }}">Previous</a>
                        @else
                            <span class="btn btn--ghost" style="opacity:.55; pointer-events:none;">Previous</span>
                        @endif

                        <span class="muted">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</span>

                        @if($posts->nextPageUrl())
                            <a class="btn btn--ghost" href="{{ $posts->nextPageUrl() }}">Next</a>
                        @else
                            <span class="btn btn--ghost" style="opacity:.55; pointer-events:none;">Next</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

