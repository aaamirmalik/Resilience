<?php
/**
 * Template Name: Teams Page
 */

get_header();
?>

<div class="page-container-am">

    <header class="page-header-am">
        <div class="container-am">
            <h1><?php echo esc_html(get_field('teams_hero_section_title')); ?></h1>
            <p>
                <?php echo esc_html(get_field('team_hero_section_description')); ?>
            </p>

            <div class="team-filters-am">
                <button class="filter-btn-am active-am" data-filter="all">
                    All Members
                </button>

                <?php
                    $terms = get_terms([
                        'taxonomy' => 'team-category',
                        'hide_empty' => true,
                    ]);

                    if (!empty($terms) && !is_wp_error($terms)) :
                        foreach ($terms as $term) :
                    ?>
                <button class="filter-btn-am" data-filter="<?php echo esc_attr($term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </button>
                <?php
                        endforeach;
                    endif;
                    ?>
            </div>
        </div>
    </header>

    <section class="team-directory-section-am">
        <div class="container-am">
            <div class="team-directory-grid-am">

                <?php
                    $args = [
                        'post_type' => 'team',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'order' => 'ASC'
                    ];

                    $team_query = new WP_Query($args);

                    if ($team_query->have_posts()) :
                        while ($team_query->have_posts()) :
                            $team_query->the_post();

                            $terms = get_the_terms(get_the_ID(), 'team-category');
                            $term_classes = '';
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    $term_classes .= ' ' . $term->slug;
                                }
                            }

                            $image = get_field('team_image');
                            $role = get_field('team_role');
                            $experience = get_field('team_experience');
                            $speciality = get_field('team_clients');
                            $email = get_field('email');
                            $phone = get_field('phone');
                            $permalink = get_the_permalink();
                    ?>

                <div class="team-card-am<?php echo esc_attr($term_classes); ?>" style="position: relative; cursor: pointer;" onclick="window.location='<?php echo $permalink; ?>';">

                    <div class="team-card-image-am">
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                    </div>

                    <div class="team-card-content-am">
                        <h3><a href="<?php echo $permalink; ?>" style="text-decoration: none; color: inherit;"><?php the_title(); ?></a></h3>

                        <?php if ($role) : ?>
                        <div class="team-card-role-am"><?php echo esc_html($role); ?></div>
                        <?php endif; ?>

                        <div class="team-card-divider-am"></div>

                        <div class="team-card-meta-am">
                            <?php if ($experience) : ?>
                            <span>
                                <iconify-icon icon="lucide:briefcase"></iconify-icon>
                                <?php echo esc_html($experience); ?>
                            </span>
                            <?php endif; ?>

                            <?php if ($speciality) : ?>
                            <span>
                                <iconify-icon icon="lucide:users"></iconify-icon>
                                <?php echo esc_html($speciality); ?>
                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="team-card-contact-am" onclick="event.stopPropagation();">
                            <?php if ($email) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>">
                                <iconify-icon icon="lucide:mail"></iconify-icon>
                                <?php echo esc_html($email); ?>
                            </a>
                            <?php endif; ?>

                            <?php if ($phone) : ?>
                            <a href="tel:<?php echo esc_attr($phone); ?>">
                                <iconify-icon icon="lucide:phone"></iconify-icon>
                                <?php echo esc_html($phone); ?>
                            </a>
                            <?php endif; ?>
                        </div>

                        <a href="<?php echo $permalink; ?>" class="btn-am btn-outline-am" style="width:100%">
                            View Profile
                        </a>
                    </div>
                </div>

                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

            </div>
        </div>
    </section>
</div>

<?php
get_footer();
?>