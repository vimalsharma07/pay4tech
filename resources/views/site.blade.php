<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'IT Company') }} — Modern IT Solutions</title>
    <meta name="description" content="Modern IT services: web development, cloud, cybersecurity, and automation. We build fast, secure, scalable products for your business.">

    <meta property="og:title" content="{{ config('app.name', 'IT Company') }} — Modern IT Solutions">
    <meta property="og:description" content="Web, cloud, cybersecurity, and automation. Fast, secure, scalable delivery.">
    <meta property="og:type" content="website">

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body id="top">
    <a class="skip-link" href="#main">Skip to content</a>

    <header class="header" data-header>
        <div class="container header__inner">
            <a class="brand" href="{{ url('/') }}" aria-label="{{ config('app.name', 'IT Company') }} home">
                <span class="brand__mark" aria-hidden="true">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2L20 7V17L12 22L4 17V7L12 2Z" stroke="currentColor" stroke-width="1.6"/>
                        <path d="M12 6.2L16.5 8.8V13.9L12 16.5L7.5 13.9V8.8L12 6.2Z" stroke="currentColor" stroke-width="1.6" opacity="0.9"/>
                    </svg>
                </span>
                <span class="brand__text">{{ config('app.name', 'Payomatix IT') }}</span>
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
                    <a class="nav__link" href="#services">Services</a>
                    <a class="nav__link" href="#work">Work</a>
                    <a class="nav__link" href="#process">Process</a>
                    <a class="nav__link" href="#testimonials">Testimonials</a>
                    <a class="nav__link" href="#contact">Contact</a>
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
                    <a class="btn btn--primary nav__cta" href="#contact">Get a quote</a>
                </div>
            </nav>
        </div>
    </header>

    <main id="main">
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
                        From websites and apps to cloud, cybersecurity, and automation — we design, build, and support systems that are fast, reliable, and beautiful.
                    </p>

                    <div class="hero__actions">
                        <a class="btn btn--primary" href="#contact">Start a project</a>
                        <a class="btn btn--ghost" href="#work">View our work</a>
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
                                <div class="trust-card__text">Best practices + audits</div>
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
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
                                <div class="spark__bar"></div>
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

        <section class="section" id="services">
            <div class="container">
                <div class="section__head reveal">
                    <h2 class="section__title">Services that cover the full stack</h2>
                    <p class="section__subtitle">Everything you need to ship a reliable product — with a premium UI and smooth animations.</p>
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
                        <p class="card__text">High-performance websites & dashboards with clean UX, SEO, and accessibility built in.</p>
                        <ul class="list">
                            <li>Laravel / PHP</li>
                            <li>SPA or SSR</li>
                            <li>Optimized UI</li>
                        </ul>
                    </article>

                    <article class="card reveal">
                        <div class="card__icon" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <path d="M7 18a4 4 0 0 1 0-8 5 5 0 0 1 9.7 1.3A3.5 3.5 0 1 1 18 18H7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="card__title">Cloud & DevOps</h3>
                        <p class="card__text">Deploy faster with CI/CD, monitoring, backups, and infrastructure that scales.</p>
                        <ul class="list">
                            <li>CI/CD pipelines</li>
                            <li>Monitoring & logs</li>
                            <li>Cost optimization</li>
                        </ul>
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
                        <p class="card__text">Harden your app and infrastructure with practical security improvements.</p>
                        <ul class="list">
                            <li>OWASP checks</li>
                            <li>Auth & roles</li>
                            <li>Security headers</li>
                        </ul>
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
                        <p class="card__text">Reduce manual work with integrations, workflows, and data pipelines.</p>
                        <ul class="list">
                            <li>APIs & webhooks</li>
                            <li>Reporting</li>
                            <li>Internal tools</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section--alt" id="work">
            <div class="container">
                <div class="section__head reveal">
                    <h2 class="section__title">Recent work</h2>
                    <p class="section__subtitle">A few examples of the kind of projects we deliver. Replace these with your real portfolio later.</p>
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
                            <span class="meta">Vite</span>
                            <span class="meta">Caching</span>
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
                            <span class="meta">SSR</span>
                            <span class="meta">SEO</span>
                            <span class="meta">A/B</span>
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
            </div>
        </section>

        <section class="section" id="process">
            <div class="container">
                <div class="section__head reveal">
                    <h2 class="section__title">A clear, reliable process</h2>
                    <p class="section__subtitle">No chaos. You get a transparent plan, weekly updates, and predictable delivery.</p>
                </div>

                <ol class="steps">
                    <li class="step reveal">
                        <div class="step__num">01</div>
                        <div class="step__body">
                            <h3 class="step__title">Discovery</h3>
                            <p class="step__text">We align on goals, scope, timeline, and the fastest path to value.</p>
                        </div>
                    </li>
                    <li class="step reveal">
                        <div class="step__num">02</div>
                        <div class="step__body">
                            <h3 class="step__title">Design</h3>
                            <p class="step__text">Modern UI/UX with components, motion, and accessibility built in.</p>
                        </div>
                    </li>
                    <li class="step reveal">
                        <div class="step__num">03</div>
                        <div class="step__body">
                            <h3 class="step__title">Build</h3>
                            <p class="step__text">Clean code, optimized assets, and best-practice security from day one.</p>
                        </div>
                    </li>
                    <li class="step reveal">
                        <div class="step__num">04</div>
                        <div class="step__body">
                            <h3 class="step__title">Launch & Support</h3>
                            <p class="step__text">Deploy, monitor, iterate. We support you after launch with clear SLAs.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>

        <section class="section section--alt" id="testimonials">
            <div class="container">
                <div class="section__head reveal">
                    <h2 class="section__title">What clients say</h2>
                    <p class="section__subtitle">A small rotating slider, fully lightweight (no libraries).</p>
                </div>

                <div class="slider reveal" data-slider>
                    <div class="slider__track" data-slider-track>
                        <figure class="quote">
                            <blockquote class="quote__text">“The team delivered a beautiful UI and the site loads instantly. Our leads doubled within weeks.”</blockquote>
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
            </div>
        </section>

        <section class="section" id="contact">
            <div class="container">
                <div class="cta reveal">
                    <div class="cta__copy">
                        <h2 class="cta__title">Let’s build something great</h2>
                        <p class="cta__text">Tell us about your project. We’ll reply with a timeline, budget range, and next steps.</p>
                        <div class="cta__chips" aria-hidden="true">
                            <span class="chip">Website</span>
                            <span class="chip">App</span>
                            <span class="chip">Cloud</span>
                            <span class="chip">Security</span>
                        </div>
                    </div>
                    <form class="form" data-contact-form>
                        <label class="field">
                            <span class="field__label">Name</span>
                            <input class="field__input" name="name" autocomplete="name" required placeholder="Your name">
                        </label>
                        <label class="field">
                            <span class="field__label">Email</span>
                            <input class="field__input" type="email" name="email" autocomplete="email" required placeholder="you@company.com">
                        </label>
                        <label class="field">
                            <span class="field__label">Message</span>
                            <textarea class="field__input field__input--area" name="message" rows="4" required placeholder="What do you want to build?"></textarea>
                        </label>
                        <button class="btn btn--primary btn--full" type="submit">Send message</button>
                        <p class="form__hint">By sending, you agree to be contacted about this request.</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer__inner">
            <div class="footer__brand">
                <div class="brand brand--small">
                    <span class="brand__mark" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L20 7V17L12 22L4 17V7L12 2Z" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M12 6.2L16.5 8.8V13.9L12 16.5L7.5 13.9V8.8L12 6.2Z" stroke="currentColor" stroke-width="1.6" opacity="0.9"/>
                        </svg>
                    </span>
                    <span class="brand__text">{{ config('app.name', 'Payomatix IT') }}</span>
                </div>
                <p class="footer__text">Modern IT solutions with premium UI and optimized performance.</p>
            </div>

            <div class="footer__links">
                <div class="footer__col">
                    <div class="footer__title">Company</div>
                    <a href="#services">Services</a>
                    <a href="#process">Process</a>
                    <a href="#contact">Contact</a>
                </div>
                <div class="footer__col">
                    <div class="footer__title">Contact</div>
                    <a href="mailto:hello@example.com">hello@example.com</a>
                    <a href="tel:+10000000000">+1 (000) 000-0000</a>
                    <span class="muted">Mon–Sat 10:00–19:00</span>
                </div>
            </div>
        </div>
        <div class="container footer__bottom">
            <span class="muted">© {{ date('Y') }} {{ config('app.name', 'Payomatix IT') }}. All rights reserved.</span>
            <a class="muted-link" href="#top" data-scroll-top>Back to top</a>
        </div>
    </footer>

    <div class="toast" role="status" aria-live="polite" aria-atomic="true" hidden data-toast>
        <div class="toast__inner">
            <strong class="toast__title">Message sent</strong>
            <span class="toast__text">We’ll get back to you shortly.</span>
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
