@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
    <div class="a-pagehead">
        <div>
            <h1>Site Settings</h1>
            <p>Update logo, name, contact info and social links.</p>
        </div>
    </div>

    <div class="a-card">
        <form class="a-form" method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="a-grid2">
                <div class="a-field">
                    <div class="a-label">Website name</div>
                    <input class="a-input" name="name" value="{{ old('name', $settings->name) }}">
                </div>
                <div class="a-field">
                    <div class="a-label">Tagline</div>
                    <input class="a-input" name="tagline" value="{{ old('tagline', $settings->tagline) }}">
                </div>
            </div>

            <div class="a-grid2">
                <div class="a-field">
                    <div class="a-label">Logo</div>
                    <input class="a-input" type="file" name="logo" accept="image/*">
                    @error('logo') <div class="a-error">{{ $message }}</div> @enderror
                    @if($settings->logo_path)
                        <div style="margin-top:8px;">
                            <img src="{{ asset($settings->logo_path) }}" alt="Logo" style="width:120px;height:120px;object-fit:cover;border-radius:12px;border:1px solid var(--line);background:#fff;">
                        </div>
                    @endif
                </div>
                <div class="a-field">
                    <div class="a-label">Email</div>
                    <input class="a-input" name="email" value="{{ old('email', $settings->email) }}">
                    @error('email') <div class="a-error">{{ $message }}</div> @enderror
                    <div style="height:10px;"></div>
                    <div class="a-label">Phone</div>
                    <input class="a-input" name="phone" value="{{ old('phone', $settings->phone) }}">
                    @error('phone') <div class="a-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="a-field">
                <div class="a-label">Address</div>
                <input class="a-input" name="address" value="{{ old('address', $settings->address) }}">
                @error('address') <div class="a-error">{{ $message }}</div> @enderror
            </div>

            <div class="a-muted" style="font-weight:800; margin-top: 6px;">Social links</div>
            <div class="a-grid2">
                <div class="a-field">
                    <div class="a-label">Instagram</div>
                    <input class="a-input" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url) }}">
                </div>
                <div class="a-field">
                    <div class="a-label">LinkedIn</div>
                    <input class="a-input" name="linkedin_url" value="{{ old('linkedin_url', $settings->linkedin_url) }}">
                </div>
                <div class="a-field">
                    <div class="a-label">Facebook</div>
                    <input class="a-input" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url) }}">
                </div>
                <div class="a-field">
                    <div class="a-label">Twitter / X</div>
                    <input class="a-input" name="twitter_url" value="{{ old('twitter_url', $settings->twitter_url) }}">
                </div>
                <div class="a-field">
                    <div class="a-label">YouTube</div>
                    <input class="a-input" name="youtube_url" value="{{ old('youtube_url', $settings->youtube_url) }}">
                </div>
                <div class="a-field">
                    <div class="a-label">WhatsApp</div>
                    <input class="a-input" name="whatsapp_url" value="{{ old('whatsapp_url', $settings->whatsapp_url) }}">
                </div>
            </div>

            <button class="a-btn a-btn--primary" type="submit">Save</button>
        </form>
    </div>
@endsection

