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

$team_limit = (int) ($team_group['posts_per_page'] ?? 3);
if ($team_limit <= 0) {
    $team_limit = 3;
}

$service_query = new WP_Query([
    'post_type'      => 'service',
    'post_status'    => 'publish',
    'posts_per_page' => $service_limit,
    'order'          => 'ASC',
]);

$team_query = new WP_Query([
    'post_type'      => 'team',
    'post_status'    => 'publish',
    'posts_per_page' => $team_limit,
    'order'          => 'ASC',
]);
?>

<div class="page-container-am page-container services-page-am">
  <main>
    <section class="services-hero section-am services-hero-am">
      <div class="container container-am services-hero-grid services-hero-grid-am">
        <div class="services-hero-content services-hero-copy-am">
          <?php if (!empty($hero_group['eyebrow'])) : ?>
          <div class="eyebrow-am section-subtitle"><?php echo esc_html($hero_group['eyebrow']); ?></div>
          <?php endif; ?>

          <h1><?php echo esc_html($hero_group['heading'] ?? get_the_title()); ?></h1>
          <?php echo $hero_group['description'] ?? 'Culturally informed psychotherapy services for individuals, couples, and families.'; ?>

          <?php if (!empty($hero_group['stats'])) : ?>
          <div class="services-hero-stats services-hero-stats-am">
            <?php foreach ($hero_group['stats'] as $stat) : ?>
            <div class="stat-item services-hero-stat-am">
              <h4><?php echo esc_html($stat['value'] ?? ''); ?></h4>
              <p><?php echo esc_html($stat['label'] ?? ''); ?></p>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>

        <div class="services-hero-image services-hero-media-am">
          <?php
          $hero_image = $hero_group['image'] ?? '';
          $hero_url = '';
          $hero_alt = '';
          if (is_array($hero_image) && !empty($hero_image['url'])) {
              $hero_url = $hero_image['url'];
              $hero_alt = $hero_image['alt'] ?? '';
          } elseif (is_string($hero_image)) {
              $hero_url = $hero_image;
          }
          if (!empty($hero_url)) :
          ?>
          <img src="<?php echo esc_url($hero_url); ?>" alt="<?php echo esc_attr($hero_alt); ?>">
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="services-grid-section section-am">
      <div class="container container-am">
        <div class="section-title-wrapper section-header-am text-center-am">
          <?php if (!empty($cards_group['eyebrow'])) : ?>
          <div class="eyebrow-am section-subtitle"><?php echo esc_html($cards_group['eyebrow']); ?></div>
          <?php endif; ?>
          <h2><?php echo esc_html($cards_group['heading'] ?? 'What we offer'); ?></h2>
        </div>

        <?php if ($service_query->have_posts()) : ?>
        <div class="service-cards services-cards-grid-am">
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
          <div class="service-card services-card-am">
            <?php if (!empty($card_url)) : ?>
            <div class="service-card-img services-card-image-am">
              <img src="<?php echo esc_url($card_url); ?>" alt="<?php echo esc_attr($card_alt); ?>">
            </div>
            <?php endif; ?>
            <div class="service-card-content services-card-content-am">
              <h3><?php echo esc_html($card_title); ?></h3>
              <p><?php echo esc_html($card_desc); ?></p>
              <a href="<?php the_permalink(); ?>" class="service-link read-more-link-am" data-media-type="banani-button">
                <?php echo esc_html($card_btn); ?>
                <div style="width: 16px; height: 16px; display: flex; align-items: center; justify-content: center;">
                  <iconify-icon icon="lucide:arrow-right" style="font-size: 16px"></iconify-icon>
                </div>
              </a>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </section>

    <section class="why-choose-section section-am section-muted-am">
      <div class="container container-am">
        <?php if (!empty($why_group['cta_heading']) || !empty($why_group['cta_description'])) : ?>
        <div class="cta-banner services-cta-am">
          <div>
            <h3><?php echo esc_html($why_group['cta_heading'] ?? 'Start where you are'); ?></h3>
            <p><?php echo esc_html($why_group['cta_description'] ?? 'Talk to our team and choose the support path that fits your goals.'); ?></p>
          </div>
          <div class="nav-actions">
            <div style="font-size: 24px; font-weight: 700; color: white; margin-right: 16px;">
              <?php echo esc_html($why_group['cta_phone_text'] ?? ('Call: ' . (get_field('topbar_phone', 'option') ?: '+1 (226) 721-0161'))); ?>
            </div>
            <a href="<?php echo esc_url($why_group['cta_button_url'] ?? get_field('appointment_url', 'option') ?? '#'); ?>"
              class="btn btn-am btn-lg btn-lg-am services-cta-btn-am" data-media-type="banani-button">
              <?php echo esc_html($why_group['cta_button_label'] ?? 'Book Online'); ?>
            </a>
          </div>
        </div>
        <?php endif; ?>

        <div class="section-title-wrapper section-header-am text-center-am">
          <?php if (!empty($why_group['eyebrow'])) : ?>
          <div class="eyebrow-am section-subtitle"><?php echo esc_html($why_group['eyebrow']); ?></div>
          <?php endif; ?>
          <h2><?php echo esc_html($why_group['heading'] ?? 'Why choose us'); ?></h2>
        </div>

        <?php if (!empty($why_group['pillars'])) : ?>
        <div class="pillars-grid services-pillars-grid-am">
          <?php foreach ($why_group['pillars'] as $pillar) : ?>
          <div class="pillar-item services-pillar-am">
            <div class="pillar-icon services-pillar-icon-am">
              <iconify-icon icon="<?php echo esc_attr($pillar['icon'] ?? 'lucide:shield-check'); ?>"></iconify-icon>
            </div>
            <h4><?php echo esc_html($pillar['title'] ?? ''); ?></h4>
            <p><?php echo esc_html($pillar['description'] ?? ''); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="approach-section section-am">
      <div class="container container-am">
        <div class="section-title-wrapper section-header-am text-center-am">
          <?php if (!empty($approach_group['eyebrow'])) : ?>
          <div class="eyebrow-am section-subtitle"><?php echo esc_html($approach_group['eyebrow']); ?></div>
          <?php endif; ?>
          <h2><?php echo esc_html($approach_group['heading'] ?? 'Our approach'); ?></h2>
          <p style="max-width: 800px; margin: 0 auto 48px; font-size: 18px;">
            <?php echo esc_html($approach_group['description'] ?? 'We provide a secure, confidential, and non-judgmental environment.'); ?>
          </p>
        </div>

        <?php if (!empty($approach_group['columns'])) : ?>
        <div class="approach-grid services-approach-grid-am">
          <?php foreach ($approach_group['columns'] as $column) : ?>
          <div class="approach-col services-approach-col-am">
            <h3>
              <div class="icon-wrapper">
                <iconify-icon icon="<?php echo esc_attr($column['icon'] ?? 'lucide:check-circle'); ?>" style="font-size:24px"></iconify-icon>
              </div>
              <?php echo esc_html($column['title'] ?? ''); ?>
            </h3>
            <?php if (!empty($column['text'])) : ?>
            <p class="approach-text"><?php echo esc_html($column['text']); ?></p>
            <?php endif; ?>
            <?php if (!empty($column['text_2'])) : ?>
            <p class="approach-text"><?php echo esc_html($column['text_2']); ?></p>
            <?php endif; ?>
            <?php if (!empty($column['points'])) : ?>
            <ul class="approach-list">
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

    <section class="team-teaser-section section-am section-muted-am">
      <div class="container container-am">
        <div class="section-title-wrapper section-header-am text-center-am">
          <?php if (!empty($team_group['eyebrow'])) : ?>
          <div class="eyebrow-am section-subtitle"><?php echo esc_html($team_group['eyebrow']); ?></div>
          <?php endif; ?>
          <h2><?php echo esc_html($team_group['heading'] ?? 'Meet Our Specialists'); ?></h2>
          <p style="max-width: 600px; margin: 16px auto 0;">
            <?php echo esc_html($team_group['description'] ?? 'We aim for safety and security to encourage positive change through evidence-based practice.'); ?>
          </p>
        </div>

        <?php if ($team_query->have_posts()) : ?>
        <div class="team-grid services-team-grid-am">
          <?php while ($team_query->have_posts()) : $team_query->the_post(); ?>
          <?php
          $image = get_field('team_image');
          $role = get_field('team_role');
          $img_url = '';
          $img_alt = get_the_title();
          if (is_array($image) && !empty($image['url'])) {
              $img_url = $image['url'];
              $img_alt = $image['alt'] ?? get_the_title();
          } elseif (has_post_thumbnail()) {
              $thumb_id = get_post_thumbnail_id();
              $thumb_src = wp_get_attachment_image_src($thumb_id, 'medium');
              if (!empty($thumb_src[0])) {
                  $img_url = $thumb_src[0];
              }
          }
          ?>
          <div class="team-card services-team-card-am">
            <?php if (!empty($img_url)) : ?>
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="team-avatar services-team-avatar-am" />
            <?php endif; ?>
            <h4><?php the_title(); ?></h4>
            <?php if (!empty($role)) : ?>
            <div class="team-role services-team-role-am"><?php echo esc_html($role); ?></div>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-am btn-outline btn-outline-am services-team-btn-am" style="width:100%" data-media-type="banani-button">
              View Profile
            </a>
          </div>
          <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <div class="text-center-am" style="margin-top: 48px">
          <a href="<?php echo esc_url($team_group['button_url'] ?? get_post_type_archive_link('team') ?? '#'); ?>"
            class="btn btn-am btn-primary btn-primary-am btn-lg btn-lg-am" data-media-type="banani-button">
            <?php echo esc_html($team_group['button_label'] ?? 'View Full Team'); ?>
          </a>
        </div>
      </div>
    </section>

    <section class="faq-section container services-faq-section-am services-faq-container-am container-am">
      <div class="section-title-wrapper section-header-am text-center-am">
        <?php if (!empty($faq_group['eyebrow'])) : ?>
        <div class="eyebrow-am section-subtitle"><?php echo esc_html($faq_group['eyebrow']); ?></div>
        <?php endif; ?>
        <h2><?php echo esc_html($faq_group['heading'] ?? 'Frequently Asked Questions'); ?></h2>
        <p><?php echo esc_html($faq_group['description'] ?? 'Common questions about how therapy works and insurance coverage.'); ?></p>
      </div>

      <?php if (!empty($faq_group['items'])) : ?>
      <div class="faq-list services-faq-list-am">
        <?php foreach ($faq_group['items'] as $index => $faq) : ?>
        <div class="faq-item services-faq-item-am">
          <div class="faq-question" data-media-type="banani-button">
            <?php echo esc_html($faq['question'] ?? ''); ?>
            <div style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">
              <iconify-icon
                icon="lucide:<?php echo $index === 0 ? 'chevron-up' : 'chevron-down'; ?>"
                style="font-size: 20px; color: <?php echo $index === 0 ? 'var(--primary)' : 'var(--muted-foreground)'; ?>"></iconify-icon>
            </div>
          </div>
          <div class="faq-answer services-faq-answer-am"<?php echo $index > 0 ? ' style="display:none"' : ''; ?>>
            <?php echo wp_kses_post($faq['answer'] ?? ''); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </section>
  </main>
</div>

<?php get_footer(); ?>
