document.addEventListener("DOMContentLoaded", function () {
  initDesktopDragScroll();

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
    el.style.setProperty("--reveal-delay-am", `${(index % 7) * 120}ms`);
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

  initContactFormAjax();
});

function initDesktopDragScroll() {
  const scrollRows = document.querySelectorAll(".team-filters-am");
  if (!scrollRows.length) return;

  scrollRows.forEach((row) => {
    let isDragging = false;
    let startX = 0;
    let startScrollLeft = 0;
    let moved = false;
    let blockNextClick = false;

    const isDesktop = () => window.matchMedia("(min-width: 769px)").matches;

    row.addEventListener("dragstart", (event) => {
      event.preventDefault();
    });

    row.addEventListener("mousedown", (event) => {
      if (!isDesktop() || event.button !== 0) return;

      isDragging = true;
      moved = false;
      startX = event.pageX;
      startScrollLeft = row.scrollLeft;
      row.classList.add("is-dragging-am");
    });

    row.addEventListener("mousemove", (event) => {
      if (!isDragging) return;
      event.preventDefault();

      const distance = event.pageX - startX;
      if (Math.abs(distance) > 4) {
        moved = true;
      }
      row.scrollLeft = startScrollLeft - distance;
    });

    const stopDragging = () => {
      if (!isDragging) return;
      isDragging = false;
      row.classList.remove("is-dragging-am");

      if (moved) {
        blockNextClick = true;
        setTimeout(() => {
          blockNextClick = false;
        }, 0);
      }
    };

    row.addEventListener("mouseleave", stopDragging);
    window.addEventListener("mouseup", stopDragging);

    row.addEventListener(
      "click",
      (event) => {
        if (!blockNextClick) return;
        event.preventDefault();
        event.stopPropagation();
      },
      true
    );
  });
}

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

  const duration = 3000;
  const startTime = performance.now();
  const easeOutQuart = (t) => 1 - Math.pow(1 - t, 4);

  function frame(now) {
    const elapsed = now - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const currentValue = endValue * easeOutQuart(progress);

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

function initContactFormAjax() {
  const form = document.querySelector("#contact-form-am");
  if (!form) return;

  const submitBtn = form.querySelector('button[type="submit"]');
  const statusEl = form.querySelector("#contact-form-status-am");
  const defaultBtnLabel = submitBtn?.dataset.defaultLabel || "Send Message";

  const setStatus = (message, type) => {
    if (!statusEl) return;
    statusEl.textContent = message || "";
    statusEl.classList.add("is-visible-am");
    statusEl.classList.remove("is-success-am", "is-error-am");
    statusEl.classList.add(type === "success" ? "is-success-am" : "is-error-am");
  };

  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    if (!window.resilienceAjax || !window.resilienceAjax.ajaxUrl) {
      setStatus("AJAX configuration is missing.", "error");
      return;
    }

    const firstName = form.querySelector('input[name="first_name"]')?.value.trim();
    const lastName = form.querySelector('input[name="last_name"]')?.value.trim();
    const email = form.querySelector('input[name="email"]')?.value.trim();
    const reason = form.querySelector('select[name="reason"]')?.value.trim();

    if (!firstName || !lastName || !email || !reason) {
      setStatus("Please complete all required fields.", "error");
      return;
    }

    const formData = new FormData(form);
    formData.set("nonce", window.resilienceAjax.nonce || "");

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = window.resilienceAjax.sendingText || "Sending...";
    }

    try {
      const response = await fetch(window.resilienceAjax.ajaxUrl, {
        method: "POST",
        body: formData,
      });
      const result = await response.json();

      if (result?.success) {
        setStatus(
          result?.data?.message || window.resilienceAjax.successText || "Message sent.",
          "success"
        );
        form.reset();
      } else {
        setStatus(
          result?.data?.message || window.resilienceAjax.errorText || "Unable to send message.",
          "error"
        );
      }
    } catch (error) {
      setStatus(window.resilienceAjax.errorText || "Unable to send message.", "error");
    } finally {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.textContent = defaultBtnLabel;
      }
    }
  });
}
