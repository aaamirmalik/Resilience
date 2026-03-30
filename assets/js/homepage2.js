document.addEventListener('DOMContentLoaded', () => {
  initMenuToggle();
  initCounters();
  initSlider('team', { autoPlay: false });
  initSlider('testimonial', { autoPlay: true, interval: 6000 });
});

function initMenuToggle() {
  const toggle = document.querySelector('.hp2-menu-toggle');
  const menu = document.querySelector('.hp2-mobile-menu');
  if (!toggle || !menu) return;

  toggle.addEventListener('click', () => {
    const open = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(open));
    menu.setAttribute('aria-hidden', String(!open));
  });
}

function initCounters() {
  const counters = document.querySelectorAll('[data-counter-target]');
  if (!counters.length) return;

  const animateCounter = (el) => {
    if (el.dataset.done === '1') return;
    const target = Number(el.getAttribute('data-counter-target'));
    const suffix = el.getAttribute('data-counter-suffix') || '';
    if (!Number.isFinite(target)) return;

    const start = performance.now();
    const duration = 1800;
    const easeOut = (t) => 1 - Math.pow(1 - t, 3);

    const step = (now) => {
      const p = Math.min((now - start) / duration, 1);
      const value = Math.round(target * easeOut(p));
      const displayValue = target > 99 ? value.toLocaleString('en-US') : String(value);
      el.textContent = `${displayValue}${suffix}`;
      if (p < 1) {
        requestAnimationFrame(step);
      } else {
        el.dataset.done = '1';
      }
    };

    requestAnimationFrame(step);
  };

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      animateCounter(entry.target);
      obs.unobserve(entry.target);
    });
  }, { threshold: 0.4 });

  counters.forEach((el) => observer.observe(el));
}

function initSlider(name, options = {}) {
  const root = document.querySelector(`[data-slider="${name}"]`);
  if (!root) return;

  const viewport = root.querySelector('.hp2-slider-viewport');
  const track = root.querySelector('.hp2-slider-track');
  const prev = root.querySelector('.hp2-prev');
  const next = root.querySelector('.hp2-next');
  const dotsWrap = document.querySelector(`[data-slider-dots="${name}"]`);

  if (!viewport || !track) return;
  const slides = Array.from(track.children);
  if (slides.length < 2) return;

  let index = 0;
  let timer = null;
  let resizeRaf = 0;
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const baseOffsetRaw = parseFloat(root.getAttribute('data-slider-offset') || '0') || 0;
  const getBaseOffset = () => {
    if (name !== 'team') return 0;
    return window.innerWidth >= 1440 ? baseOffsetRaw : 0;
  };

  const getGap = () => {
    const styles = window.getComputedStyle(track);
    return parseFloat(styles.columnGap || styles.gap || '0') || 0;
  };

  const getVisibleCount = () => {
    if (name === 'testimonial') return 1;
    if (name === 'team') {
      if (window.innerWidth < 768) return 1;
      if (window.innerWidth < 1025) return 2;
      return 3;
    }
    if (window.innerWidth < 768) return 1;
    if (window.innerWidth < 1025) return 2;
    return 4;
  };

  const pageCount = () => Math.max(1, slides.length - getVisibleCount() + 1);

  const updateDots = () => {
    if (!dotsWrap) return;
    dotsWrap.innerHTML = '';
    const total = pageCount();
    for (let i = 0; i < total; i += 1) {
      const dot = document.createElement('button');
      dot.type = 'button';
      if (i === index) dot.classList.add('is-active');
      dot.addEventListener('click', () => {
        index = i;
        render();
      });
      dotsWrap.appendChild(dot);
    }
  };

  const render = () => {
    const gap = getGap();
    const slideWidth = slides[0].getBoundingClientRect().width;
    const max = pageCount() - 1;
    if (index > max) index = max;
    if (index < 0) index = 0;

    const x = (slideWidth + gap) * index + getBaseOffset();
    track.style.transform = `translateX(-${x}px)`;

    if (dotsWrap) {
      dotsWrap.querySelectorAll('button').forEach((dot, i) => {
        dot.classList.toggle('is-active', i === index);
      });
    }
  };

  const nextSlide = () => {
    const max = pageCount() - 1;
    index = index >= max ? 0 : index + 1;
    render();
  };

  const prevSlide = () => {
    const max = pageCount() - 1;
    index = index <= 0 ? max : index - 1;
    render();
  };

  const startAuto = () => {
    if (!options.autoPlay || prefersReducedMotion || document.hidden) return;
    stopAuto();
    timer = setInterval(nextSlide, options.interval || 5000);
  };

  const stopAuto = () => {
    if (!timer) return;
    clearInterval(timer);
    timer = null;
  };

  if (next) next.addEventListener('click', () => { nextSlide(); startAuto(); });
  if (prev) prev.addEventListener('click', () => { prevSlide(); startAuto(); });

  let touchStartX = 0;
  let touchStartY = 0;
  let touchDeltaX = 0;
  let touchDeltaY = 0;
  let isTouching = false;

  const onTouchStart = (event) => {
    if (!event.touches || !event.touches.length) return;
    isTouching = true;
    touchStartX = event.touches[0].clientX;
    touchStartY = event.touches[0].clientY;
    touchDeltaX = 0;
    touchDeltaY = 0;
    stopAuto();
  };

  const onTouchMove = (event) => {
    if (!isTouching || !event.touches || !event.touches.length) return;
    touchDeltaX = event.touches[0].clientX - touchStartX;
    touchDeltaY = event.touches[0].clientY - touchStartY;
  };

  const onTouchEnd = () => {
    if (!isTouching) return;
    isTouching = false;
    const threshold = 45;
    const isHorizontalIntent = Math.abs(touchDeltaX) > Math.abs(touchDeltaY);
    if (isHorizontalIntent && touchDeltaX <= -threshold) {
      nextSlide();
    } else if (isHorizontalIntent && touchDeltaX >= threshold) {
      prevSlide();
    }
    touchDeltaX = 0;
    touchDeltaY = 0;
    startAuto();
  };

  viewport.addEventListener('touchstart', onTouchStart, { passive: true });
  viewport.addEventListener('touchmove', onTouchMove, { passive: true });
  viewport.addEventListener('touchend', onTouchEnd, { passive: true });
  viewport.addEventListener('touchcancel', onTouchEnd, { passive: true });

  root.addEventListener('mouseenter', stopAuto);
  root.addEventListener('mouseleave', startAuto);

  window.addEventListener('resize', () => {
    if (resizeRaf) cancelAnimationFrame(resizeRaf);
    resizeRaf = requestAnimationFrame(() => {
      updateDots();
      render();
    });
  });

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) {
      stopAuto();
      return;
    }
    startAuto();
  });

  updateDots();
  render();
  startAuto();
}
