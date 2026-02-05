@extends('layouts.app')

@section('title', 'Contact — Pay4Tech | Get a Quote')
@section('meta_description', 'Contact Pay4Tech for website development, web apps, cloud & DevOps, cybersecurity, and automation. Get a fast quote and timeline.')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="page-hero__inner reveal">
                <h1 class="page-hero__title">Contact</h1>
                <p class="page-hero__subtitle">Tell us about your project. We’ll reply with timeline, budget range, and next steps.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="cta reveal">
                <div class="cta__copy">
                    <h2 class="cta__title">Let’s build something great</h2>
                    <p class="cta__text">Share your goals. We’ll recommend the fastest path to a polished result.</p>
                    <div class="cta__chips" aria-hidden="true">
                        <span class="chip">Website</span>
                        <span class="chip">App</span>
                        <span class="chip">Cloud</span>
                        <span class="chip">Security</span>
                    </div>

                    <div class="contact-cards">
                        <div class="contact-card">
                            <div class="contact-card__title">Email</div>
                            @php($siteEmail = $site?->email ?: 'hello@example.com')
                            <a class="contact-card__value" href="mailto:{{ $siteEmail }}">{{ $siteEmail }}</a>
                        </div>
                        <div class="contact-card">
                            <div class="contact-card__title">Phone</div>
                            @php($sitePhone = $site?->phone ?: '+1 (000) 000-0000')
                            <a class="contact-card__value" href="tel:{{ preg_replace('/\\s+/', '', $sitePhone) }}">{{ $sitePhone }}</a>
                        </div>
                        <div class="contact-card">
                            <div class="contact-card__title">Hours</div>
                            <div class="contact-card__value muted">Mon–Sat 10:00–19:00</div>
                        </div>
                    </div>
                </div>

                <form class="form" method="POST" action="{{ route('enquiry.store') }}">
                    @csrf

                    <div class="sr-only" aria-hidden="true">
                        <label>
                            Website
                            <input name="website" tabindex="-1" autocomplete="off">
                        </label>
                    </div>

                    <label class="field">
                        <span class="field__label">Name</span>
                        <input class="field__input" name="name" value="{{ old('name') }}" autocomplete="name" required placeholder="Your name">
                        @error('name')
                            <span class="field__error">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="field">
                        <span class="field__label">Email</span>
                        <input class="field__input" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required placeholder="you@company.com">
                        @error('email')
                            <span class="field__error">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="field">
                        <span class="field__label">Message</span>
                        <textarea class="field__input field__input--area" name="message" rows="4" required placeholder="What do you want to build?">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="field__error">{{ $message }}</span>
                        @enderror
                    </label>
                    <button class="btn btn--primary btn--full" type="submit">Send message</button>
                    <p class="form__hint">By sending, you agree to be contacted about this request.</p>
                </form>
            </div>
        </div>
    </section>
@endsection

