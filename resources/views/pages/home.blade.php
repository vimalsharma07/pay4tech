@extends('layouts.app')

@section('title', 'Pay4Tech — IT Company | Web Development, Cloud & Cybersecurity')
@section('meta_description', 'Pay4Tech helps businesses grow with fast websites, secure web apps, cloud & DevOps, cybersecurity, and automation. Get a quote today.')

@section('content')
    <section class="hero">
        <div class="hero__bg" aria-hidden="true">
            <div class="blob blob--1"></div>
            <div class="blob blob--2"></div>
            <div class="grid-glow"></div>
        </div>

        <div class="container hero__inner">
            <div class="hero__content reveal">
                <p class="pill">
                    <span class="pill__dot" aria-hidden="true"></span>
                    Fast delivery • Secure by design • Scales with you
                </p>

                <h1 class="hero__title">
                    We build <span class="grad">modern IT solutions</span> that move your business forward.
                </h1>

                <p class="hero__subtitle">
                    Websites, dashboards, cloud, security, and automation — delivered with premium UI and optimized performance.
                </p>

                <div class="hero__actions">
                    <a class="btn btn--primary" href="{{ route('contact') }}">Start a project</a>
                    <a class="btn btn--ghost" href="{{ route('work') }}">View our work</a>
                </div>

                <div class="hero__trust">
                    <div class="trust-card">
                        <div class="trust-card__icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2l7 4v6c0 5-3 9-7 10C8 21 5 17 5 12V6l7-4Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M9.2 12.2l1.8 1.8L15.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div>
                            <div class="trust-card__title">Secure by default</div>
                            <div class="trust-card__text">OWASP + best practices</div>
                        </div>
                    </div>
                    <div class="trust-card">
                        <div class="trust-card__icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M4 14a8 8 0 1 1 16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 12l5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 12v8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div>
                            <div class="trust-card__title">Performance</div>
                            <div class="trust-card__text">Fast UX, fast SEO</div>
                        </div>
                    </div>
                    <div class="trust-card">
                        <div class="trust-card__icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M12 21s7-4.5 7-10a7 7 0 0 0-14 0c0 5.5 7 10 7 10Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M9 11l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div>
                            <div class="trust-card__title">Support</div>
                            <div class="trust-card__text">Monitoring + SLA</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero__panel reveal" aria-hidden="true">
                <div class="glass">
                    <div class="glass__top">
                        <div class="dots">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="glass__title">Live Ops Dashboard</div>
                        <div class="badge">Realtime</div>
                    </div>
                    <div class="glass__body">
                        <div class="kpi">
                            <div class="kpi__label">Uptime</div>
                            <div class="kpi__value">99.98%</div>
                        </div>
                        <div class="kpi">
                            <div class="kpi__label">Response</div>
                            <div class="kpi__value">132ms</div>
                        </div>
                        <div class="kpi">
                            <div class="kpi__label">Deploys</div>
                            <div class="kpi__value">+18</div>
                        </div>

                        <div class="spark">
                            <div class="spark__bar"></div><div class="spark__bar"></div><div class="spark__bar"></div><div class="spark__bar"></div>
                            <div class="spark__bar"></div><div class="spark__bar"></div><div class="spark__bar"></div><div class="spark__bar"></div>
                            <div class="spark__bar"></div><div class="spark__bar"></div><div class="spark__bar"></div><div class="spark__bar"></div>
                        </div>

                        <div class="glass__foot">
                            <div class="chip">Cloud</div>
                            <div class="chip">Security</div>
                            <div class="chip">Automation</div>
                            <div class="chip">Design</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__head reveal">
                <h2 class="section__title">Services that cover the full stack</h2>
                <p class="section__subtitle">Everything you need to ship a reliable product — from UI to infrastructure.</p>
            </div>

            <div class="cards">
                <article class="card reveal">
                    <div class="card__icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                            <path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M8 10h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M8 14h5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="card__title">Web Development</h3>
                    <p class="card__text">Fast websites, portals, dashboards, and APIs with premium UI.</p>
                </article>
                <article class="card reveal">
                    <div class="card__icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                            <path d="M7 18a4 4 0 0 1 0-8 5 5 0 0 1 9.7 1.3A3.5 3.5 0 1 1 18 18H7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="card__title">Cloud & DevOps</h3>
                    <p class="card__text">CI/CD, monitoring, backups, and infrastructure that scales.</p>
                </article>
                <article class="card reveal">
                    <div class="card__icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2l7 4v6c0 5-3 9-7 10C8 21 5 17 5 12V6l7-4Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 11v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 8h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="card__title">Cybersecurity</h3>
                    <p class="card__text">Hardening, auth, security headers, and practical audits.</p>
                </article>
                <article class="card reveal">
                    <div class="card__icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                            <path d="M8 17l4 4 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12v9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M20 3H4v6h16V3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="card__title">Automation</h3>
                    <p class="card__text">Integrations, workflows, reporting, and internal tooling.</p>
                </article>
            </div>

            <div class="page-cta reveal">
                <div class="page-cta__copy">
                    <h3 class="page-cta__title">Need something specific?</h3>
                    <p class="page-cta__text">See our full service list and delivery packages.</p>
                </div>
                <a class="btn btn--primary" href="{{ route('services') }}">Explore Services</a>
            </div>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container">
            <div class="section__head reveal">
                <h2 class="section__title">Featured work</h2>
                <p class="section__subtitle">A few examples of the kind of projects we deliver.</p>
            </div>

            <div class="work-grid">
                <article class="work-card reveal">
                    <div class="work-card__top">
                        <div class="work-card__tag">FinTech</div>
                        <div class="work-card__tag work-card__tag--soft">Dashboard</div>
                    </div>
                    <h3 class="work-card__title">Payments analytics portal</h3>
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
                        <div class="work-card__tag work-card__tag--soft">Performance</div>
                    </div>
                    <h3 class="work-card__title">High-converting storefront</h3>
                    <p class="work-card__text">Lightning-fast landing pages with SEO, accessibility, and modern motion.</p>
                    <div class="work-card__meta">
                        <span class="meta">SEO</span>
                        <span class="meta">A/B</span>
                        <span class="meta">Core Web Vitals</span>
                    </div>
                </article>

                <article class="work-card reveal">
                    <div class="work-card__top">
                        <div class="work-card__tag">Cloud</div>
                        <div class="work-card__tag work-card__tag--soft">DevOps</div>
                    </div>
                    <h3 class="work-card__title">CI/CD + monitoring setup</h3>
                    <p class="work-card__text">Automated deployments with alerts, logs, backups, and rollback strategy.</p>
                    <div class="work-card__meta">
                        <span class="meta">CI/CD</span>
                        <span class="meta">SLA</span>
                        <span class="meta">Observability</span>
                    </div>
                </article>
            </div>

            <div class="page-cta reveal">
                <div class="page-cta__copy">
                    <h3 class="page-cta__title">Want a full portfolio?</h3>
                    <p class="page-cta__text">Browse case studies and project snapshots.</p>
                </div>
                <a class="btn btn--ghost" href="{{ route('work') }}">See Work</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__head reveal">
                <h2 class="section__title">What clients say</h2>
                <p class="section__subtitle">A lightweight rotating slider (no libraries).</p>
            </div>

            <div class="slider reveal" data-slider>
                <div class="slider__track" data-slider-track>
                    <figure class="quote">
                        <blockquote class="quote__text">“Beautiful UI and the site loads instantly. Our leads doubled within weeks.”</blockquote>
                        <figcaption class="quote__meta">
                            <span class="quote__name">Ayesha R.</span>
                            <span class="quote__role">Marketing Lead</span>
                        </figcaption>
                    </figure>
                    <figure class="quote">
                        <blockquote class="quote__text">“Security and performance were top priority — the result is stable, fast, and easy to maintain.”</blockquote>
                        <figcaption class="quote__meta">
                            <span class="quote__name">Daniel K.</span>
                            <span class="quote__role">CTO</span>
                        </figcaption>
                    </figure>
                    <figure class="quote">
                        <blockquote class="quote__text">“Weekly updates, clear milestones, and zero surprises. Exactly how a project should run.”</blockquote>
                        <figcaption class="quote__meta">
                            <span class="quote__name">Fatima S.</span>
                            <span class="quote__role">Founder</span>
                        </figcaption>
                    </figure>
                </div>
                <div class="slider__controls">
                    <button class="icon-btn" type="button" data-slider-prev aria-label="Previous testimonial">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="icon-btn" type="button" data-slider-next aria-label="Next testimonial">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="page-cta reveal">
                <div class="page-cta__copy">
                    <h3 class="page-cta__title">Ready to start?</h3>
                    <p class="page-cta__text">Tell us your goals and we’ll propose a plan.</p>
                </div>
                <a class="btn btn--primary" href="{{ route('contact') }}">Contact us</a>
            </div>
        </div>
    </section>
@endsection
