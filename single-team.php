<?php
get_header();

$archive_url = get_post_type_archive_link('team');
if (!$archive_url) {
    $archive_url = home_url('/teams/');
}
?>

<div class="page-container-am single-team-page-am">
    <main class="single-team-main-am section-am">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
            $team_image = get_field('team_image');
            $role = get_field('team_role');
            $experience = get_field('team_experience');
            $clients = get_field('team_clients');
            $location = get_field('team_location');
            $email = get_field('email');
            $phone = get_field('phone');

            $image_url = '';
            $image_alt = get_the_title();

            if (is_array($team_image) && !empty($team_image['url'])) {
                $image_url = $team_image['url'];
                $image_alt = $team_image['alt'] ?? get_the_title();
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

            $taxonomy_terms = get_the_terms(get_the_ID(), 'team-category');
            $term_ids = [];
            if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms)) {
                $term_ids = wp_list_pluck($taxonomy_terms, 'term_id');
            }

            $related_args = [
                'post_type' => 'team',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
                'order' => 'ASC',
            ];

            if (!empty($term_ids)) {
                $related_args['tax_query'] = [
                    [
                        'taxonomy' => 'team-category',
                        'field' => 'term_id',
                        'terms' => $term_ids,
                    ],
                ];
            }

            $related_query = new WP_Query($related_args);
        ?>

        <div class="container-am">
            <nav class="single-breadcrumb-am" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span>/</span>
                <a href="<?php echo esc_url($archive_url); ?>">Team</a>
                <span>/</span>
                <span class="single-breadcrumb-current-am"><?php the_title(); ?></span>
            </nav>
        </div>

        <section class="single-team-hero-am">
            <div class="container-am single-team-hero-grid-am">
                <div class="single-team-image-wrap-am">
                    <?php if (!empty($image_url)) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="single-team-image-am" />
                    <?php endif; ?>
                </div>

                <div class="single-team-summary-am">
                    <div class="eyebrow-am">Meet Your Therapist</div>
                    <h1 class="single-team-title-am"><?php the_title(); ?></h1>

                    <?php if (!empty($role)) : ?>
                        <div class="single-team-role-am"><?php echo esc_html($role); ?></div>
                    <?php endif; ?>

                    <div class="single-team-meta-am">
                        <?php if (!empty($experience)) : ?>
                            <span><iconify-icon icon="lucide:briefcase"></iconify-icon><?php echo esc_html($experience); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($clients)) : ?>
                            <span><iconify-icon icon="lucide:users"></iconify-icon><?php echo esc_html($clients); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($location)) : ?>
                            <span><iconify-icon icon="lucide:map-pin"></iconify-icon><?php echo esc_html($location); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="single-team-actions-am">
                        <?php if (!empty($email)) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="btn-am btn-outline-am">
                                <iconify-icon icon="lucide:mail"></iconify-icon>
                                <?php echo esc_html($email); ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($phone)) : ?>
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="btn-am btn-outline-am">
                                <iconify-icon icon="lucide:phone"></iconify-icon>
                                <?php echo esc_html($phone); ?>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(get_field('appointment_url', 'option') ?: '#'); ?>" class="btn-am btn-primary-am">
                            <?php echo esc_html(get_field('appointment_label', 'option') ?: 'Book an Appointment'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-am">
            <div class="container-am single-team-content-wrap-am">
                <div class="single-content-am">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

        <?php if ($related_query->have_posts()) : ?>
        <section class="single-team-related-am section-am section-muted-am">
            <div class="container-am">
                <div class="single-related-header-am">
                    <h2>Explore More Team Members</h2>
                    <a href="<?php echo esc_url($archive_url); ?>" class="btn-am btn-outline-am">View Full Team</a>
                </div>

                <div class="team-directory-grid-am">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <?php
                            $related_image = get_field('team_image');
                            $related_role = get_field('team_role');
                            $related_experience = get_field('team_experience');
                            $related_clients = get_field('team_clients');
                            $related_email = get_field('email');
                            $related_phone = get_field('phone');
                        ?>
                        <div class="team-card-am">
                            <div class="team-card-image-am">
                                <?php if (is_array($related_image) && !empty($related_image['url'])) : ?>
                                    <img src="<?php echo esc_url($related_image['url']); ?>" alt="<?php echo esc_attr($related_image['alt'] ?? get_the_title()); ?>">
                                <?php elseif (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="team-card-content-am">
                                <h3><?php the_title(); ?></h3>
                                <?php if (!empty($related_role)) : ?>
                                    <div class="team-card-role-am"><?php echo esc_html($related_role); ?></div>
                                <?php endif; ?>

                                <div class="team-card-divider-am"></div>

                                <div class="team-card-meta-am">
                                    <?php if (!empty($related_experience)) : ?>
                                        <span><iconify-icon icon="lucide:briefcase"></iconify-icon><?php echo esc_html($related_experience); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($related_clients)) : ?>
                                        <span><iconify-icon icon="lucide:users"></iconify-icon><?php echo esc_html($related_clients); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="team-card-contact-am">
                                    <?php if (!empty($related_email)) : ?>
                                        <a href="mailto:<?php echo esc_attr($related_email); ?>"><iconify-icon icon="lucide:mail"></iconify-icon><?php echo esc_html($related_email); ?></a>
                                    <?php endif; ?>
                                    <?php if (!empty($related_phone)) : ?>
                                        <a href="tel:<?php echo esc_attr($related_phone); ?>"><iconify-icon icon="lucide:phone"></iconify-icon><?php echo esc_html($related_phone); ?></a>
                                    <?php endif; ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="btn-am btn-outline-am" style="width:100%">View Profile</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
        <?php endwhile; else : ?>
            <div class="container-am"><p class="single-empty-am">Team member not found.</p></div>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
