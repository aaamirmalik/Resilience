<?php
get_header();

$archive_url = get_post_type_archive_link('service');
if (!$archive_url) {
    $archive_url = home_url('/services/');
}
?>

<div class="page-container-am single-service-page-am">
    <main class="single-service-main-am section-am">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
            $service_image = get_field('service_image');
            $service_desc = get_field('service_description');
            $service_button = get_field('service_button_label');
            $summary = !empty($service_desc) ? $service_desc : get_the_excerpt();

            $image_url = '';
            $image_alt = get_the_title();

            if (is_array($service_image) && !empty($service_image['url'])) {
                $image_url = $service_image['url'];
                $image_alt = $service_image['alt'] ?? get_the_title();
            } elseif (has_post_thumbnail()) {
                $thumb_id = get_post_thumbnail_id();
                $thumb_src = wp_get_attachment_image_src($thumb_id, 'large');
                if (!empty($thumb_src[0])) {
                    $image_url = $thumb_src[0];
                }
                $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                if (!empty($thumb_alt)) {
                    $image_alt = $thumb_alt;
                }
            }

            $related_query = new WP_Query([
                'post_type' => 'service',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
                'order' => 'ASC',
            ]);
        ?>

        <div class="container-am">
            <nav class="single-breadcrumb-am" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span>/</span>
                <a href="<?php echo esc_url($archive_url); ?>">Services</a>
                <span>/</span>
                <span class="single-breadcrumb-current-am"><?php the_title(); ?></span>
            </nav>
        </div>

        <section class="single-service-hero-am">
            <div class="container-am single-service-hero-grid-am">
                <div class="single-service-copy-am">
                    <div class="eyebrow-am">Therapy Service</div>
                    <h1 class="single-service-title-am"><?php the_title(); ?></h1>
                    <?php if (!empty($summary)) : ?>
                        <p class="single-service-summary-am"><?php echo esc_html($summary); ?></p>
                    <?php endif; ?>

                    <div class="single-service-actions-am">
                        <a href="<?php echo esc_url(get_field('appointment_url', 'option') ?: '#'); ?>" class="btn-am btn-primary-am">
                            <?php echo esc_html($service_button ?: 'Book This Service'); ?>
                        </a>
                        <a href="<?php echo esc_url(get_field('consultation_url', 'option') ?: '#'); ?>" class="btn-am btn-outline-am">
                            Request Consultation
                        </a>
                    </div>
                </div>

                <?php if (!empty($image_url)) : ?>
                <div class="single-service-media-am">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-am">
            <div class="container-am single-service-content-wrap-am">
                <div class="single-content-am">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

        <section class="section-am">
            <div class="container-am">
                <div class="single-service-cta-am">
                    <div>
                        <h3>Need help choosing the right support path?</h3>
                        <p>Our intake team can guide you to the best service based on your goals and comfort.</p>
                    </div>
                    <a href="<?php echo esc_url(get_field('appointment_url', 'option') ?: '#'); ?>" class="btn-am btn-lg-am single-service-cta-btn-am">
                        Start With Intake
                    </a>
                </div>
            </div>
        </section>

        <?php if ($related_query->have_posts()) : ?>
        <section class="single-service-related-am section-am section-muted-am">
            <div class="container-am">
                <div class="single-related-header-am">
                    <h2>Related Services</h2>
                    <a href="<?php echo esc_url($archive_url); ?>" class="btn-am btn-outline-am">All Services</a>
                </div>

                <div class="services-cards-grid-am">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <?php
                            $related_image = get_field('service_image');
                            $related_desc = get_field('service_description');
                            $related_button = get_field('service_button_label');
                            $card_desc = !empty($related_desc) ? $related_desc : wp_trim_words(get_the_excerpt(), 20);
                        ?>
                        <article class="services-card-am" style="cursor: pointer;" onclick="window.location='<?php echo the_permalink(); ?>';">
                            <?php if (is_array($related_image) && !empty($related_image['url'])) : ?>
                                <div class="services-card-image-am">
                                    <img src="<?php echo esc_url($related_image['url']); ?>" alt="<?php echo esc_attr($related_image['alt'] ?? get_the_title()); ?>" />
                                </div>
                            <?php elseif (has_post_thumbnail()) : ?>
                                <div class="services-card-image-am"><?php the_post_thumbnail('medium_large'); ?></div>
                            <?php endif; ?>

                            <div class="services-card-content-am">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo esc_html($card_desc); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more-link-am">
                                    <?php echo esc_html($related_button ?: 'Read More'); ?>
                                    <iconify-icon icon="lucide:arrow-right"></iconify-icon>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
        <?php endwhile; else : ?>
            <div class="container-am"><p class="single-empty-am">Service not found.</p></div>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
