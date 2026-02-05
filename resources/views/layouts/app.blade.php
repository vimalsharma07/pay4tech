<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php($siteName = $site?->name ?: 'Pay4Tech')
    @php($siteTagline = $site?->tagline ?: 'Modern IT services: web development, cloud, cybersecurity, and automation.')
    @php($pageTitle = trim((string)($__env->yieldContent('title'))))
    @php($pageTitle = $pageTitle !== '' ? $pageTitle : $siteName)
    @php($pageDesc = trim((string)($__env->yieldContent('meta_description'))))
    @php($pageDesc = $pageDesc !== '' ? $pageDesc : $siteTagline)
    @php($canonical = url()->current())

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDesc }}">
    <meta name="robots" content="@yield('meta_robots', 'index,follow')">
    <link rel="canonical" href="{{ $canonical }}">

    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDesc }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ $canonical }}">
    @if(!empty($site?->logo_path))
        <meta property="og:image" content="{{ asset($site->logo_path) }}">
    @endif

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDesc }}">
    @if(!empty($site?->logo_path))
        <meta name="twitter:image" content="{{ asset($site->logo_path) }}">
    @endif

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('/sitemap.xml') }}">

    {{-- Organization schema (JSON-LD) --}}
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $siteName,
            'url' => url('/'),
            'logo' => !empty($site?->logo_path) ? asset($site->logo_path) : null,
            'email' => $site?->email ?: null,
            'telephone' => $site?->phone ?: null,
            'sameAs' => array_values(array_filter([
                $site?->instagram_url ?: null,
                $site?->linkedin_url ?: null,
                $site?->facebook_url ?: null,
                $site?->twitter_url ?: null,
                $site?->youtube_url ?: null,
                $site?->whatsapp_url ?: null,
            ])),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @stack('head')
</head>
<body id="top">
    <a class="skip-link" href="#main">Skip to content</a>

    <header class="header" data-header>
        <div class="container header__inner">
            <a class="brand" href="{{ route('home') }}" aria-label="{{ $siteName }} home">
                <span class="brand__mark" aria-hidden="true">
                    @if(!empty($site?->logo_path))
                        <img class="brand__logo" src="{{ asset($site->logo_path) }}" alt="">
                    @else
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L20 7V17L12 22L4 17V7L12 2Z" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M12 6.2L16.5 8.8V13.9L12 16.5L7.5 13.9V8.8L12 6.2Z" stroke="currentColor" stroke-width="1.6" opacity="0.9"/>
                        </svg>
                    @endif
                </span>
                <span class="brand__text">{{ $siteName }}</span>
            </a>

            <nav class="nav" aria-label="Primary">
                <button class="icon-btn nav__toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="navMenu">
                    <span class="sr-only">Open menu</span>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M4 12H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M4 17H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>

                <div class="nav__menu" id="navMenu" data-nav-menu>
                    <a class="nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}">Home</a>
                    <a class="nav__link {{ request()->routeIs('services') ? 'is-active' : '' }}" href="{{ route('services') }}">Services</a>
                    <a class="nav__link {{ request()->routeIs('work') ? 'is-active' : '' }}" href="{{ route('work') }}">Work</a>
                    <a class="nav__link {{ request()->routeIs('about') ? 'is-active' : '' }}" href="{{ route('about') }}">About</a>
                    <a class="nav__link {{ request()->routeIs('blog.*') ? 'is-active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                    <a class="nav__link {{ request()->routeIs('contact') ? 'is-active' : '' }}" href="{{ route('contact') }}">Contact</a>

                    <button class="icon-btn nav__theme" type="button" data-theme-toggle aria-label="Toggle theme">
                        <span class="sr-only">Toggle theme</span>
                        <svg class="icon-sun" width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 18a6 6 0 1 0 0-12a6 6 0 0 0 0 12Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 2v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 20v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4.93 4.93l1.41 1.41" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M17.66 17.66l1.41 1.41" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M2 12h2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M20 12h2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4.93 19.07l1.41-1.41" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M17.66 6.34l1.41-1.41" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <svg class="icon-moon" width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M21 13.4A7.2 7.2 0 0 1 10.6 3a8.9 8.9 0 1 0 10.4 10.4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    @auth
                        @if(auth()->user()?->is_admin)
                            <a class="nav__link {{ request()->routeIs('admin.*') ? 'is-active' : '' }}" href="{{ route('admin.dashboard') }}">Admin</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn--ghost nav__cta" type="submit">Logout</button>
                        </form>
                    @else
                        <a class="btn btn--ghost nav__cta" href="{{ route('login') }}">Login</a>
                        <a class="btn btn--primary" href="{{ route('contact') }}">Get a quote</a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer__inner">
            <div class="footer__brand">
                <div class="brand brand--small">
                    <span class="brand__mark" aria-hidden="true">
                        @if(!empty($site?->logo_path))
                            <img class="brand__logo" src="{{ asset($site->logo_path) }}" alt="">
                        @else
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L20 7V17L12 22L4 17V7L12 2Z" stroke="currentColor" stroke-width="1.6"/>
                                <path d="M12 6.2L16.5 8.8V13.9L12 16.5L7.5 13.9V8.8L12 6.2Z" stroke="currentColor" stroke-width="1.6" opacity="0.9"/>
                            </svg>
                        @endif
                    </span>
                    <span class="brand__text">{{ $siteName }}</span>
                </div>
                <p class="footer__text">{{ $site?->tagline ?: 'Modern IT solutions with premium UI and optimized performance.' }}</p>
            </div>

            <div class="footer__links">
                <div class="footer__col">
                    <div class="footer__title">Pages</div>
                    <a href="{{ route('services') }}">Services</a>
                    <a href="{{ route('work') }}">Work</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </div>
                <div class="footer__col">
                    <div class="footer__title">Social</div>
                    @if(!empty($site?->instagram_url)) <a href="{{ $site->instagram_url }}" target="_blank" rel="noopener">Instagram</a> @endif
                    @if(!empty($site?->linkedin_url)) <a href="{{ $site->linkedin_url }}" target="_blank" rel="noopener">LinkedIn</a> @endif
                    @if(!empty($site?->facebook_url)) <a href="{{ $site->facebook_url }}" target="_blank" rel="noopener">Facebook</a> @endif
                    @if(!empty($site?->twitter_url)) <a href="{{ $site->twitter_url }}" target="_blank" rel="noopener">Twitter/X</a> @endif
                    @if(!empty($site?->youtube_url)) <a href="{{ $site->youtube_url }}" target="_blank" rel="noopener">YouTube</a> @endif
                    @if(!empty($site?->whatsapp_url)) <a href="{{ $site->whatsapp_url }}" target="_blank" rel="noopener">WhatsApp</a> @endif
                    @if(
                        empty($site?->instagram_url) &&
                        empty($site?->linkedin_url) &&
                        empty($site?->facebook_url) &&
                        empty($site?->twitter_url) &&
                        empty($site?->youtube_url) &&
                        empty($site?->whatsapp_url)
                    )
                        <span class="muted">Add links in Admin → Settings</span>
                    @endif
                </div>
                <div class="footer__col">
                    <div class="footer__title">Contact</div>
                    @php($siteEmail = $site?->email ?: 'hello@example.com')
                    @php($sitePhone = $site?->phone ?: '+1 (000) 000-0000')
                    <a href="mailto:{{ $siteEmail }}">{{ $siteEmail }}</a>
                    <a href="tel:{{ preg_replace('/\\s+/', '', $sitePhone) }}">{{ $sitePhone }}</a>
                    <span class="muted">Mon–Sat 10:00–19:00</span>
                </div>
            </div>
        </div>
        <div class="container footer__bottom">
            <span class="muted">© {{ date('Y') }} {{ $siteName }}. All rights reserved.</span>
            <a class="muted-link" href="#top" data-scroll-top>Back to top</a>
        </div>
    </footer>

    @php($toast = session('toast'))
    <div class="toast" role="status" aria-live="polite" aria-atomic="true" @if(empty($toast)) hidden @endif data-toast data-toast-autoshow="{{ empty($toast) ? '0' : '1' }}">
        <div class="toast__inner">
            <strong class="toast__title">Success</strong>
            <span class="toast__text">{{ $toast ?: 'Done.' }}</span>
        </div>
        <button class="icon-btn toast__close" type="button" data-toast-close aria-label="Close">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    <script src="{{ asset('app.js') }}" defer></script>
</body>
</html>
