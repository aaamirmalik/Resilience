<?php
/**
 * Template Name: Services Page
 */

?>
<?php get_header() ?>

<div
  class="export-wrapper"
  style="
    width: 375px;
    min-height: 812px;
    position: relative;
    font-family: var(--font-family-body);
    background-color: var(--background);
  "
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
      <title>Resilience Counselling - Services</title>

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
          display: flex;
          flex-direction: column;
          min-height: 100vh;
        }
        .page-container {
          display: flex;
          flex-direction: column;
          flex: 1;
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
          font-size: 32px;
        }
        h3 {
          font-size: 24px;
        }
        h4 {
          font-size: 18px;
        }
        p {
          font-size: 15px;
          color: var(--muted-foreground);
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
        .btn-lg {
          padding: 14px 28px;
          font-size: 16px;
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
        .btn-secondary {
          background-color: var(--secondary);
          color: var(--primary);
        }
        .section-title-wrapper {
          text-align: center;
          margin-bottom: 48px;
        }
        .section-subtitle {
          color: var(--primary);
          font-weight: 600;
          font-size: 14px;
          text-transform: uppercase;
          letter-spacing: 0.05em;
          margin-bottom: 12px;
          display: block;
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
          padding: 64px 0 32px;
          margin-top: auto;
        }
        .footer-grid {
          display: grid;
          grid-template-columns: 2fr 1.1fr 1.1fr 1.2fr;
          gap: 48px;
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
          margin-bottom: 16px;
          text-transform: uppercase;
          letter-spacing: 0.12em;
          color: #e5e7eb;
        }
        .footer-col ul {
          list-style: none;
          display: flex;
          flex-direction: column;
          gap: 10px;
          font-size: 14px;
        }
        .footer-col a {
          color: #9ca3af;
          text-decoration: none;
          font-weight: 500;
        }
        .footer-col p {
          font-size: 14px;
          color: #9ca3af;
          margin-bottom: 8px;
        }
        .footer-bottom-bar {
          border-top: 1px solid #1f2933;
          margin-top: 48px;
          padding-top: 24px;
          display: flex;
          align-items: center;
          justify-content: space-between;
          font-size: 13px;
          color: #6b7280;
        }
        .footer-bottom-links {
          display: flex;
          gap: 24px;
        }
        .footer-bottom-links a {
          color: #6b7280;
          text-decoration: none;
        }
      </style>

      <style id="services-page-css">
        /* Intro Section */
        .services-hero {
          padding: 80px 0;
          background-color: var(--sidebar);
        }
        .services-hero-grid {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 64px;
          align-items: center;
        }
        .services-hero-content h1 {
          font-size: 44px;
          margin-bottom: 24px;
        }
        .services-hero-content p {
          font-size: 18px;
          margin-bottom: 24px;
          line-height: 1.7;
        }
        .services-hero-stats {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 24px;
          margin-top: 40px;
          padding-top: 32px;
          border-top: 1px solid var(--border);
        }
        .stat-item h4 {
          font-size: 32px;
          color: var(--primary);
          margin-bottom: 4px;
        }
        .stat-item p {
          font-size: 13px;
          font-weight: 500;
          text-transform: uppercase;
          letter-spacing: 0.05em;
        }
        .services-hero-image {
          border-radius: var(--radius-lg);
          overflow: hidden;
          box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        .services-hero-image img {
          width: 100%;
          height: auto;
          display: block;
        }

        /* What we offer cards */
        .services-grid-section {
          padding: 96px 0;
        }
        .service-cards {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 32px;
        }
        .service-card {
          background: var(--card);
          border: 1px solid var(--border);
          border-radius: var(--radius-lg);
          overflow: hidden;
          display: flex;
          flex-direction: column;
          transition: transform 0.2s;
        }
        .service-card-img {
          height: 200px;
          background: var(--muted);
        }
        .service-card-img img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
        .service-card-content {
          padding: 32px;
          flex: 1;
          display: flex;
          flex-direction: column;
        }
        .service-card-content h3 {
          margin-bottom: 12px;
        }
        .service-card-content p {
          margin-bottom: 24px;
          flex: 1;
        }
        .service-link {
          display: inline-flex;
          align-items: center;
          gap: 8px;
          color: var(--primary);
          font-weight: 600;
          text-decoration: none;
          margin-top: auto;
        }

        /* Why Choose Us */
        .why-choose-section {
          padding: 96px 0;
          background-color: var(--sidebar);
        }
        .cta-banner {
          background-color: var(--primary);
          color: var(--primary-foreground);
          padding: 40px;
          border-radius: var(--radius-lg);
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-bottom: 64px;
        }
        .cta-banner h3 {
          color: var(--primary-foreground);
          margin-bottom: 8px;
          font-size: 28px;
        }
        .cta-banner p {
          color: rgba(255, 255, 255, 0.8);
          font-size: 16px;
        }
        .cta-banner .btn {
          background-color: var(--primary-foreground);
          color: var(--primary);
        }

        .pillars-grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 40px;
        }
        .pillar-item {
          background: var(--card);
          padding: 32px;
          border-radius: var(--radius-lg);
          border: 1px solid var(--border);
        }
        .pillar-icon {
          width: 48px;
          height: 48px;
          background-color: var(--secondary);
          color: var(--primary);
          border-radius: var(--radius-md);
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom: 20px;
        }
        .pillar-item h4 {
          margin-bottom: 12px;
        }

        /* Advantages / Success / Results */
        .approach-section {
          padding: 96px 0;
        }
        .approach-grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 48px;
        }
        .approach-col h3 {
          font-size: 24px;
          margin-bottom: 24px;
          display: flex;
          align-items: center;
          gap: 12px;
        }
        .approach-col h3 .icon-wrapper {
          color: var(--primary);
        }
        .approach-list {
          list-style: none;
        }
        .approach-list li {
          position: relative;
          padding-left: 28px;
          margin-bottom: 16px;
          color: var(--muted-foreground);
        }
        .approach-list li::before {
          content: "";
          position: absolute;
          left: 0;
          top: 6px;
          width: 16px;
          height: 16px;
          background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%231b6d12' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E");
          background-size: contain;
          background-repeat: no-repeat;
        }
        .approach-text {
          color: var(--muted-foreground);
          margin-bottom: 16px;
        }

        /* Team Teaser */
        .team-teaser-section {
          padding: 96px 0;
          background-color: var(--sidebar);
        }
        .team-grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 32px;
          margin-top: 48px;
        }
        .team-card {
          background: var(--card);
          border: 1px solid var(--border);
          border-radius: var(--radius-lg);
          padding: 32px;
          text-align: center;
        }
        .team-avatar {
          width: 120px;
          height: 120px;
          border-radius: 50%;
          margin: 0 auto 20px;
          object-fit: cover;
        }
        .team-card h4 {
          margin-bottom: 4px;
        }
        .team-role {
          color: var(--primary);
          font-size: 14px;
          font-weight: 500;
          margin-bottom: 16px;
        }

        /* FAQ */
        .faq-section {
          padding: 96px 0;
          max-width: 800px;
          margin: 0 auto;
        }
        .faq-item {
          border: 1px solid var(--border);
          border-radius: var(--radius-lg);
          margin-bottom: 16px;
          overflow: hidden;
        }
        .faq-question {
          padding: 24px;
          background-color: var(--card);
          font-weight: 600;
          font-size: 16px;
          display: flex;
          justify-content: space-between;
          align-items: center;
          cursor: pointer;
        }
        .faq-answer {
          padding: 0 24px 24px;
          background-color: var(--card);
          color: var(--muted-foreground);
          border-top: 1px solid var(--border);
          margin-top: -1px;
          padding-top: 24px;
        }
        .faq-answer ul {
          margin-top: 16px;
          padding-left: 20px;
        }
        .faq-answer li {
          margin-bottom: 8px;
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
              <a href="#" class="active" data-media-type="banani-button"
                >Services</a
              >
              <a href="#" data-media-type="banani-button">Team</a>
              <a href="#" data-media-type="banani-button">Blog</a>
              <a href="#" data-media-type="banani-button">Contact</a>
            </nav>
            <div class="nav-actions">
              <button class="btn btn-outline" data-media-type="banani-button">
                Request Free Consultation
              </button>
              <button class="btn btn-primary" data-media-type="banani-button">
                Make an Appointment
              </button>
            </div>
          </div>
        </header>

        <!-- Main Content -->
        <main>
          <!-- Intro Section -->
          <section class="services-hero">
            <div class="container services-hero-grid">
              <div class="services-hero-content">
                <span class="section-subtitle">Services</span>
                <h1>Learn about our Psychotherapy and Counseling Services</h1>
                <p>
                  Our team is ready to support you. We are a team offering
                  Psychotherapy and Counseling Services offered in five
                  different languages. Our goal is to provide a safe and
                  supportive environment.
                </p>
                <p>
                  We use research-based practices while acknowledging cultural
                  differences to ensure you receive the most effective care
                  tailored to your unique background.
                </p>

                <div class="services-hero-stats">
                  <div class="stat-item">
                    <h4>17+</h4>
                    <p>Years of Experience</p>
                  </div>
                  <div class="stat-item">
                    <h4>8</h4>
                    <p>In-House Specialists</p>
                  </div>
                  <div class="stat-item">
                    <h4>1510+</h4>
                    <p>Successful Sessions</p>
                  </div>
                </div>
              </div>
              <div class="services-hero-image">
                <img
                  data-aspect-ratio="4:3"
                  data-query="calm modern therapy room interior with green plants"
                  alt="Therapy Room"
                  src="https://storage.googleapis.com/banani-generated-images/generated-images/1ba01b66-82a7-4ea7-8e12-278f0e44fc5a.jpg"
                />
              </div>
            </div>
          </section>

          <!-- What we offer -->
          <section class="services-grid-section">
            <div class="container">
              <div class="section-title-wrapper">
                <span class="section-subtitle">What We Offer For You</span>
                <h2>Therapies &amp; Treatments</h2>
              </div>

              <div class="service-cards">
                <!-- Card 1 -->
                <div class="service-card">
                  <div class="service-card-img">
                    <img
                      data-aspect-ratio="4:3"
                      data-query="one on one therapy session calm conversation"
                      alt="Individual Counselling"
                      src="https://storage.googleapis.com/banani-generated-images/generated-images/b87f97ee-5a20-4511-bce7-39ebdded4ab8.jpg"
                    />
                  </div>
                  <div class="service-card-content">
                    <h3>Individual Counselling</h3>
                    <p>
                      Individual differences serve as trademarks of human
                      beings. Addressing personal challenges with focused,
                      one-on-one professional support.
                    </p>
                    <a
                      href="#"
                      class="service-link"
                      data-media-type="banani-button"
                    >
                      Learn More
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

                <!-- Card 2 -->
                <div class="service-card">
                  <div class="service-card-img">
                    <img
                      data-aspect-ratio="4:3"
                      data-query="family counseling session supportive environment"
                      alt="Family Counselling"
                      src="https://storage.googleapis.com/banani-generated-images/generated-images/ae9b353b-e495-4fff-857a-92aa88865f72.jpg"
                    />
                  </div>
                  <div class="service-card-content">
                    <h3>Family Counselling</h3>
                    <p>
                      Through Family Counselling, families are provided with the
                      space and guidance to navigate conflicts and strengthen
                      their relationships together.
                    </p>
                    <a
                      href="#"
                      class="service-link"
                      data-media-type="banani-button"
                    >
                      Learn More
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

                <!-- Card 3 -->
                <div class="service-card">
                  <div class="service-card-img">
                    <img
                      data-aspect-ratio="4:3"
                      data-query="calm peaceful nature abstract green tones"
                      alt="Anger Management"
                      src="https://storage.googleapis.com/banani-generated-images/generated-images/f61a90ce-43a7-4480-b0cd-9ae72a43ba06.jpg"
                    />
                  </div>
                  <div class="service-card-content">
                    <h3>Anger management</h3>
                    <p>
                      Anger management is a type of counseling that can help
                      people better understand and control their emotional
                      responses to triggers.
                    </p>
                    <a
                      href="#"
                      class="service-link"
                      data-media-type="banani-button"
                    >
                      Learn More
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

                <!-- Card 4 -->
                <div class="service-card">
                  <div class="service-card-img">
                    <img
                      data-aspect-ratio="4:3"
                      data-query="supportive group therapy diverse inclusive"
                      alt="Refugee Counselling"
                      src="https://storage.googleapis.com/banani-generated-images/generated-images/36701513-e41e-4743-b8ee-661690acaa54.jpg"
                    />
                  </div>
                  <div class="service-card-content">
                    <h3>Refugee counselling</h3>
                    <p>
                      Post-migration challenges: addressing discrimination,
                      language barriers, and difficulty transitioning with
                      specialized trauma-informed care.
                    </p>
                    <a
                      href="#"
                      class="service-link"
                      data-media-type="banani-button"
                    >
                      Learn More
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

                <!-- Card 5 -->
                <div class="service-card">
                  <div class="service-card-img">
                    <img
                      data-aspect-ratio="4:3"
                      data-query="rehabilitation physical therapy calm supportive"
                      alt="MVA Counselling"
                      src="https://storage.googleapis.com/banani-generated-images/generated-images/662d6220-ab65-43e2-ba92-05ffad6a8ff4.jpg"
                    />
                  </div>
                  <div class="service-card-content">
                    <h3>Motor vehicle accident (MVA)</h3>
                    <p>
                      Signages posted anywhere remind motorists and drivers of
                      their safety. We help victims cope with the mental and
                      behavioral effects of MVA incidents.
                    </p>
                    <a
                      href="#"
                      class="service-link"
                      data-media-type="banani-button"
                    >
                      Learn More
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

                <!-- Card 6 -->
                <div class="service-card">
                  <div class="service-card-img">
                    <img
                      data-aspect-ratio="4:3"
                      data-query="university student studying peacefully campus life"
                      alt="Student Counselling"
                      src="https://storage.googleapis.com/banani-generated-images/generated-images/f3fa00a5-4581-4842-8286-ca4fc02380ac.jpg"
                    />
                  </div>
                  <div class="service-card-content">
                    <h3>University &amp; College Student</h3>
                    <p>
                      University and college student counselling and
                      psychotherapy can be essential for managing academic
                      stress, anxiety, and life transitions.
                    </p>
                    <a
                      href="#"
                      class="service-link"
                      data-media-type="banani-button"
                    >
                      Learn More
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
              </div>
            </div>
          </section>

          <!-- Why Choose Us -->
          <section class="why-choose-section">
            <div class="container">
              <div class="cta-banner">
                <div>
                  <h3>Get a Consultation Right Now!</h3>
                  <p>
                    Our professional and experienced team is ready to listen.
                  </p>
                </div>
                <div class="nav-actions">
                  <div
                    style="
                      font-size: 24px;
                      font-weight: 700;
                      color: white;
                      margin-right: 16px;
                    "
                  >
                    Call: +1 (226) 721-0161
                  </div>
                  <button
                    class="btn btn-lg"
                    style="background: white; color: var(--primary)"
                    data-media-type="banani-button"
                  >
                    Book Online
                  </button>
                </div>
              </div>

              <div class="section-title-wrapper">
                <h2>Why Choose Us</h2>
              </div>

              <div class="pillars-grid">
                <div class="pillar-item">
                  <div class="pillar-icon">
                    <iconify-icon
                      icon="lucide:shield-check"
                      style="font-size: 24px"
                    ></iconify-icon>
                  </div>
                  <h4>Confidentiality</h4>
                  <p>
                    We maintain strict confidentiality and prioritize your
                    privacy protection throughout your therapeutic journey.
                  </p>
                </div>
                <div class="pillar-item">
                  <div class="pillar-icon">
                    <iconify-icon
                      icon="lucide:award"
                      style="font-size: 24px"
                    ></iconify-icon>
                  </div>
                  <h4>Professionalism</h4>
                  <p>
                    Our services strictly meet professional standards, ensuring
                    you receive high-quality, ethical care.
                  </p>
                </div>
                <div class="pillar-item">
                  <div class="pillar-icon">
                    <iconify-icon
                      icon="lucide:heart-handshake"
                      style="font-size: 24px"
                    ></iconify-icon>
                  </div>
                  <h4>Support</h4>
                  <p>
                    We are dedicated to arranging access to the extended
                    community support and resources our clients need.
                  </p>
                </div>
                <div class="pillar-item">
                  <div class="pillar-icon">
                    <iconify-icon
                      icon="lucide:book-open"
                      style="font-size: 24px"
                    ></iconify-icon>
                  </div>
                  <h4>Work Experience</h4>
                  <p>
                    Delivering "culture-informed psychotherapy" using the best
                    practices and latest research findings.
                  </p>
                </div>
                <div class="pillar-item">
                  <div class="pillar-icon">
                    <iconify-icon
                      icon="lucide:trending-up"
                      style="font-size: 24px"
                    ></iconify-icon>
                  </div>
                  <h4>Development</h4>
                  <p>
                    Continuously improving our professional skills to
                    effectively help clients reach their personal goals.
                  </p>
                </div>
                <div class="pillar-item">
                  <div class="pillar-icon">
                    <iconify-icon
                      icon="lucide:clock"
                      style="font-size: 24px"
                    ></iconify-icon>
                  </div>
                  <h4>Reliability</h4>
                  <p>
                    We will never leave you in a time of need. Offering reliable
                    scheduling and free initial consultations.
                  </p>
                </div>
              </div>
            </div>
          </section>

          <!-- Advantages / Success / Results -->
          <section class="approach-section">
            <div class="container">
              <div class="section-title-wrapper">
                <p
                  style="max-width: 800px; margin: 0 auto 48px; font-size: 18px"
                >
                  We provide a secure, confidential, non-judgmental environment
                  in warm counseling and therapy settings.
                </p>
              </div>

              <div class="approach-grid">
                <div class="approach-col">
                  <h3>
                    <div class="icon-wrapper">
                      <iconify-icon
                        icon="lucide:check-circle"
                        style="font-size: 24px"
                      ></iconify-icon>
                    </div>
                    Advantages
                  </h3>
                  <p class="approach-text">
                    We have training and experience in main evidence-based
                    psychotherapies, working flexibly and collaboratively to
                    tailor therapy per person.
                  </p>
                  <ul class="approach-list">
                    <li>Free initial telephone consultation</li>
                    <li>Short waiting list / quick access</li>
                    <li>Confidential service</li>
                    <li>Support and access to community resources</li>
                  </ul>
                </div>
                <div class="approach-col">
                  <h3>
                    <div class="icon-wrapper">
                      <iconify-icon
                        icon="lucide:star"
                        style="font-size: 24px"
                      ></iconify-icon>
                    </div>
                    Success
                  </h3>
                  <p class="approach-text">
                    We describe counselling and psychotherapy as life-changing.
                    We aim to strengthen clients with "resilience" and support
                    them through a "transformation journey."
                  </p>
                  <p class="approach-text">
                    Our team continuously monitors changes and gathers feedback
                    throughout the psychotherapy process to ensure success.
                  </p>
                </div>
                <div class="approach-col">
                  <h3>
                    <div class="icon-wrapper">
                      <iconify-icon
                        icon="lucide:bar-chart-2"
                        style="font-size: 24px"
                      ></iconify-icon>
                    </div>
                    Results
                  </h3>
                  <p class="approach-text">
                    We have achieved meaningful outcomes across diverse groups:
                  </p>
                  <ul class="approach-list">
                    <li>
                      Supported mental health of hundreds of immigrants and
                      refugees
                    </li>
                    <li>
                      Helped many affected by MVA incidents cope with behavioral
                      effects
                    </li>
                    <li>
                      Supported victims of domestic abuse via empowerment-based
                      psychotherapy
                    </li>
                    <li>
                      Provided ongoing community-based mental health support
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>

          <!-- Team Teaser -->
          <section class="team-teaser-section">
            <div class="container">
              <div class="section-title-wrapper">
                <h2>Meet Our Specialists</h2>
                <p style="max-width: 600px; margin: 16px auto 0">
                  We aim for safety and security to encourage positive change,
                  utilizing continuous improvement via research and
                  evidence-based practice.
                </p>
              </div>

              <div class="team-grid">
                <div class="team-card">
                  <img
                    src="https://storage.googleapis.com/banani-avatars/avatar%2Ffemale%2F25-35%2FMiddle%20Eastern%2F1"
                    alt="Eman El Halies"
                    class="team-avatar"
                  />
                  <h4>Eman El Halies</h4>
                  <div class="team-role">
                    Registered Psychotherapist (Qualifying)
                  </div>
                  <button
                    class="btn btn-outline"
                    style="width: 100%"
                    data-media-type="banani-button"
                  >
                    View Profile
                  </button>
                </div>
                <div class="team-card">
                  <img
                    src="https://storage.googleapis.com/banani-avatars/avatar%2Ffemale%2F35-50%2FNorth%20American%2F2"
                    alt="Stacey Landstra"
                    class="team-avatar"
                  />
                  <h4>Stacey Landstra</h4>
                  <div class="team-role">
                    Registered Psychotherapist (Qualifying)
                  </div>
                  <button
                    class="btn btn-outline"
                    style="width: 100%"
                    data-media-type="banani-button"
                  >
                    View Profile
                  </button>
                </div>
                <div class="team-card">
                  <img
                    src="https://storage.googleapis.com/banani-avatars/avatar%2Ffemale%2F25-35%2FHispanic%2F1"
                    alt="Laura Sanchez"
                    class="team-avatar"
                  />
                  <h4>Laura Sanchez</h4>
                  <div class="team-role">Administrative Assistant</div>
                  <button
                    class="btn btn-outline"
                    style="width: 100%"
                    data-media-type="banani-button"
                  >
                    Contact
                  </button>
                </div>
              </div>
              <div class="text-center" style="margin-top: 48px">
                <button
                  class="btn btn-primary btn-lg"
                  data-media-type="banani-button"
                >
                  View Full Team
                </button>
              </div>
            </div>
          </section>

          <!-- FAQ Section -->
          <section class="faq-section container">
            <div class="section-title-wrapper">
              <h2>Frequently Asked Questions</h2>
              <p>
                Common questions about how therapy works and insurance coverage.
              </p>
            </div>

            <div class="faq-list">
              <div class="faq-item">
                <div class="faq-question" data-media-type="banani-button">
                  How can I determine if psychotherapy will be helpful?
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
                      icon="lucide:chevron-down"
                      style="font-size: 20px; color: var(--muted-foreground)"
                    ></iconify-icon>
                  </div>
                </div>
                <div class="faq-answer">
                  We use an evidence-based approach and prioritize service
                  quality. We provide individual and family counseling; typical
                  sessions last 50–60 minutes. Outcomes largely depend on the
                  time and effort invested in the process.
                </div>
              </div>

              <div class="faq-item">
                <div class="faq-question" data-media-type="banani-button">
                  What is the duration of my psychotherapy?
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
                      icon="lucide:chevron-down"
                      style="font-size: 20px; color: var(--muted-foreground)"
                    ></iconify-icon>
                  </div>
                </div>
                <div class="faq-answer" style="display: none">
                  Duration varies greatly depending on your needs. Brief
                  solution-focused therapy may be 6–8 sessions, while deeper,
                  complex issues may take months or years to fully process and
                  resolve.
                </div>
              </div>

              <div class="faq-item">
                <div class="faq-question" data-media-type="banani-button">
                  How can therapy help me?
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
                      icon="lucide:chevron-down"
                      style="font-size: 20px; color: var(--muted-foreground)"
                    ></iconify-icon>
                  </div>
                </div>
                <div class="faq-answer" style="display: none">
                  Therapy provides a nonjudgmental place to work through
                  difficulties, learn healthy ways to manage feelings and
                  stress, and gain new perspectives. Some clients stop after a
                  few months once their goals are met, while others continue
                  longer for ongoing support.
                </div>
              </div>

              <div class="faq-item">
                <div class="faq-question" data-media-type="banani-button">
                  How can I know if I am covered for psychotherapy services?
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
                      icon="lucide:chevron-up"
                      style="font-size: 20px; color: var(--primary)"
                    ></iconify-icon>
                  </div>
                </div>
                <div class="faq-answer">
                  <p>
                    <strong>Note:</strong> OHIP does not cover psychotherapy
                    when done by a psychotherapist, and OHIP coverage is limited
                    to certain delivery contexts (e.g., via family doctor/family
                    health team).
                  </p>
                  <p style="margin-top: 12px">
                    However, you may have coverage through other pathways:
                  </p>
                  <ul>
                    <li>
                      <strong>Extended Health Insurance:</strong> Coverage
                      varies; check with your provider as limits may apply.
                    </li>
                    <li>
                      <strong>Employee Assistance Program (EAP):</strong> Often
                      limited in scope; may refer outside network.
                    </li>
                    <li>
                      <strong>Motor Vehicle Accident (MVA):</strong> Coverage is
                      possible but requires insurer approval.
                    </li>
                    <li>
                      <strong>Refugee Claimant Health Insurance:</strong>
                      Subject to IFH eligibility-based coverage.
                    </li>
                    <li>
                      <strong>University and College Students:</strong> Student
                      health plans may cover therapy (varies by plan).
                    </li>
                    <li>
                      <strong>Special Program Funds:</strong>
                      Government/community funding such as VQRP.
                    </li>
                    <li>
                      <strong>Personal Coverage:</strong> Payment plans or
                      paying in full out-of-pocket.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
        </main>

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
                <p style="margin-bottom: 16px">
                  Providing counseling and psychotherapy services anytime and
                  anywhere you feel comfortable.
                </p>
                <p>111 Waterloo St Unit 406<br />London, ON N6B 2M4</p>
                <p>Phone: +1 (548) 866-0366<br />Email: mail@resiliencec.com</p>
                <p>Mon–Fri: 11:00 AM – 7:00 PM</p>
              </div>
              <div class="footer-col">
                <h5>Quick Services</h5>
                <ul>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Individual counselling</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Family counselling</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Anger management</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >Refugee counselling</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >MVA counselling</a
                    >
                  </li>
                  <li>
                    <a href="#" data-media-type="banani-button"
                      >University/college counselling</a
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
      --accent: #8abf5a;
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


<?php get_footer() ?>