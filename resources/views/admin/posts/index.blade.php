@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
    <div class="a-pagehead">
        <div>
            <h1>Blog</h1>
            <p>Create posts for SEO and knowledge sharing.</p>
        </div>
        <div class="a-actions">
            <a class="a-btn a-btn--primary" href="{{ route('admin.posts.create') }}">New post</a>
            <a class="a-btn a-btn--ghost" href="{{ route('blog.index') }}" target="_blank" rel="noopener">View Blog</a>
        </div>
    </div>

    <div class="a-card">
        <div class="a-tablewrap">
            <table class="a-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>
                                <strong>{{ $post->title }}</strong>
                                <div class="a-muted" style="margin-top: 4px;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?: $post->meta_description ?: $post->content), 90) }}
                                </div>
                            </td>
                            <td>
                                @if($post->is_published)
                                    <span class="a-badge a-badge--green">Published</span>
                                @else
                                    <span class="a-badge">Draft</span>
                                @endif
                            </td>
                            <td class="a-muted">{{ $post->published_at?->format('Y-m-d') ?: '—' }}</td>
                            <td class="a-muted">{{ $post->slug }}</td>
                            <td style="white-space: nowrap;">
                                <a class="a-btn a-btn--ghost" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                @if($post->is_published)
                                    <a class="a-btn a-btn--ghost" href="{{ route('blog.show', $post) }}" target="_blank" rel="noopener">Open</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="a-muted">No posts yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 12px; display:flex; justify-content: space-between; gap:10px; flex-wrap:wrap;">
            @if($posts->previousPageUrl())
                <a class="a-btn a-btn--ghost" href="{{ $posts->previousPageUrl() }}">Previous</a>
            @else
                <span class="a-btn a-btn--ghost" style="opacity:.55; pointer-events:none;">Previous</span>
            @endif

            <span class="a-muted">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</span>

            @if($posts->nextPageUrl())
                <a class="a-btn a-btn--ghost" href="{{ $posts->nextPageUrl() }}">Next</a>
            @else
                <span class="a-btn a-btn--ghost" style="opacity:.55; pointer-events:none;">Next</span>
            @endif
        </div>
    </div>
@endsection

