<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') — {{ $site?->name ?: 'Pay4Tech' }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin.css') }}">
    @stack('head')
</head>
<body>
    <header class="a-topbar">
        <div class="a-topbar__left">
            <button class="a-btn a-btn--ghost a-hide-desktop" type="button" data-admin-toggle aria-label="Toggle sidebar">☰</button>
            <a class="a-brand" href="{{ route('admin.dashboard') }}">Admin</a>
        </div>
        <div class="a-topbar__right">
            <a class="a-link" href="{{ route('home') }}" target="_blank" rel="noopener">Open Website</a>
            <span class="a-muted">{{ auth()->user()?->email }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="a-btn a-btn--primary" type="submit">Logout</button>
            </form>
        </div>
    </header>

    <div class="a-shell">
        <aside class="a-sidebar" data-admin-sidebar>
            <div class="a-sidebar__title">{{ $site?->name ?: 'Pay4Tech' }}</div>
            <nav class="a-nav">
                <a class="a-nav__link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="a-nav__link {{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}" href="{{ route('admin.settings.edit') }}">Site Settings</a>
                <a class="a-nav__link {{ request()->routeIs('admin.enquiries.*') ? 'is-active' : '' }}" href="{{ route('admin.enquiries.index') }}">Enquiries</a>
                <a class="a-nav__link {{ request()->routeIs('admin.posts.*') ? 'is-active' : '' }}" href="{{ route('admin.posts.index') }}">Blog</a>
            </nav>
        </aside>

        <main class="a-main">
            @if(session('toast'))
                <div class="a-alert a-alert--success">{{ session('toast') }}</div>
            @endif
            @if($errors->any())
                <div class="a-alert a-alert--danger">
                    Please fix the highlighted fields.
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="{{ asset('admin.js') }}" defer></script>
    @stack('scripts')
</body>
</html>

