<div class="topbar-am">
        <div class="container-am topbar-inner-am">
            <div class="topbar-group-am">
                <span>
                    <iconify-icon icon="lucide:clock"></iconify-icon>
                    <?php echo esc_html(get_field('topbar_hours', 'option') ?: 'Mon–Fri, 11:00 AM–7:00 PM'); ?>
                </span>
                <span>
                    <iconify-icon icon="lucide:map-pin"></iconify-icon>
                    <?php echo esc_html(get_field('topbar_address', 'option') ?: '111 Waterloo St Unit 406, London, ON'); ?>
                </span>
            </div>
            <div class="topbar-group-am">
                <span>
                    <a href="tel:<?php echo esc_attr(get_field('topbar_phone', 'option')); ?>">
                    <iconify-icon icon="lucide:phone"></iconify-icon>
                    <?php echo esc_html(get_field('topbar_phone', 'option') ?: '+1 (548) 866-0366'); ?>
                    </a>
                </span>
                <span>
                    <a href="mailto:<?php echo esc_attr(get_field('topbar_email', 'option')); ?>">
                    <iconify-icon icon="lucide:mail"></iconify-icon>
                    <?php echo esc_html(get_field('topbar_email', 'option') ?: 'mail@resiliencec.com'); ?>
                    </a>
                </span>
            </div>
        </div>
    </div>

    <header class="navbar-am">
        <div class="container-am navbar-inner-am">
            <div class="brand-am">
                <div class="brand-logo-am">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <iconify-icon icon="lucide:leaf"></iconify-icon>
                    <?php endif; ?>
                </div>
                <!-- <div class="brand-text-am">
                    <strong><?php echo esc_html(get_field('brand_name', 'option') ?: 'RESILIENCE'); ?></strong>
                    <span><?php echo esc_html(get_field('brand_tagline', 'option') ?: 'COUNSELLING'); ?></span>
                </div> -->
            </div>

            <nav class="nav-links-am" aria-label="Primary Navigation">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                ]);
                ?>
            </nav>

            <div class="nav-actions-am">
                <a href="<?php echo esc_url(get_field('clinician_login_url', 'option') ?: '#'); ?>" class="btn-am btn-outline-am">
                    <?php echo esc_html(get_field('clinician_login_label', 'option') ?: 'Clinician Login'); ?>
                </a>
                <a href="<?php echo esc_url(get_field('appointment_url2', 'option') ?: '#'); ?>" class="btn-am btn-primary-am">
                    <?php echo esc_html(get_field('appointment_label', 'option') ?: 'Make an Appointment'); ?>
                </a>
            </div>

            <button class="nav-hamburger-am" aria-label="Toggle menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>

        <div class="mobile-menu-am" id="mobile-menu-am" aria-hidden="true">
            <div class="container-am">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'mobile-nav-list-am',
                ]);
                ?>
                <div class="mobile-actions-am">
                    <a href="<?php echo esc_url(get_field('clinician_login_url', 'option') ?: '#'); ?>" class="btn-am btn-outline-am">
                        <?php echo esc_html(get_field('clinician_login_label', 'option') ?: 'Clinician Login'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_field('appointment_url', 'option') ?: '#'); ?>" class="btn-am btn-primary-am">
                        <?php echo esc_html(get_field('appointment_label', 'option') ?: 'Make an Appointment'); ?>
                    </a>
                </div>
            </div>
        </div>
    </header>