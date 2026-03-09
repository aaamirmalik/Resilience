<?php get_header(); ?>

<div
  class="export-wrapper"
>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@100;200;300;400;500;600;700;800;900&family=Geist:wght@100;200;300;400;500;600;700;800;900&family=IBM+Plex+Mono:wght@100;200;300;400;500;600;700&family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@200;300;400;500;600;700;800;900&family=PT+Serif:wght@400;700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&family=Shantell+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
  />
  <html>
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Resilience Counselling - Article Details</title>

      <style id="base-css">
        :root {
          --background: #fbfef9;
          --foreground: #123029;
          --border: #00000014;
          --input: #ffffff;
          --primary: #1b6d12;
          --primary-foreground: #ffffff;
          --secondary: #eaf7ea;
          --secondary-foreground: #123029;
          --muted: #f4f6f5;
          --muted-foreground: #6b7280;
          --success: #16a34a;
          --success-foreground: #ffffff;
          --accent: #9bd34a;
          --accent-foreground: #123029;
          --destructive: #dc2626;
          --destructive-foreground: #ffffff;
          --warning: #f59e0b;
          --warning-foreground: #123029;
          --card: #ffffff;
          --card-foreground: #123029;
          --sidebar: #f2fbf5;
          --sidebar-foreground: #123029;
          --sidebar-primary: #1b6d12;
          --sidebar-primary-foreground: #ffffff;
          --radius-sm: 4px;
          --radius-md: 6px;
          --radius-lg: 8px;
          --radius-xl: 12px;
          --font-family-body:
            system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        * {
          box-sizing: border-box;
          margin: 0;
          padding: 0;
        }
        .export-wrapper {
          background-color: var(--background);
          color: var(--foreground);
          line-height: 1.6;
          font-size: 15px;
          -webkit-font-smoothing: antialiased;
          font-family: var(--font-family-body);
        }
        .page-container {
          display: flex;
          flex-direction: column;
          min-height: 812px;
        }
        .container {
          width: 100%;
          max-width: 1200px;
          margin: 0 auto;
          padding: 0 40px;
        }
        h1,
        h2,
        h3,
        h4,
        h5 {
          font-weight: 700;
          line-height: 1.25;
          color: var(--foreground);
          letter-spacing: -0.01em;
        }
        h1 {
          font-size: 40px;
        }
        h2 {
          font-size: 30px;
        }
        h3 {
          font-size: 22px;
        }
        h4 {
          font-size: 18px;
        }
        p {
          font-size: 15px;
          color: var(--muted-foreground);
        }

        .text-center {
          text-align: center;
        }
      </style>

      <style id="components-css">
        .btn {
          display: inline-flex;
          align-items: center;
          justify-content: center;
          padding: 10px 20px;
          border-radius: var(--radius-xl);
          font-weight: 600;
          font-size: 14px;
          border: 1px solid transparent;
          cursor: pointer;
          text-decoration: none;
          white-space: nowrap;
          gap: 8px;
        }
        .btn-primary {
          background-color: var(--primary);
          color: var(--primary-foreground);
          border-color: var(--primary);
        }
        .btn-outline {
          background-color: transparent;
          color: var(--foreground);
          border-color: var(--border);
        }
        .btn-ghost {
          background-color: transparent;
          color: var(--foreground);
          border-color: transparent;
        }
        .badge {
          display: inline-flex;
          align-items: center;
          padding: 4px 10px;
          background-color: var(--secondary);
          color: var(--secondary-foreground);
          border-radius: var(--radius-xl);
          font-size: 13px;
          font-weight: 500;
          white-space: nowrap;
        }
      </style>

      <style id="layout-css">
        /* Topbar & Navbar */
        .topbar {
          background-color: #102019;
          color: #e5e7eb;
          padding: 6px 0;
          font-size: 13px;
        }
        .topbar-inner {
          display: flex;
          justify-content: space-between;
          align-items: center;
          column-gap: 32px;
        }
        .topbar-group {
          display: flex;
          align-items: center;
          column-gap: 20px;
          row-gap: 4px;
        }
        .topbar span {
          display: flex;
          align-items: center;
          gap: 6px;
          white-space: nowrap;
        }

        .navbar {
          background-color: var(--background);
          border-bottom: 1px solid var(--border);
        }
        .navbar-inner {
          display: flex;
          align-items: center;
          justify-content: space-between;
          height: 76px;
        }
        .brand {
          display: flex;
          align-items: center;
          gap: 12px;
        }
        .brand-logo {
          width: 40px;
          height: 40px;
          border-radius: var(--radius-md);
          background-color: var(--primary);
          display: flex;
          align-items: center;
          justify-content: center;
          color: var(--primary-foreground);
          font-size: 20px;
        }
        .brand-text {
          display: flex;
          flex-direction: column;
          line-height: 1.1;
        }
        .brand-text strong {
          font-size: 18px;
          letter-spacing: 0.08em;
        }
        .brand-text span {
          font-size: 10px;
          letter-spacing: 0.18em;
          text-transform: uppercase;
          color: var(--muted-foreground);
          font-weight: 600;
        }
        .nav-links {
          display: flex;
          align-items: center;
          gap: 28px;
        }
        .nav-links a {
          text-decoration: none;
          color: var(--muted-foreground);
          font-weight: 500;
          font-size: 14px;
        }
        .nav-links a.active {
          color: var(--foreground);
          font-weight: 600;
        }
        .nav-actions {
          display: flex;
          align-items: center;
          gap: 12px;
        }

        /* Footer */
        .footer-main {
          background-color: #0b1410;
          color: #d1d5db;
          padding: 48px 0 32px;
          margin-top: auto;
        }
        .footer-grid {
          display: grid;
          grid-template-columns: 2fr 1.1fr 1.1fr 1.2fr;
          gap: 32px;
        }
        .footer-brand {
          display: flex;
          align-items: center;
          gap: 12px;
          margin-bottom: 16px;
        }
        .footer-logo {
          width: 32px;
          height: 32px;
          border-radius: 8px;
          background-color: #111827;
          display: flex;
          align-items: center;
          justify-content: center;
          color: #bbf7d0;
          font-size: 16px;
        }
        .footer-brand-text strong {
          font-size: 16px;
          letter-spacing: 0.1em;
        }
        .footer-brand-text span {
          font-size: 9px;
          letter-spacing: 0.16em;
          text-transform: uppercase;
          color: #9ca3af;
        }
        .footer-col h5 {
          font-size: 14px;
          margin-bottom: 12px;
          text-transform: uppercase;
          letter-spacing: 0.12em;
          color: #e5e7eb;
        }
        .footer-col ul {
          list-style: none;
          display: flex;
          flex-direction: column;
          gap: 6px;
          font-size: 13px;
        }
        .footer-col a {
          color: #9ca3af;
          text-decoration: none;
          font-weight: 500;
        }
        .footer-col p {
          font-size: 13px;
          color: #9ca3af;
          margin-bottom: 6px;
        }
        .footer-bottom-bar {
          border-top: 1px solid #1f2933;
          margin-top: 32px;
          padding-top: 16px;
          display: flex;
          align-items: center;
          justify-content: space-between;
          font-size: 12px;
          color: #6b7280;
        }
        .footer-bottom-links {
          display: flex;
          gap: 16px;
        }
        .footer-bottom-links a {
          color: #6b7280;
          text-decoration: none;
        }
      </style>

      <style id="article-css">
        .article-wrapper {
          max-width: 800px;
          margin: 0 auto;
          padding: 40px 0;
        }
        .breadcrumb {
          display: flex;
          align-items: center;
          gap: 8px;
          font-size: 14px;
          color: var(--muted-foreground);
          margin-bottom: 32px;
        }
        .breadcrumb a {
          color: var(--primary);
          text-decoration: none;
          font-weight: 500;
        }
        .breadcrumb span {
          color: var(--border);
        }

        .article-hero {
          margin-bottom: 40px;
        }
        .article-tags {
          margin-bottom: 24px;
        }
        .article-hero h1 {
          font-size: 48px;
          line-height: 1.2;
          margin-bottom: 32px;
        }
        .article-meta {
          display: flex;
          align-items: center;
          gap: 16px;
          border-top: 1px solid var(--border);
          border-bottom: 1px solid var(--border);
          padding: 24px 0;
        }
        .article-meta-avatar {
          width: 48px;
          height: 48px;
          border-radius: 50%;
          overflow: hidden;
        }
        .article-meta-avatar img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
        .article-meta-info {
          display: flex;
          flex-direction: column;
          gap: 4px;
        }
        .article-meta-info strong {
          color: var(--foreground);
          font-size: 15px;
        }
        .article-meta-info span {
          color: var(--muted-foreground);
          font-size: 14px;
        }

        .article-image {
          max-width: 1000px;
          margin: 0 auto 56px;
          border-radius: var(--radius-lg);
          overflow: hidden;
          height: 500px;
        }
        .article-image img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        .article-content {
          font-size: 18px;
          line-height: 1.8;
          color: #374151;
          max-width: 800px;
          margin: 0 auto;
        }
        .article-content h2 {
          font-size: 28px;
          color: var(--foreground);
          margin-top: 48px;
          margin-bottom: 20px;
        }
        .article-content h3 {
          font-size: 22px;
          color: var(--foreground);
          margin-top: 32px;
          margin-bottom: 16px;
        }
        .article-content p {
          margin-bottom: 24px;
          color: inherit;
          font-size: inherit;
        }
        .article-content blockquote {
          border-left: 4px solid var(--primary);
          margin: 40px 0;
          padding: 32px;
          font-style: italic;
          font-size: 20px;
          color: var(--foreground);
          background-color: var(--sidebar);
          border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
        }
        .article-content ul {
          margin-bottom: 24px;
          padding-left: 24px;
        }
        .article-content li {
          margin-bottom: 12px;
        }

        .author-box {
          max-width: 800px;
          margin: 64px auto 0;
          display: flex;
          gap: 24px;
          background-color: var(--card);
          border: 1px solid var(--border);
          border-radius: var(--radius-lg);
          padding: 32px;
          align-items: flex-start;
        }
        .author-box-avatar {
          width: 80px;
          height: 80px;
          border-radius: 50%;
          overflow: hidden;
          flex-shrink: 0;
        }
        .author-box-avatar img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
        .author-box-info h3 {
          font-size: 20px;
          margin-bottom: 4px;
        }
        .author-box-info span {
          display: block;
          font-size: 14px;
          color: var(--primary);
          font-weight: 500;
          margin-bottom: 12px;
        }
        .author-box-info p {
          font-size: 15px;
          margin-bottom: 16px;
          line-height: 1.6;
        }

        /* Related Articles Section */
        .related-articles {
          background-color: var(--muted);
          padding: 80px 0;
          margin-top: 80px;
          border-top: 1px solid var(--border);
        }
        .related-articles-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 40px;
        }
        .blog-grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 32px;
        }
        .blog-card {
          background: var(--card);
          border: 1px solid var(--border);
          border-radius: var(--radius-lg);
          overflow: hidden;
          display: flex;
          flex-direction: column;
          box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        }
        .blog-card-image {
          width: 100%;
          height: 200px;
          position: relative;
          background: var(--muted);
        }
        .blog-card-image img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
        .blog-card-content {
          padding: 24px;
          display: flex;
          flex-direction: column;
          flex: 1;
        }
        .blog-card-meta {
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-bottom: 12px;
          font-size: 13px;
        }
        .blog-card-date {
          color: var(--muted-foreground);
        }
        .blog-card h3 {
          font-size: 18px;
          margin-bottom: 12px;
          line-height: 1.4;
          color: var(--foreground);
        }
        .read-more-link {
          display: inline-flex;
          align-items: center;
          gap: 8px;
          font-weight: 600;
          color: var(--primary);
          text-decoration: none;
          font-size: 14px;
          margin-top: 16px;
        }
      </style>
    </head>
    <body>
      <div class="page-container">
        <!-- Topbar -->
        <div class="topbar">
          <div class="container topbar-inner">
            <div class="topbar-group">
              <span>
                <div
                  style="
                    width: 14px;
                    height: 14px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                  "
                >
                  <iconify-icon
                    icon="lucide:clock"
                    style="font-size: 14px; color: #9ca3af"
                  ></iconify-icon>
                </div>
                Mon–Fri, 11:00 AM–7:00 PM
              </span>
              <span>
                <div
                  style="
                    width: 14px;
                    height: 14px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                  "
                >
                  <iconify-icon
                    icon="lucide:map-pin"
                    style="font-size: 14px; color: #9ca3af"
                  ></iconify-icon>
                </div>
                111 Waterloo St Unit 406, London, ON
              </span>
            </div>
            <div class="topbar-group">
              <span>
                <div
                  style="
                    width: 14px;
                    height: 14px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                  "
                >
                  <iconify-icon
                    icon="lucide:phone"
                    style="font-size: 14px; color: #9ca3af"
                  ></iconify-icon>
                </div>
                +1 (548) 866-0366
              </span>
              <span>
                <div
                  style="
                    width: 14px;
                    height: 14px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                  "
                >
                  <iconify-icon
                    icon="lucide:mail"
                    style="font-size: 14px; color: #9ca3af"
                  ></iconify-icon>
                </div>
                mail@resiliencec.com
              </span>
            </div>
          </div>
        </div>

        <!-- Navbar -->
        <header class="navbar">
          <div class="container navbar-inner">
            <div class="brand">
              <div class="brand-logo">
                <div
                  style="
                    width: 20px;
                    height: 20px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                  "
                >
                  <iconify-icon
                    icon="lucide:leaf"
                    style="font-size: 20px; color: var(--primary-foreground)"
                  ></iconify-icon>
                </div>
              </div>
              <div class="brand-text">
                <strong>RESILIENCE</strong>
                <span>COUNSELLING</span>
              </div>
            </div>
            <nav class="nav-links">
              <a href="#" data-media-type="banani-button">Home</a>
              <a href="#" data-media-type="banani-button">About</a>
              <a href="#" data-media-type="banani-button">Services</a>
              <a href="#" data-media-type="banani-button">Team</a>
              <a href="#" class="active" data-media-type="banani-button"
                >Blog</a
              >
              <a href="#" data-media-type="banani-button">Contact</a>
            </nav>
            <div class="nav-actions">
              <button class="btn btn-outline" data-media-type="banani-button">
                Clinician Login
              </button>
              <button class="btn btn-primary" data-media-type="banani-button">
                Make an Appointment
              </button>
            </div>
          </div>
        </header>

        <!-- Article Content -->
        <main>
          <div class="container">
            <div class="article-wrapper">
              <!-- Breadcrumb -->
              <div class="breadcrumb">
                <a href="#" data-media-type="banani-button">Home</a>
                <span>/</span>
                <a href="#" data-media-type="banani-button">Blog</a>
                <span>/</span>
                <span style="color: var(--foreground)"
                  >Mental Health of Refugee and Asylum Seekers</span
                >
              </div>

              <!-- Hero -->
              <div class="article-hero">
                <div class="article-tags">
                  <span class="badge">Refugees</span>
                </div>
                <h1>
                  Unlocking the Key to Resilience: Examining the Mental Health
                  of Refugee and Asylum Seekers
                </h1>
                <div class="article-meta">
                  <div class="article-meta-avatar">
                    <img
                      src="https://storage.googleapis.com/banani-avatars/avatar%2Fmale%2F35-50%2FMiddle%20Eastern%2F1"
                      alt="Amjed Abojedi"
                    />
                  </div>
                  <div class="article-meta-info">
                    <strong>Amjed Abojedi, PhD, RP</strong>
                    <span>Jan 31, 2023 • 6 min read</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Featured Image -->
            <div class="article-image">
              <img
                src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?auto=format&amp;fit=crop&amp;q=80&amp;w=1200"
                alt="Refugee Mental Health"
              />
            </div>

            <!-- Content Body -->
            <div class="article-content">
              <p>
                The journey of a refugee or asylum seeker is often characterized
                by unimaginable hardship, displacement, and profound loss.
                Forced to flee their homes due to conflict, persecution, or
                natural disasters, these individuals face multifaceted
                challenges that significantly impact their mental well-being.
                Yet, amidst the adversity, a remarkable phenomenon often
                emerges: resilience.
              </p>

              <h2>The Psychological Toll of Displacement</h2>
              <p>
                Understanding the mental health landscape of refugees requires
                acknowledging the continuous spectrum of trauma they navigate.
                This trauma is rarely isolated to a single event; rather, it
                spans across three critical phases of displacement:
              </p>
              <ul>
                <li>
                  <strong>Pre-flight trauma:</strong> Exposure to war, violence,
                  torture, or the sudden loss of loved ones and property.
                </li>
                <li>
                  <strong>Flight trauma:</strong> The perilous journey involving
                  unsafe routes, family separation, and lack of basic
                  necessities.
                </li>
                <li>
                  <strong>Post-migration stress:</strong> The ongoing challenges
                  of resettlement, including language barriers, discrimination,
                  loss of professional status, and navigating complex asylum
                  legalities.
                </li>
              </ul>
              <p>
                These compounded stressors frequently manifest as Post-Traumatic
                Stress Disorder (PTSD), severe anxiety, depression, and somatic
                complaints. However, viewing refugees solely through the lens of
                psychological deficit ignores their inherent capacity to survive
                and adapt.
              </p>

              <blockquote>
                "Resilience is not the absence of distress or trauma, but rather
                the extraordinary capacity of individuals to navigate adversity
                and rebuild meaning in their lives despite profound loss."
              </blockquote>

              <h2>Resilience as a Transformative Process</h2>
              <p>
                Resilience in the context of displacement is not simply
                "bouncing back" to a previous state—as that previous state often
                no longer exists. Instead, it is a transformative process of
                adaptation and growth. It involves forging new identities,
                finding community in unfamiliar places, and drawing strength
                from cultural and spiritual resources.
              </p>
              <p>
                Several key factors contribute to unlocking this resilience:
              </p>
              <ul>
                <li>
                  <strong>Social Support and Community:</strong> Connection with
                  both their own cultural community and the host society
                  provides a critical buffer against isolation.
                </li>
                <li>
                  <strong>Cultural and Spiritual Beliefs:</strong> Faith and
                  cultural traditions offer frameworks for meaning-making and
                  coping with trauma.
                </li>
                <li>
                  <strong>Agency and Purpose:</strong> Opportunities to work,
                  volunteer, or support family members restore a sense of
                  control and dignity.
                </li>
              </ul>

              <h2>Evidence-Based Therapeutic Approaches</h2>
              <p>
                At Resilience Counselling, we recognize that traditional Western
                psychological models must be adapted to effectively serve
                refugee populations. A culturally sensitive, trauma-informed
                approach is non-negotiable.
              </p>
              <p>
                Therapeutic interventions must prioritize establishing profound
                safety and trust before processing trauma. Techniques such as
                Narrative Exposure Therapy (NET) have shown significant
                efficacy, allowing individuals to contextualize their trauma
                within their broader life story, recognizing their survival
                skills alongside their suffering.
              </p>

              <h2>Moving Forward</h2>
              <p>
                Examining the mental health of refugees and asylum seekers is a
                dual process: we must actively treat the deep wounds of trauma
                while simultaneously nurturing the seeds of resilience. By
                providing culturally informed, empathetic care, we can help
                these resilient individuals transition from mere survival to
                genuine flourishing in their new communities.
              </p>
            </div>

            <!-- Author Box -->
            <div class="author-box">
              <div class="author-box-avatar">
                <img
                  src="https://storage.googleapis.com/banani-avatars/avatar%2Fmale%2F35-50%2FMiddle%20Eastern%2F1"
                  alt="Amjed Abojedi"
                />
              </div>
              <div class="author-box-info">
                <h3>Amjed Abojedi, PhD, RP</h3>
                <span>Registered Psychotherapist</span>
                <p>
                  With 17 years of experience, Dr. Abojedi specializes in
                  trauma-informed care and culturally sensitive psychotherapy
                  for both children and adults. He is passionate about
                  supporting newcomers and refugees in their journey toward
                  healing and growth.
                </p>
                <a
                  href="#"
                  class="btn btn-outline"
                  style="padding: 6px 16px; font-size: 13px"
                  data-media-type="banani-button"
                  >View Profile</a
                >
              </div>
            </div>
          </div>
        </main>

        <!-- Related Articles -->
        <section class="related-articles">
          <div class="container">
            <div class="related-articles-header">
              <h2>More from our blog</h2>
              <a
                href="#"
                class="btn btn-outline"
                data-media-type="banani-button"
                >View All Articles</a
              >
            </div>
            <div class="blog-grid">
              <!-- Card 1 -->
              <article class="blog-card">
                <div class="blog-card-image">
                  <img
                    src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&amp;fit=crop&amp;q=80&amp;w=800"
                    alt="Therapy session"
                  />
                </div>
                <div class="blog-card-content">
                  <div class="blog-card-meta">
                    <span class="badge">Refugees</span>
                    <span class="blog-card-date">Mar 5, 2023</span>
                  </div>
                  <h3>
                    Psychotherapy as an Essential Intervention for Supporting
                    Refugee Youth
                  </h3>
                  <div style="margin-top: auto">
                    <a
                      href="#"
                      class="read-more-link"
                      data-media-type="banani-button"
                    >
                      Read Article
                      <div
                        style="
                          width: 16px;
                          height: 16px;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                        "
                      >
                        <iconify-icon
                          icon="lucide:arrow-right"
                          style="font-size: 16px"
                        ></iconify-icon>
                      </div>
                    </a>
                  </div>
                </div>
              </article>

              <!-- Card 2 -->
              <article class="blog-card">
                <div class="blog-card-image">
                  <img
                    src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&amp;fit=crop&amp;q=80&amp;w=800"
                    alt="Integration of Refugees"
                  />
                </div>
                <div class="blog-card-content">
                  <div class="blog-card-meta">
                    <span class="badge">Refugees</span>
                    <span class="blog-card-date">Jan 31, 2023</span>
                  </div>
                  <h3>
                    Integration of Refugees into Canadian Society: Psychological
                    Perspectives
                  </h3>
                  <div style="margin-top: auto">
                    <a
                      href="#"
                      class="read-more-link"
                      data-media-type="banani-button"
                    >
                      Read Article
                      <div
                        style="
                          width: 16px;
                          height: 16px;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                        "
                      >
                        <iconify-icon
                          icon="lucide:arrow-right"
                          style="font-size: 16px"
                        ></iconify-icon>
                      </div>
                    </a>
                  </div>
                </div>
              </article>

              <!-- Card 3 -->
              <article class="blog-card">
                <div class="blog-card-image">
                  <img
                    src="https://images.unsplash.com/photo-1542282088-fe8426682b8f?auto=format&amp;fit=crop&amp;q=80&amp;w=800"
                    alt="MVA Consequences"
                  />
                </div>
                <div class="blog-card-content">
                  <div class="blog-card-meta">
                    <span class="badge">Motor Vehicle Accident</span>
                    <span class="blog-card-date">Jan 21, 2023</span>
                  </div>
                  <h3>
                    Psychotherapy for Individuals Suffering from MVA
                    Consequences
                  </h3>
                  <div style="margin-top: auto">
                    <a
                      href="#"
                      class="read-more-link"
                      data-media-type="banani-button"
                    >
                      Read Article
                      <div
                        style="
                          width: 16px;
                          height: 16px;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                        "
                      >
                        <iconify-icon
                          icon="lucide:arrow-right"
                          style="font-size: 16px"
                        ></iconify-icon>
                      </div>
                    </a>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </section>

        <!-- Footer -->
        <footer class="footer-main">
          <div class="container">
            <div class="footer-grid">
              <div class="footer-col">
                <div class="footer-brand">
                  <div class="footer-logo">
                    <div
                      style="
                        width: 16px;
                        height: 16px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                      "
                    >
                      <iconify-icon
                        icon="lucide:leaf"
                        style="font-size: 16px; color: #bbf7d0"
                      ></iconify-icon>
                    </div>
                  </div>
                  <div class="footer-brand-text">
                    <strong>RESILIENCE</strong>
                    <span>COUNSELLING</span>
                  </div>
                </div>
                <p>111 Waterloo St Unit 406<br />London, ON N6B 2M4</p>
                <p>Phone: +1 (548) 866-0366<br />Email: mail@resiliencec.com</p>
                <p>
                  Mon–Fri: 11:00 AM – 7:00 PM<br />Weekends &amp; holidays:
                  Closed
                </p>
              </div>
              <div class="footer-col">
                <h5>Services</h5>
                <ul>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Adult counselling</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Child &amp; youth counselling</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Family counselling</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Refugee support</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Anger management</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >MVA counselling</a
                    >
                  </li>
                </ul>
              </div>
              <div class="footer-col">
                <h5>Clinic</h5>
                <ul>
                  <li><a href="#" data-media-type="banani-button">About</a></li>
                  <li>
                    <a href="#" data-media-type="banani-button">Our team</a>
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Training &amp; workshops</a
                    >
                  </li>
                  <li><a href="#" data-media-type="banani-button">Blog</a></li>
                  <li>
                    <a href="#" data-media-type="banani-button">Contact</a>
                  </li>
                </ul>
              </div>
              <div class="footer-col">
                <h5>Practical information</h5>
                <ul>
                  <li>Confidential, private services</li>
                  <li>Evidence-based, trauma-informed care</li>
                  <li>Culturally sensitive, multilingual support</li>
                  <li>Online sessions available across Ontario</li>
                </ul>
              </div>
            </div>
            <div class="footer-bottom-bar">
              <div>© 2025 Resilience Counselling. All rights reserved.</div>
              <div class="footer-bottom-links">
                <a href="#" data-media-type="banani-button">Privacy Policy</a>
                <a href="#" data-media-type="banani-button">Terms of Service</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </body>
  </html>
  <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>
  <style>
    :root {
      --background: #fbfef9;
      --foreground: #123029;
      --border: #00000014;
      --input: #ffffff;
      --primary: #1b6d12;
      --primary-foreground: #ffffff;
      --secondary: #eaf7ea;
      --secondary-foreground: #123029;
      --muted: #f4f6f5;
      --muted-foreground: #6b7280;
      --success: #16a34a;
      --success-foreground: #ffffff;
      --accent: #9bd34a;
      --accent-foreground: #123029;
      --destructive: #dc2626;
      --destructive-foreground: #ffffff;
      --warning: #f59e0b;
      --warning-foreground: #123029;
      --card: #ffffff;
      --card-foreground: #123029;
      --sidebar: #f2fbf5;
      --sidebar-foreground: #123029;
      --sidebar-primary: #1b6d12;
      --sidebar-primary-foreground: #ffffff;
      --radius-sm: 4px;
      --radius-md: 6px;
      --radius-lg: 8px;
      --radius-xl: 12px;
      --font-family-body: Inter;
    }
  </style>
</div>


<?php get_footer(); ?>
