<?php if (get_field('show_cta_section', 'option') ?? true) : ?>
    <section class="cta-section-am">
        <div class="container-am text-center-am">
            <h2><?php echo esc_html(get_field('cta_heading', 'option') ?: 'Ready to talk with a registered psychotherapist?'); ?></h2>
            <p><?php echo esc_html(get_field('cta_description', 'option') ?: 'We are accepting new clients for both in-person appointments in London and secure online sessions anywhere in Ontario.'); ?></p>
            <a href="<?php echo esc_url(get_field('appointment_url', 'option') ?: '#'); ?>" class="btn-am btn-primary-am btn-lg-am">
                <?php echo esc_html(get_field('cta_button_label', 'option') ?: 'Make an Appointment'); ?>
            </a>
            <div class="cta-note-am">
                <?php echo esc_html(get_field('cta_note', 'option') ?: 'One of our team members will respond within 48 hours during office hours.'); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

    <footer class="footer-main-am">
        <div class="container-am">
            <div class="footer-grid-am">

                <div class="footer-col-am">
                    <div class="footer-brand-am">
                        <div class="footer-logo-am">
                            <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <iconify-icon icon="lucide:leaf"></iconify-icon>
                        <?php endif; ?>
                        </div>
                        <!-- <div class="footer-brand-text-am">
                            <strong><?php echo esc_html(get_field('brand_name', 'option') ?: 'RESILIENCE'); ?></strong>
                            <span><?php echo esc_html(get_field('brand_tagline', 'option') ?: 'COUNSELLING'); ?></span>
                        </div> -->
                    </div>
                    <p>
                        <?php echo get_field('footer_address', 'option') ?: "111 Waterloo St Unit 406\nLondon, ON N6B 2M4"; ?>
                    </p>
                    <p>
                        Phone: <?php echo esc_html(get_field('topbar_phone', 'option') ?: '+1 (548) 866-0366'); ?><br>
                        Email: <?php echo esc_html(get_field('topbar_email', 'option') ?: 'mail@resiliencec.com'); ?>
                    </p>
                    <p>
                        <?php echo esc_html(get_field('topbar_hours', 'option') ?: 'Mon–Fri: 11:00 AM – 7:00 PM'); ?><br>
                        <?php echo esc_html(get_field('footer_weekend', 'option') ?: 'Weekends & holidays: Closed'); ?>
                    </p>
                </div>

                <div class="footer-col-am">
                    <h5><?php echo esc_html(get_field('footer_services_heading', 'option')); ?></h5>

                    <ul class="footer-nav-list-am">
                    <?php if (have_rows('footer_services_menu', 'option')) : ?>
                        <?php while (have_rows('footer_services_menu', 'option')) : the_row(); ?>
                            <li>
                                <a href="<?php echo esc_url(get_sub_field('url')); ?>">
                                    <?php echo esc_html(get_sub_field('link_label')); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </ul>
                </div>

                <div class="footer-col-am">
                    <h5><?php echo esc_html(get_field('footer_clinic_heading', 'option')); ?></h5>

                    <ul class="footer-nav-list-am">
                    <?php if (have_rows('footer_clinic_menu', 'option')) : ?>
                        <?php while (have_rows('footer_clinic_menu', 'option')) : the_row(); ?>
                            <li>
                                <a href="<?php echo esc_url(get_sub_field('url')); ?>">
                                    <?php echo esc_html(get_sub_field('link_label')); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </ul>
                </div>

                <div class="footer-col-am">
                    <h5><?php echo esc_html(get_field('footer_info_heading', 'option') ?: 'Practical Information'); ?></h5>
                    <?php if (have_rows('footer_info_items', 'option')) : ?>
                    <ul class="footer-info-list-am">
                        <?php while (have_rows('footer_info_items', 'option')) : the_row(); ?>
                            <li>
                                    <?php echo esc_html(get_sub_field('item')); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>

            </div>

            <div class="footer-bottom-bar-am">
                <div>
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                    <?php echo esc_html(get_field('footer_copyright_suffix', 'option') ?: 'All rights reserved.'); ?>
                </div>
                <div class="footer-bottom-links-am">

                <?php if (have_rows('footer_legal_menu', 'option')) : ?>
                    <?php while (have_rows('footer_legal_menu', 'option')) : the_row(); ?>
                        <a href="<?php echo esc_url(get_sub_field('url')); ?>">
                            <?php echo esc_html(get_sub_field('label')); ?>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>

                </div>
            </div>
        </div>
    </footer>