// Pure Laravel JS (served from /public). No bundler required.
(() => {
  const root = document.documentElement;
  root.classList.remove('no-js');

  const prefersReducedMotion = window.matchMedia?.('(prefers-reduced-motion: reduce)')?.matches ?? false;

  // Theme
  const THEME_KEY = 'site-theme';
  const themeToggle = document.querySelector('[data-theme-toggle]');
  const getPreferredTheme = () => {
    const saved = localStorage.getItem(THEME_KEY);
    if (saved === 'light' || saved === 'dark') return saved;
    return window.matchMedia?.('(prefers-color-scheme: light)')?.matches ? 'light' : 'dark';
  };
  const applyTheme = (theme) => {
    if (theme === 'light') root.setAttribute('data-theme', 'light');
    else root.removeAttribute('data-theme'); // default is dark tokens
  };
  applyTheme(getPreferredTheme());
  themeToggle?.addEventListener('click', () => {
    const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
    applyTheme(next);
    localStorage.setItem(THEME_KEY, next);
  });

  // Sticky header border
  const header = document.querySelector('[data-header]');
  const setHeader = () => {
    if (!header) return;
    header.classList.toggle('is-scrolled', window.scrollY > 8);
  };
  setHeader();
  window.addEventListener('scroll', setHeader, { passive: true });

  // Mobile nav
  const navToggle = document.querySelector('[data-nav-toggle]');
  const navMenu = document.querySelector('[data-nav-menu]');
  const closeMenu = () => {
    if (!navMenu || !navToggle) return;
    navMenu.classList.remove('is-open');
    navToggle.setAttribute('aria-expanded', 'false');
  };
  const openMenu = () => {
    if (!navMenu || !navToggle) return;
    navMenu.classList.add('is-open');
    navToggle.setAttribute('aria-expanded', 'true');
  };
  navToggle?.addEventListener('click', () => {
    if (!navMenu || !navToggle) return;
    const isOpen = navMenu.classList.contains('is-open');
    if (isOpen) closeMenu();
    else openMenu();
  });
  navMenu?.addEventListener('click', (e) => {
    const a = e.target?.closest?.('a');
    if (a) closeMenu();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMenu();
  });

  // Smooth anchor scroll (with header offset)
  const headerOffset = () => (header ? Math.ceil(header.getBoundingClientRect().height) : 0) + 8;
  document.addEventListener('click', (e) => {
    const a = e.target?.closest?.('a[href^="#"]');
    if (!a) return;
    const href = a.getAttribute('href');
    if (!href || href === '#' || href === '#top') return;
    const el = document.querySelector(href);
    if (!el) return;
    e.preventDefault();
    const y = window.scrollY + el.getBoundingClientRect().top - headerOffset();
    window.scrollTo({ top: y, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
  });
  document.querySelector('[data-scroll-top]')?.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
  });

  // Reveal on scroll
  const reveals = Array.from(document.querySelectorAll('.reveal'));
  if (!prefersReducedMotion && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-in');
            io.unobserve(entry.target);
          }
        }
      },
      { rootMargin: '0px 0px -12% 0px', threshold: 0.12 },
    );
    reveals.forEach((el) => io.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add('is-in'));
  }

  // Count-up stats
  const counters = Array.from(document.querySelectorAll('[data-count]'));
  const animateCounter = (el) => {
    const targetRaw = el.getAttribute('data-count') ?? '0';
    const target = Number(targetRaw);
    if (!Number.isFinite(target)) return;

    const hasDecimal = targetRaw.includes('.');
    const duration = 900;
    const start = performance.now();

    const tick = (now) => {
      const t = Math.min(1, (now - start) / duration);
      const eased = 1 - Math.pow(1 - t, 3);
      const value = target * eased;
      el.textContent = hasDecimal ? value.toFixed(1) : String(Math.round(value));
      if (t < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };

  if (!prefersReducedMotion && 'IntersectionObserver' in window && counters.length) {
    const cio = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (!entry.isIntersecting) continue;
          animateCounter(entry.target);
          cio.unobserve(entry.target);
        }
      },
      { threshold: 0.4 },
    );
    counters.forEach((el) => cio.observe(el));
  } else {
    counters.forEach((el) => (el.textContent = el.getAttribute('data-count') ?? el.textContent));
  }

  // Testimonials slider
  const slider = document.querySelector('[data-slider]');
  const track = slider?.querySelector?.('[data-slider-track]');
  const prevBtn = slider?.querySelector?.('[data-slider-prev]');
  const nextBtn = slider?.querySelector?.('[data-slider-next]');
  if (slider && track) {
    const slides = Array.from(track.children);
    let index = 0;
    let timer = null;

    const render = () => {
      track.style.transform = `translateX(${index * -100}%)`;
    };
    const go = (dir) => {
      index = (index + dir + slides.length) % slides.length;
      render();
    };

    prevBtn?.addEventListener('click', () => go(-1));
    nextBtn?.addEventListener('click', () => go(1));

    const startAuto = () => {
      if (prefersReducedMotion) return;
      stopAuto();
      timer = window.setInterval(() => go(1), 5200);
    };
    const stopAuto = () => {
      if (timer) window.clearInterval(timer);
      timer = null;
    };
    slider.addEventListener('mouseenter', stopAuto);
    slider.addEventListener('mouseleave', startAuto);
    startAuto();
    render();
  }

  // Contact form toast (UI only)
  const toast = document.querySelector('[data-toast]');
  const toastClose = document.querySelector('[data-toast-close]');
  const showToast = () => {
    if (!toast) return;
    toast.hidden = false;
    window.setTimeout(() => {
      toast.hidden = true;
    }, 4200);
  };
  toastClose?.addEventListener('click', () => {
    if (!toast) return;
    toast.hidden = true;
  });

  // Auto-show toast after redirects (server sets data-toast-autoshow)
  if (toast?.dataset?.toastAutoshow === '1') {
    showToast();
  }
})();

