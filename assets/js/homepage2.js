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

  // --- 1. SETUP CLONES FOR INFINITE LOOP ---
  const originalSlides = Array.from(track.children);
  const originalCount = originalSlides.length;
  if (originalCount < 2) return;

  // Create copies of the slides to append to the end and prepend to the start
  const clonesBefore = originalSlides.map(el => {
    const clone = el.cloneNode(true);
    clone.setAttribute('aria-hidden', 'true'); // Keeps screen readers from reading duplicates
    return clone;
  });
  const clonesAfter = originalSlides.map(el => {
    const clone = el.cloneNode(true);
    clone.setAttribute('aria-hidden', 'true');
    return clone;
  });

  // Insert clones into the DOM
  for (let i = clonesBefore.length - 1; i >= 0; i--) {
    track.insertBefore(clonesBefore[i], track.firstChild);
  }
  clonesAfter.forEach(clone => track.appendChild(clone));

  const allSlides = Array.from(track.children);

  // --- 2. STATE ---
  // We start at the first REAL slide, which is located after the prepended clones
  let currentIndex = originalCount;
  let isTransitioning = false;
  let timer = null;
  let resizeRaf = 0;
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const getBaseOffset = () => {
    if (name !== 'team') return 0;
    return window.innerWidth >= 1440 ? parseFloat(root.getAttribute('data-slider-offset') || '0') || 0 : 0;
  };

  const getGap = () => {
    const styles = window.getComputedStyle(track);
    return parseFloat(styles.columnGap || styles.gap || '0') || 0;
  };

  // --- 3. DOTS ---
  const updateDots = () => {
    if (!dotsWrap) return;
    dotsWrap.innerHTML = '';
    
    // For an infinite loop, we generate one dot per original slide
    for (let i = 0; i < originalCount; i++) {
      const dot = document.createElement('button');
      dot.type = 'button';
      if (i === 0) dot.classList.add('is-active');
      dot.addEventListener('click', () => {
        if (isTransitioning) return; // Prevent clicking while animating
        currentIndex = originalCount + i;
        render(true);
        startAuto();
      });
      dotsWrap.appendChild(dot);
    }
  };

  // --- 4. RENDER & MOVEMENT ---
  const render = (animate = true) => {
    const gap = getGap();
    const slideWidth = allSlides[0].getBoundingClientRect().width;
    if (!slideWidth) return;

    const step = slideWidth + gap;
    let n = 0;
    if (name === 'team') {
      n = 30;
    }
    const x = (step * currentIndex) - getBaseOffset() - n;

    if (animate) {
      // Allow CSS transitions to handle the animation
      track.style.transition = '';
      isTransitioning = true;
    } else {
      // Instantly move without animation (used for the invisible teleporting)
      track.style.transition = 'none';
    }

    track.style.transform = `translateX(-${x}px)`;

    // Update the active dot state
    if (dotsWrap) {
      let activeDotIndex = (currentIndex - originalCount) % originalCount;
      if (activeDotIndex < 0) activeDotIndex += originalCount; // Handle negative math when sliding left

      dotsWrap.querySelectorAll('button').forEach((dot, i) => {
        dot.classList.toggle('is-active', i === activeDotIndex);
      });
    }
  };

  // --- 5. THE INFINITE SNAP MAGIC ---
  // When the CSS animation finishes sliding into a clone, we silently teleport back
  track.addEventListener('transitionend', () => {
    isTransitioning = false;

    // If we moved too far right (into the end clones)
    if (currentIndex >= originalCount * 2) {
      currentIndex = currentIndex - originalCount;
      render(false); // Teleport instantly
    }
    // If we moved too far left (into the beginning clones)
    else if (currentIndex < originalCount) {
      currentIndex = currentIndex + originalCount;
      render(false); // Teleport instantly
    }
  });

  const nextSlide = () => {
    if (isTransitioning) return;
    currentIndex++;
    render(true);
  };

  const prevSlide = () => {
    if (isTransitioning) return;
    currentIndex--;
    render(true);
  };

  // --- 6. AUTOPLAY & EVENTS ---
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

  // Touch/Swipe logic
  let touchStartX = 0, touchDeltaX = 0, isTouching = false;
  
  viewport.addEventListener('touchstart', (e) => {
    if (!e.touches.length) return;
    isTouching = true;
    touchStartX = e.touches[0].clientX;
    touchDeltaX = 0;
    stopAuto();
  }, { passive: true });

  viewport.addEventListener('touchmove', (e) => {
    if (!isTouching || !e.touches.length) return;
    touchDeltaX = e.touches[0].clientX - touchStartX;
  }, { passive: true });

  viewport.addEventListener('touchend', () => {
    if (!isTouching) return;
    isTouching = false;
    if (Math.abs(touchDeltaX) > 45) { // 45px swipe threshold
      if (touchDeltaX < 0) nextSlide();
      else prevSlide();
    }
    startAuto();
  }, { passive: true });

  root.addEventListener('mouseenter', stopAuto);
  root.addEventListener('mouseleave', startAuto);

  window.addEventListener('resize', () => {
    if (resizeRaf) cancelAnimationFrame(resizeRaf);
    resizeRaf = requestAnimationFrame(() => render(false));
  });

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) stopAuto();
    else startAuto();
  });

  // Initialization
  updateDots();
  render(false); // Instantly align the track to the first real slide on load
  setTimeout(startAuto, 100);
}
