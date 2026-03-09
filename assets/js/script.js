document.addEventListener("DOMContentLoaded", function () {
  // Team directory filter
  const filterBtns = document.querySelectorAll(".filter-btn-am");
  const teamCards = document.querySelectorAll(".team-card-am");

  filterBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      filterBtns.forEach((b) => b.classList.remove("active-am"));
      this.classList.add("active-am");

      const filter = this.getAttribute("data-filter");
      teamCards.forEach((card) => {
        card.style.display =
          filter === "all" || card.classList.contains(filter) ? "block" : "none";
      });
    });
  });

  // FAQ accordion
  document.querySelectorAll(".faq-item-am").forEach((item) => {
    const question = item.querySelector(".faq-question-am");
    if (!question) return;

    question.addEventListener("click", () => {
      const isActive = item.classList.contains("active");

      document.querySelectorAll(".faq-item-am").forEach((otherItem) => {
        otherItem.classList.remove("active");
      });

      if (!isActive) item.classList.add("active");
    });
  });

  // Scroll reveal animation
  const revealTargets = document.querySelectorAll(
    ".section-am, .page-header-am, .blog-header-am, .featured-post-am, .blog-card-am, .service-card-am, .services-card-am, .team-card-am, .services-team-card-am, .pillar-item, .services-pillar-am, .approach-col, .services-approach-col-am, .faq-item-am, .hero-side-card-am, .testimonial-card-am, .step-item-am"
  );

  revealTargets.forEach((el, index) => {
    el.classList.add("reveal-on-scroll-am");
    el.style.setProperty("--reveal-delay-am", `${(index % 6) * 70}ms`);
  });

  const revealObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add("is-visible-am");
        observer.unobserve(entry.target);
      });
    },
    { threshold: 0.14, rootMargin: "0px 0px -8% 0px" }
  );

  revealTargets.forEach((el) => revealObserver.observe(el));

  // Animated counters for stat blocks
  const counterTargets = document.querySelectorAll(
    ".hero-meta-value-am, .services-hero-stat-am h4, .stat-item h4"
  );

  const counterObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      });
    },
    { threshold: 0.5 }
  );

  counterTargets.forEach((el) => counterObserver.observe(el));
});

function animateCounter(el) {
  if (!el || el.dataset.counterDone === "1") return;

  const originalText = (el.textContent || "").trim();
  const numberMatch = originalText.match(/[\d,.]+/);
  if (!numberMatch) return;

  const rawNumber = numberMatch[0].replace(/,/g, "");
  const endValue = parseFloat(rawNumber);
  if (!Number.isFinite(endValue)) return;

  const prefix = originalText.slice(0, numberMatch.index);
  const suffix = originalText.slice((numberMatch.index || 0) + numberMatch[0].length);
  const decimals = rawNumber.includes(".") ? rawNumber.split(".")[1].length : 0;

  const duration = 1400;
  const startTime = performance.now();
  const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

  function frame(now) {
    const elapsed = now - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const currentValue = endValue * easeOutCubic(progress);

    const formatted =
      decimals > 0
        ? currentValue.toFixed(decimals)
        : Math.round(currentValue).toLocaleString("en-US");

    el.textContent = `${prefix}${formatted}${suffix}`;

    if (progress < 1) {
      requestAnimationFrame(frame);
    } else {
      el.textContent = originalText;
      el.dataset.counterDone = "1";
    }
  }

  requestAnimationFrame(frame);
}
