@extends('layouts.admin')

@section('title', 'New Post')

@section('content')
    <div class="a-pagehead">
        <div>
            <h1>New Post</h1>
            <p>Create an SEO-friendly blog post.</p>
        </div>
        <div class="a-actions">
            <a class="a-btn a-btn--ghost" href="{{ route('admin.posts.index') }}">Back</a>
        </div>
    </div>

    <div class="a-card">
        <form class="a-form" method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="a-grid2">
                <div class="a-field">
                    <div class="a-label">Title</div>
                    <input class="a-input" name="title" value="{{ old('title') }}" required>
                    @error('title') <div class="a-error">{{ $message }}</div> @enderror
                </div>
                <div class="a-field">
                    <div class="a-label">Slug (optional)</div>
                    <input class="a-input" name="slug" value="{{ old('slug') }}" placeholder="auto-generate if empty">
                    @error('slug') <div class="a-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="a-field">
                <div class="a-label">Excerpt (optional)</div>
                <input class="a-input" name="excerpt" value="{{ old('excerpt') }}">
                @error('excerpt') <div class="a-error">{{ $message }}</div> @enderror
            </div>

            <div class="a-field">
                <div class="a-label">Content</div>
                <textarea class="a-textarea" id="editor" name="content" required>{{ old('content') }}</textarea>
                <div class="a-help">Use the editor to format text and insert images.</div>
                @error('content') <div class="a-error">{{ $message }}</div> @enderror
            </div>

            <div class="a-grid2">
                <div class="a-field">
                    <div class="a-label">Meta Title (SEO, optional)</div>
                    <input class="a-input" name="meta_title" value="{{ old('meta_title') }}">
                    @error('meta_title') <div class="a-error">{{ $message }}</div> @enderror
                </div>
                <div class="a-field">
                    <div class="a-label">Meta Description (SEO, optional)</div>
                    <input class="a-input" name="meta_description" value="{{ old('meta_description') }}">
                    @error('meta_description') <div class="a-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="a-grid2">
                <div class="a-field">
                    <div class="a-label">Cover Image (optional)</div>
                    <input class="a-input" type="file" name="cover" accept="image/*">
                    @error('cover') <div class="a-error">{{ $message }}</div> @enderror
                </div>
                <div class="a-field">
                    <div class="a-label">Publish</div>
                    <label style="display:flex; gap:8px; align-items:center; font-weight:700; color:var(--muted);">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                        Published
                    </label>
                    <input class="a-input" type="datetime-local" name="published_at" value="{{ old('published_at') }}">
                    <div class="a-help">If Published is checked and date is empty, it publishes now.</div>
                    @error('published_at') <div class="a-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <button class="a-btn a-btn--primary" type="submit">Create post</button>
        </form>
    </div>
@endsection

@push('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
@endpush

@push('scripts')
    <script>
        (function () {
            const el = document.getElementById('editor');
            if (!el || !window.ClassicEditor) return;

            const uploadUrl = "{{ route('admin.upload.image') }}";
            const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            function UploadAdapter(loader) {
                this.loader = loader;
                this.xhr = null;
            }

            UploadAdapter.prototype.upload = function () {
                return this.loader.file.then((file) => new Promise((resolve, reject) => {
                    const xhr = this.xhr = new XMLHttpRequest();
                    xhr.open('POST', uploadUrl, true);
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrf);
                    xhr.responseType = 'json';

                    xhr.addEventListener('error', () => reject('Upload failed.'));
                    xhr.addEventListener('abort', () => reject('Upload aborted.'));
                    xhr.addEventListener('load', () => {
                        const resp = xhr.response;
                        if (!resp || xhr.status < 200 || xhr.status >= 300) {
                            const msg = (resp && resp.error && resp.error.message) ? resp.error.message : 'Upload failed.';
                            return reject(msg);
                        }
                        if (!resp.url) return reject('Upload failed: missing URL.');
                        resolve({ default: resp.url });
                    });

                    const data = new FormData();
                    data.append('upload', file);
                    xhr.send(data);
                }));
            };

            UploadAdapter.prototype.abort = function () {
                if (this.xhr) this.xhr.abort();
            };

            function UploadAdapterPlugin(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => new UploadAdapter(loader);
            }

            ClassicEditor.create(el, {
                extraPlugins: [ UploadAdapterPlugin ],
            }).catch(() => {});
        })();
    </script>
@endpush

