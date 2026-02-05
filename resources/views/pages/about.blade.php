@extends('layouts.app')

@section('title', 'About — Pay4Tech | Modern IT Company')
@section('meta_description', 'About Pay4Tech: our mission, values, and delivery process for building fast, secure, maintainable IT solutions with premium UI.')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="page-hero__inner reveal">
                <h1 class="page-hero__title">About us</h1>
                <p class="page-hero__subtitle">We build fast, secure, and maintainable systems with a premium user experience.</p>
                <div class="page-hero__actions">
                    <a class="btn btn--primary" href="{{ route('contact') }}">Work with us</a>
                    <a class="btn btn--ghost" href="{{ route('services') }}">Our services</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="two-col">
                <div class="panel reveal">
                    <h2 class="panel__title">Our mission</h2>
                    <p class="panel__text">Deliver modern IT solutions that look great, load fast, and stay secure — without complexity.</p>
                    <div class="panel__points">
                        <div class="point">
                            <div class="point__title">Quality</div>
                            <div class="point__text">Clean code, clean UI, clear documentation.</div>
                        </div>
                        <div class="point">
                            <div class="point__title">Speed</div>
                            <div class="point__text">Performance-first layouts and optimized assets.</div>
                        </div>
                        <div class="point">
                            <div class="point__title">Trust</div>
                            <div class="point__text">Security best practices from day one.</div>
                        </div>
                    </div>
                </div>

                <div class="panel reveal">
                    <h2 class="panel__title">How we work</h2>
                    <p class="panel__text">A predictable process with transparent milestones and regular updates.</p>
                    <ol class="timeline">
                        <li><strong>Discovery:</strong> goals, scope, timeline</li>
                        <li><strong>Design:</strong> UI/UX + components</li>
                        <li><strong>Build:</strong> development + QA</li>
                        <li><strong>Launch:</strong> deploy + support</li>
                    </ol>
                </div>
            </div>

            <div class="section__head reveal" style="margin-top: 22px;">
                <h2 class="section__title">Core values</h2>
                <p class="section__subtitle">These guide every decision — from UI to infrastructure.</p>
            </div>

            <div class="cards cards--tight">
                <article class="card reveal">
                    <h3 class="card__title">Clarity</h3>
                    <p class="card__text">Simple architecture, readable code, and clear UI.</p>
                </article>
                <article class="card reveal">
                    <h3 class="card__title">Reliability</h3>
                    <p class="card__text">Monitoring, backups, and stable deployments.</p>
                </article>
                <article class="card reveal">
                    <h3 class="card__title">Security</h3>
                    <p class="card__text">Secure defaults and practical hardening.</p>
                </article>
            </div>

            <div class="page-cta reveal">
                <div class="page-cta__copy">
                    <h3 class="page-cta__title">Want to meet the team?</h3>
                    <p class="page-cta__text">Share your project and we’ll schedule a quick call.</p>
                </div>
                <a class="btn btn--primary" href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
    </section>
@endsection

