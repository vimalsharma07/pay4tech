@extends('layouts.app')

@section('title', 'Work — Pay4Tech | Portfolio & Case Studies')
@section('meta_description', 'Pay4Tech portfolio: dashboards, websites, cloud & DevOps projects, and automation. Clean UI, fast performance, secure delivery.')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="page-hero__inner reveal">
                <h1 class="page-hero__title">Our work</h1>
                <p class="page-hero__subtitle">Case studies and project snapshots. Replace these with your real portfolio.</p>
                <div class="page-hero__actions">
                    <a class="btn btn--primary" href="{{ route('contact') }}">Start a project</a>
                    <a class="btn btn--ghost" href="{{ route('services') }}">See services</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container">
            <div class="work-grid">
                <article class="work-card reveal">
                    <div class="work-card__top">
                        <div class="work-card__tag">FinTech</div>
                        <div class="work-card__tag work-card__tag--soft">Dashboard</div>
                    </div>
                    <h2 class="work-card__title">Payments analytics portal</h2>
                    <p class="work-card__text">Realtime insights, role-based access, and a clean UI optimized for speed.</p>
                    <div class="work-card__meta">
                        <span class="meta">Laravel</span>
                        <span class="meta">Caching</span>
                        <span class="meta">RBAC</span>
                    </div>
                </article>

                <article class="work-card reveal">
                    <div class="work-card__top">
                        <div class="work-card__tag">E‑commerce</div>
                        <div class="work-card__tag work-card__tag--soft">SEO</div>
                    </div>
                    <h2 class="work-card__title">High-converting storefront</h2>
                    <p class="work-card__text">Landing pages built for conversions with Core Web Vitals in mind.</p>
                    <div class="work-card__meta">
                        <span class="meta">SEO</span>
                        <span class="meta">CWV</span>
                        <span class="meta">Accessibility</span>
                    </div>
                </article>

                <article class="work-card reveal">
                    <div class="work-card__top">
                        <div class="work-card__tag">Cloud</div>
                        <div class="work-card__tag work-card__tag--soft">DevOps</div>
                    </div>
                    <h2 class="work-card__title">CI/CD + monitoring setup</h2>
                    <p class="work-card__text">Deployments with alerts, backups, logs, and rollback strategy.</p>
                    <div class="work-card__meta">
                        <span class="meta">CI/CD</span>
                        <span class="meta">SLA</span>
                        <span class="meta">Observability</span>
                    </div>
                </article>
            </div>

            <div class="stats reveal" aria-label="Company highlights">
                <div class="stat">
                    <div class="stat__num" data-count="120">0</div>
                    <div class="stat__label">Projects shipped</div>
                </div>
                <div class="stat">
                    <div class="stat__num" data-count="9">0</div>
                    <div class="stat__label">Years experience</div>
                </div>
                <div class="stat">
                    <div class="stat__num" data-count="38">0</div>
                    <div class="stat__label">Active clients</div>
                </div>
                <div class="stat">
                    <div class="stat__num" data-count="99.9">0</div>
                    <div class="stat__label">Uptime focus</div>
                </div>
            </div>

            <div class="page-cta reveal">
                <div class="page-cta__copy">
                    <h3 class="page-cta__title">Want your project here?</h3>
                    <p class="page-cta__text">We can build a portfolio-ready product with excellent UX.</p>
                </div>
                <a class="btn btn--primary" href="{{ route('contact') }}">Let’s talk</a>
            </div>
        </div>
    </section>
@endsection

