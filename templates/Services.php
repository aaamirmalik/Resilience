<?php
/**
 * Template Name: Services Page
 */

get_header();

$hero_group = get_field('services_hero_group');
$cards_group = get_field('services_cards_group');
$why_group = get_field('services_why_group');
$approach_group = get_field('services_approach_group');
$team_group = get_field('services_team_group');
$faq_group = get_field('services_faq_group');

$hero_group = is_array($hero_group) ? $hero_group : [];
$cards_group = is_array($cards_group) ? $cards_group : [];
$why_group = is_array($why_group) ? $why_group : [];
$approach_group = is_array($approach_group) ? $approach_group : [];
$team_group = is_array($team_group) ? $team_group : [];
$faq_group = is_array($faq_group) ? $faq_group : [];

$service_limit = (int) ($cards_group['posts_per_page'] ?? 6);
if ($service_limit <= 0) {
    $service_limit = 6;
}

$service_query = new WP_Query([
    'post_type'      => 'service',
    'post_status'    => 'publish',
    'posts_per_page' => $service_limit,
    'order'          => 'ASC',
]);

$team_limit = (int) ($team_group['posts_per_page'] ?? 3);
if ($team_limit <= 0) {
    $team_limit = 3;
}

$team_query = new WP_Query([
    'post_type'      => 'team',
    'post_status'    => 'publish',
    'posts_per_page' => $team_limit,
    'order'          => 'ASC',
]);
?>

<div class="page-container-am services-page-am">
    <main>
        <section class="section-am services-hero-am">
            <div class="container-am services-hero-grid-am">
                <div class="services-hero-copy-am">
                    <?php if (!empty($hero_group['eyebrow'])) : ?>
                    <div class="eyebrow-am"><?php echo esc_html($hero_group['eyebrow']); ?></div>
                    <?php endif; ?>

                    <h1><?php echo esc_html($hero_group['heading'] ?? get_the_title()); ?></h1>
                    <p><?php echo esc_html($hero_group['description'] ?? 'Culturally informed therapy for individuals, couples, families, and communities.'); ?></p>

                    <div class="services-hero-actions-am">
                        <a href="<?php echo esc_url($hero_group['primary_button_url'] ?? get_field('appointment_url', 'option') ?? '#'); ?>"
                            class="btn-am btn-primary-am btn-lg-am">
                            <?php echo esc_html($hero_group['primary_button_label'] ?? 'Book an Appointment'); ?>
                        </a>

                        <a href="<?php echo esc_url($hero_group['secondary_button_url'] ?? get_field('consultation_url', 'option') ?? '#'); ?>"
                            class="btn-am btn-outline-am btn-lg-am">
                            <?php echo esc_html($hero_group['secondary_button_label'] ?? 'Request Consultation'); ?>
                        </a>
                    </div>

                    <?php if (!empty($hero_group['stats'])) : ?>
                    <div class="services-hero-stats-am">
                        <?php foreach ($hero_group['stats'] as $stat) : ?>
                        <div class="services-hero-stat-am">
                            <h4><?php echo esc_html($stat['value'] ?? ''); ?></h4>
                            <p><?php echo esc_html($stat['label'] ?? ''); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="services-hero-media-am">
                    <?php
                    $hero_image = $hero_group['image'] ?? '';
                    if (!empty($hero_image)) :
                        if (is_array($hero_image)) {
                            $hero_url = $hero_image['url'] ?? '';
                            $hero_alt = $hero_image['alt'] ?? '';
                        } else {
                            $hero_url = $hero_image;
                            $hero_alt = '';
                        }
                    ?>
                    <img src="<?php echo esc_url($hero_url); ?>" alt="<?php echo esc_attr($hero_alt); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="section-am">
            <div class="container-am">
                <div class="section-header-am text-center-am">
                    <?php if (!empty($cards_group['eyebrow'])) : ?>
                    <div class="eyebrow-am"><?php echo esc_html($cards_group['eyebrow']); ?></div>
                    <?php endif; ?>
                    <h2><?php echo esc_html($cards_group['heading'] ?? 'What we offer'); ?></h2>
                    <p><?php echo esc_html($cards_group['description'] ?? 'Our psychotherapy and counselling services are tailored to each person and context.'); ?></p>
                </div>

                <?php if ($service_query->have_posts()) : ?>
                <div class="services-cards-grid-am">
                    <?php while ($service_query->have_posts()) : $service_query->the_post(); ?>
                    <?php
                        $service_image = get_field('service_image');
                        $service_desc = get_field('service_description');
                        $service_button = get_field('service_button_label');

                        $card_title = get_the_title();
                        $card_desc = !empty($service_desc) ? $service_desc : wp_trim_words(get_the_excerpt(), 22);
                        $card_btn = !empty($service_button) ? $service_button : ($cards_group['button_label'] ?? 'Read More');

                        $card_url = '';
                        $card_alt = '';
                        if (is_array($service_image) && !empty($service_image['url'])) {
                            $card_url = $service_image['url'];
                            $card_alt = $service_image['alt'] ?? $card_title;
                        } elseif (has_post_thumbnail()) {
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_src = wp_get_attachment_image_src($thumb_id, 'medium_large');
                            if (!empty($thumb_src[0])) {
                                $card_url = $thumb_src[0];
                            }
                            $card_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                            if (empty($card_alt)) {
                                $card_alt = $card_title;
                            }
                        }
                    ?>
                    <article class="services-card-am">
                        <?php if (!empty($card_url)) : ?>
                        <div class="services-card-image-am">
                            <img src="<?php echo esc_url($card_url); ?>" alt="<?php echo esc_attr($card_alt); ?>">
                        </div>
                        <?php endif; ?>

                        <div class="services-card-content-am">
                            <h3><?php echo esc_html($card_title); ?></h3>
                            <p><?php echo esc_html($card_desc); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more-link-am">
                                <?php echo esc_html($card_btn); ?> ->
                            </a>
                        </div>
                    </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
                <?php elseif (!empty($cards_group['services'])) : ?>
                <div class="services-cards-grid-am">
                    <?php foreach ($cards_group['services'] as $service) : ?>
                    <?php
                        $card_image = $service['image'] ?? '';
                        $card_url = '';
                        $card_alt = '';
                        if (is_array($card_image) && !empty($card_image['url'])) {
                            $card_url = $card_image['url'];
                            $card_alt = $card_image['alt'] ?? '';
                        } elseif (is_string($card_image)) {
                            $card_url = $card_image;
                        }
                    ?>
                    <article class="services-card-am">
                        <?php if (!empty($card_url)) : ?>
                        <div class="services-card-image-am">
                            <img src="<?php echo esc_url($card_url); ?>" alt="<?php echo esc_attr($card_alt); ?>">
                        </div>
                        <?php endif; ?>
                        <div class="services-card-content-am">
                            <h3><?php echo esc_html($service['title'] ?? ''); ?></h3>
                            <p><?php echo esc_html($service['description'] ?? ''); ?></p>
                            <?php if (!empty($service['button_url']) && !empty($service['button_label'])) : ?>
                            <a href="<?php echo esc_url($service['button_url']); ?>" class="read-more-link-am">
                                <?php echo esc_html($service['button_label']); ?> ->
                            </a>
                            <?php endif; ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-am section-muted-am">
            <div class="container-am">
                <?php if (!empty($why_group['cta_heading']) || !empty($why_group['cta_description'])) : ?>
                <div class="services-cta-am">
                    <div>
                        <h3><?php echo esc_html($why_group['cta_heading'] ?? 'Start where you are'); ?></h3>
                        <p><?php echo esc_html($why_group['cta_description'] ?? 'Talk to our team and choose the support path that fits your goals.'); ?></p>
                    </div>
                    <a href="<?php echo esc_url($why_group['cta_button_url'] ?? get_field('appointment_url', 'option') ?? '#'); ?>"
                        class="btn-am btn-lg-am services-cta-btn-am">
                        <?php echo esc_html($why_group['cta_button_label'] ?? 'Book an Appointment'); ?>
                    </a>
                </div>
                <?php endif; ?>

                <div class="section-header-am text-center-am">
                    <?php if (!empty($why_group['eyebrow'])) : ?>
                    <div class="eyebrow-am"><?php echo esc_html($why_group['eyebrow']); ?></div>
                    <?php endif; ?>
                    <h2><?php echo esc_html($why_group['heading'] ?? 'Why choose us'); ?></h2>
                    <p><?php echo esc_html($why_group['description'] ?? 'Our services follow evidence-based standards and culturally responsive care.'); ?></p>
                </div>

                <?php if (!empty($why_group['pillars'])) : ?>
                <div class="services-pillars-grid-am">
                    <?php foreach ($why_group['pillars'] as $pillar) : ?>
                    <article class="services-pillar-am">
                        <div class="services-pillar-icon-am">
                            <iconify-icon icon="<?php echo esc_attr($pillar['icon'] ?? 'lucide:shield-check'); ?>"></iconify-icon>
                        </div>
                        <h4><?php echo esc_html($pillar['title'] ?? ''); ?></h4>
                        <p><?php echo esc_html($pillar['description'] ?? ''); ?></p>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-am">
            <div class="container-am">
                <div class="section-header-am text-center-am">
                    <?php if (!empty($approach_group['eyebrow'])) : ?>
                    <div class="eyebrow-am"><?php echo esc_html($approach_group['eyebrow']); ?></div>
                    <?php endif; ?>
                    <h2><?php echo esc_html($approach_group['heading'] ?? 'Our approach'); ?></h2>
                    <p><?php echo esc_html($approach_group['description'] ?? 'How we support change and sustainable outcomes.'); ?></p>
                </div>

                <?php if (!empty($approach_group['columns'])) : ?>
                <div class="services-approach-grid-am">
                    <?php foreach ($approach_group['columns'] as $column) : ?>
                    <div class="services-approach-col-am">
                        <h3>
                            <iconify-icon icon="<?php echo esc_attr($column['icon'] ?? 'lucide:check-circle'); ?>"></iconify-icon>
                            <?php echo esc_html($column['title'] ?? ''); ?>
                        </h3>

                        <?php if (!empty($column['text'])) : ?>
                        <p><?php echo esc_html($column['text']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($column['points'])) : ?>
                        <ul>
                            <?php foreach ($column['points'] as $point) : ?>
                            <li><?php echo esc_html($point['point'] ?? ''); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-am section-muted-am">
            <div class="container-am">
                <div class="section-header-am text-center-am">
                    <?php if (!empty($team_group['eyebrow'])) : ?>
                    <div class="eyebrow-am"><?php echo esc_html($team_group['eyebrow']); ?></div>
                    <?php endif; ?>
                    <h2><?php echo esc_html($team_group['heading'] ?? 'Meet our specialists'); ?></h2>
                    <p><?php echo esc_html($team_group['description'] ?? 'Experienced clinicians and counsellors ready to support your goals.'); ?></p>
                </div>

                <?php if ($team_query->have_posts()) : ?>
                <div class="services-team-grid-am">
                    <?php while ($team_query->have_posts()) : $team_query->the_post(); ?>
                    <?php
                        $image = get_field('team_image');
                        $role = get_field('team_role');
                    ?>
                    <article class="services-team-card-am">
                        <?php if (!empty($image['url'])) : ?>
                        <img class="services-team-avatar-am" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? get_the_title()); ?>">
                        <?php elseif (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['class' => 'services-team-avatar-am', 'alt' => esc_attr(get_the_title())]); ?>
                        <?php endif; ?>
                        <div class="services-team-info-am">
                            <h3><?php the_title(); ?></h3>
                            <?php if (!empty($role)) : ?>
                            <div class="services-team-role-am"><?php echo esc_html($role); ?></div>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="btn-am btn-outline-am services-team-btn-am">View Profile</a>
                        </div>
                    </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <div class="text-center-am services-team-footer-am">
                    <a href="<?php echo esc_url($team_group['button_url'] ?? get_post_type_archive_link('team') ?? '#'); ?>" class="btn-am btn-primary-am btn-lg-am">
                        <?php echo esc_html($team_group['button_label'] ?? 'View Full Team'); ?>
                    </a>
                </div>
            </div>
        </section>

        <section class="section-am services-faq-section-am">
            <div class="container-am services-faq-container-am">
                <div class="section-header-am text-center-am">
                    <?php if (!empty($faq_group['eyebrow'])) : ?>
                    <div class="eyebrow-am"><?php echo esc_html($faq_group['eyebrow']); ?></div>
                    <?php endif; ?>
                    <h2><?php echo esc_html($faq_group['heading'] ?? 'Frequently asked questions'); ?></h2>
                    <p><?php echo esc_html($faq_group['description'] ?? 'Common questions about counselling and psychotherapy services.'); ?></p>
                </div>

                <?php if (!empty($faq_group['items'])) : ?>
                <div class="services-faq-list-am">
                    <?php foreach ($faq_group['items'] as $index => $faq) : ?>
                    <details class="services-faq-item-am" <?php echo $index === 0 ? 'open' : ''; ?>>
                        <summary><?php echo esc_html($faq['question'] ?? ''); ?></summary>
                        <div class="services-faq-answer-am">
                            <?php echo wp_kses_post($faq['answer'] ?? ''); ?>
                        </div>
                    </details>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>
