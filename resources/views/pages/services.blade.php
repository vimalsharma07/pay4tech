@extends('layouts.app')

@section('title', 'Services — Pay4Tech | Web, Cloud, DevOps, Security')
@section('meta_description', 'Pay4Tech services: web development, UI/UX, cloud & DevOps, cybersecurity, automation, and maintenance. Scalable, secure and fast delivery.')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="page-hero__inner reveal">
                <h1 class="page-hero__title">Services</h1>
                <p class="page-hero__subtitle">From idea to launch — we cover strategy, design, engineering, and ongoing support.</p>
                <div class="page-hero__actions">
                    <a class="btn btn--primary" href="{{ route('contact') }}">Get a quote</a>
                    <a class="btn btn--ghost" href="{{ route('work') }}">See work</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="cards cards--tight">
                <article class="card reveal">
                    <h2 class="card__title">Web Development</h2>
                    <p class="card__text">Landing pages, company sites, portals, dashboards, and APIs — optimized for SEO & speed.</p>
                    <ul class="list">
                        <li>Laravel websites & admin panels</li>
                        <li>REST APIs + integrations</li>
                        <li>Performance + caching</li>
                    </ul>
                </article>

                <article class="card reveal">
                    <h2 class="card__title">UI/UX Design</h2>
                    <p class="card__text">Beautiful, consistent UI with motion that feels premium (and still lightweight).</p>
                    <ul class="list">
                        <li>Design system & components</li>
                        <li>Responsive layouts</li>
                        <li>Accessibility (WCAG basics)</li>
                    </ul>
                </article>

                <article class="card reveal">
                    <h2 class="card__title">Cloud & DevOps</h2>
                    <p class="card__text">Deploy safely with monitoring, backups, and a clean release process.</p>
                    <ul class="list">
                        <li>CI/CD setup</li>
                        <li>Monitoring & alerting</li>
                        <li>Backups & disaster recovery</li>
                    </ul>
                </article>

                <article class="card reveal">
                    <h2 class="card__title">Cybersecurity</h2>
                    <p class="card__text">Practical security improvements you can feel in production.</p>
                    <ul class="list">
                        <li>Auth hardening</li>
                        <li>Security headers</li>
                        <li>OWASP baseline checks</li>
                    </ul>
                </article>

                <article class="card reveal">
                    <h2 class="card__title">Automation</h2>
                    <p class="card__text">Cut costs and reduce errors using smart workflows and integrations.</p>
                    <ul class="list">
                        <li>APIs & webhooks</li>
                        <li>Reporting dashboards</li>
                        <li>Internal tools</li>
                    </ul>
                </article>

                <article class="card reveal">
                    <h2 class="card__title">Maintenance & Support</h2>
                    <p class="card__text">We keep your systems healthy with clear SLAs and ongoing improvements.</p>
                    <ul class="list">
                        <li>Bug fixes & enhancements</li>
                        <li>Monitoring & uptime</li>
                        <li>Security updates</li>
                    </ul>
                </article>
            </div>

            <div class="pricing reveal">
                <div class="section__head">
                    <h2 class="section__title">Delivery packages</h2>
                    <p class="section__subtitle">Choose a starting point. We customize based on scope and timeline.</p>
                </div>

                <div class="pricing__grid">
                    <div class="price-card">
                        <div class="price-card__title">Starter</div>
                        <div class="price-card__price">Best for small sites</div>
                        <ul class="list">
                            <li>3–5 pages</li>
                            <li>Modern UI + animations</li>
                            <li>Contact form UI</li>
                        </ul>
                        <a class="btn btn--ghost btn--full" href="{{ route('contact') }}">Request estimate</a>
                    </div>
                    <div class="price-card price-card--featured">
                        <div class="price-card__title">Business</div>
                        <div class="price-card__price">Best for companies</div>
                        <ul class="list">
                            <li>5–10 pages</li>
                            <li>Portfolio + case studies</li>
                            <li>Performance optimization</li>
                        </ul>
                        <a class="btn btn--primary btn--full" href="{{ route('contact') }}">Request estimate</a>
                    </div>
                    <div class="price-card">
                        <div class="price-card__title">Scale</div>
                        <div class="price-card__price">Best for products</div>
                        <ul class="list">
                            <li>Admin panel / dashboard</li>
                            <li>APIs + integrations</li>
                            <li>Monitoring + support</li>
                        </ul>
                        <a class="btn btn--ghost btn--full" href="{{ route('contact') }}">Request estimate</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

