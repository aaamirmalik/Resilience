<?php
/**
 * Template Name: Contact Us
 */

get_header();

?>
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
      <title>Resilience Counselling - Contact Us</title>

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

      <style id="contact-css">
        .contact-hero {
          padding: 80px 0 64px;
          background-color: var(--sidebar);
          text-align: center;
          border-bottom: 1px solid var(--border);
        }
        .contact-hero h1 {
          font-size: 48px;
          margin-bottom: 16px;
        }
        .contact-hero p {
          font-size: 18px;
          max-width: 600px;
          margin: 0 auto;
          color: var(--muted-foreground);
        }

        .contact-wrapper {
          padding: 80px 0;
        }
        .contact-grid {
          display: grid;
          grid-template-columns: 1fr 1.2fr;
          gap: 64px;
          align-items: start;
        }

        /* Contact Info Side */
        .contact-info-section h2 {
          font-size: 28px;
          margin-bottom: 32px;
        }
        .contact-info-list {
          display: flex;
          flex-direction: column;
          gap: 40px;
        }
        .contact-item {
          display: flex;
          gap: 20px;
        }
        .contact-icon {
          width: 56px;
          height: 56px;
          border-radius: 50%;
          background-color: var(--secondary);
          color: var(--primary);
          display: flex;
          align-items: center;
          justify-content: center;
          flex-shrink: 0;
        }
        .contact-text h3 {
          font-size: 18px;
          margin-bottom: 8px;
          color: var(--foreground);
        }
        .contact-text p {
          font-size: 15px;
          color: var(--muted-foreground);
          margin-bottom: 4px;
          line-height: 1.5;
        }

        .map-container {
          margin-top: 48px;
          width: 100%;
          height: 280px;
          border-radius: var(--radius-lg);
          overflow: hidden;
          border: 1px solid var(--border);
          background-color: var(--muted);
        }
        .map-container img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        /* Contact Form Side */
        .contact-form-card {
          background-color: var(--card);
          border: 1px solid var(--border);
          border-radius: var(--radius-lg);
          padding: 48px;
          box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }
        .contact-form-card h3 {
          font-size: 24px;
          margin-bottom: 8px;
        }
        .contact-form-card > p {
          margin-bottom: 32px;
          font-size: 15px;
        }

        .form-row {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 24px;
          margin-bottom: 24px;
        }
        .form-group {
          margin-bottom: 24px;
        }
        .form-label {
          display: block;
          font-size: 14px;
          font-weight: 600;
          margin-bottom: 8px;
          color: var(--foreground);
        }
        .form-control {
          width: 100%;
          padding: 12px 16px;
          border: 1px solid var(--border);
          border-radius: var(--radius-md);
          font-family: inherit;
          font-size: 15px;
          color: var(--foreground);
          background-color: var(--input);
          outline: none;
        }
        .form-control::placeholder {
          color: #9ca3af;
        }
        textarea.form-control {
          resize: vertical;
          min-height: 120px;
        }
        select.form-control {
          appearance: none;
          background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
          background-repeat: no-repeat;
          background-position: right 16px center;
          background-size: 16px;
          padding-right: 40px;
        }

        .radio-group {
          display: flex;
          gap: 24px;
          margin-top: 8px;
        }
        .radio-label {
          display: flex;
          align-items: center;
          gap: 8px;
          font-size: 15px;
          color: var(--foreground);
          cursor: pointer;
        }
        .radio-custom {
          width: 18px;
          height: 18px;
          border-radius: 50%;
          border: 1px solid var(--border);
          display: flex;
          align-items: center;
          justify-content: center;
        }
        .radio-custom.active {
          border-color: var(--primary);
          background-color: var(--primary);
        }
        .radio-custom.active::after {
          content: "";
          width: 6px;
          height: 6px;
          border-radius: 50%;
          background-color: white;
        }

        .submit-btn {
          width: 100%;
          padding: 14px;
          font-size: 16px;
          margin-top: 8px;
        }

        .form-footer {
          display: flex;
          align-items: center;
          gap: 12px;
          margin-top: 24px;
          font-size: 13px;
          color: var(--muted-foreground);
          background-color: var(--sidebar);
          padding: 16px;
          border-radius: var(--radius-md);
          border: 1px solid var(--border);
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
              <a href="#" data-media-type="banani-button">Blog</a>
              <a href="#" class="active" data-media-type="banani-button"
                >Contact</a
              >
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

        <!-- Main Content -->
        <main>
          <!-- Hero Section -->
          <section class="contact-hero">
            <div class="container">
              <h1>Get in Touch</h1>
              <p>
                Whether you're ready to start therapy or just have a few
                questions about our process, our team is here to support you.
              </p>
            </div>
          </section>

          <!-- Contact Content -->
          <section class="contact-wrapper">
            <div class="container contact-grid">
              <!-- Left Column: Info & Map -->
              <div class="contact-info-section">
                <h2>Contact Information</h2>
                <div class="contact-info-list">
                  <div class="contact-item">
                    <div class="contact-icon">
                      <iconify-icon
                        icon="lucide:map-pin"
                        style="font-size: 24px"
                      ></iconify-icon>
                    </div>
                    <div class="contact-text">
                      <h3>Our Clinic Location</h3>
                      <p>111 Waterloo St Unit 406<br />London, ON N6B 2M4</p>
                    </div>
                  </div>

                  <div class="contact-item">
                    <div class="contact-icon">
                      <iconify-icon
                        icon="lucide:phone"
                        style="font-size: 24px"
                      ></iconify-icon>
                    </div>
                    <div class="contact-text">
                      <h3>Phone &amp; WhatsApp</h3>
                      <p>Main: +1 (548) 866-0366</p>
                      <p>Fax: Available upon request</p>
                    </div>
                  </div>

                  <div class="contact-item">
                    <div class="contact-icon">
                      <iconify-icon
                        icon="lucide:mail"
                        style="font-size: 24px"
                      ></iconify-icon>
                    </div>
                    <div class="contact-text">
                      <h3>Email Address</h3>
                      <p>mail@resiliencec.com</p>
                      <p>Expect a response within 48 hours.</p>
                    </div>
                  </div>

                  <div class="contact-item">
                    <div class="contact-icon">
                      <iconify-icon
                        icon="lucide:clock"
                        style="font-size: 24px"
                      ></iconify-icon>
                    </div>
                    <div class="contact-text">
                      <h3>Office Hours</h3>
                      <p>Monday – Friday: 11:00 AM – 7:00 PM</p>
                      <p>Saturday – Sunday: Closed</p>
                    </div>
                  </div>
                </div>

                <!-- Static Map Image -->
                <div class="map-container">
                  <img
                    src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&amp;fit=crop&amp;q=80&amp;w=800"
                    alt="Map indicating office location"
                  />
                </div>
              </div>

              <!-- Right Column: Form -->
              <div class="contact-form-section">
                <div class="contact-form-card">
                  <h3>Send us a message</h3>
                  <p>
                    Fill out the form below and our intake coordinator will
                    contact you shortly to schedule an appointment or answer
                    your questions.
                  </p>

                  <form>
                    <div class="form-row">
                      <div>
                        <label class="form-label">First Name *</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="e.g. Jane"
                        />
                      </div>
                      <div>
                        <label class="form-label">Last Name *</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="e.g. Doe"
                        />
                      </div>
                    </div>

                    <div class="form-row">
                      <div>
                        <label class="form-label">Email Address *</label>
                        <input
                          type="email"
                          class="form-control"
                          placeholder="jane@example.com"
                        />
                      </div>
                      <div>
                        <label class="form-label">Phone Number</label>
                        <input
                          type="tel"
                          class="form-control"
                          placeholder="(555) 000-0000"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="form-label"
                        >Are you a new or existing client?</label
                      >
                      <div class="radio-group">
                        <div
                          class="radio-label"
                          data-media-type="banani-button"
                        >
                          <div class="radio-custom active"></div>
                          New Client
                        </div>
                        <div
                          class="radio-label"
                          data-media-type="banani-button"
                        >
                          <div class="radio-custom"></div>
                          Existing Client
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="form-label">How can we help you? *</label>
                      <select class="form-control">
                        <option>Select a service or reason...</option>
                        <option>Individual Counselling</option>
                        <option>Child &amp; Youth Counselling</option>
                        <option>Couples or Family Counselling</option>
                        <option>
                          Motor Vehicle Accident (MVA) Counselling
                        </option>
                        <option>General Inquiry</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Your Message</label>
                      <textarea
                        class="form-control"
                        placeholder="Please briefly describe what you are looking for help with. Note: Please do not include highly sensitive medical information in this initial form."
                      ></textarea>
                    </div>

                    <button
                      type="button"
                      class="btn btn-primary submit-btn"
                      data-media-type="banani-button"
                    >
                      Send Message
                      <div
                        style="
                          width: 18px;
                          height: 18px;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                        "
                      >
                        <iconify-icon
                          icon="lucide:send"
                          style="font-size: 16px"
                        ></iconify-icon>
                      </div>
                    </button>

                    <div class="form-footer">
                      <div
                        style="
                          width: 20px;
                          height: 20px;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          color: var(--success);
                          flex-shrink: 0;
                        "
                      >
                        <iconify-icon
                          icon="lucide:shield-check"
                          style="font-size: 20px"
                        ></iconify-icon>
                      </div>
                      <div>
                        <strong>Your privacy matters.</strong> The information
                        you provide is confidential and encrypted. We typically
                        respond within 48 business hours.
                      </div>
                    </div>
                  </form>
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

<!-- footer -->
<?php
get_footer();
?>