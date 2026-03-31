<?php
/**
 * Copy this file into your theme as either:
 * 1) wp-content/themes/your-theme/page-therapists.php
 * 2) wp-content/themes/your-theme/template-therapists.php (as custom page template)
 *
 * Template Name: Therapists Page
 */

if (!defined('ABSPATH')) exit;

get_header();

$hero_title = function_exists('get_field') ? (string) get_field('therapists_hero_section_title') : '';
if ($hero_title === '') $hero_title = 'Our Therapists';

$hero_desc = function_exists('get_field') ? (string) get_field('therapists_hero_section_description') : '';
if ($hero_desc === '') $hero_desc = 'Meet our licensed therapists and explore their specialties.';

$specialization_filters = [];
$therapist_cards = [];

$query = new WP_Query([
    'post_type' => 'crm_therapist',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
]);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        $post_id = get_the_ID();
$role_classes = '';
        
        // 1. Get the raw title/role string (e.g., "Psychotherapist, Art Therapist")
        $role_text = (string) get_post_meta($post_id, '_crm_role', true); 
        
        if ($role_text !== '') {
            // 2. Split by comma to handle multiple roles per person
            $roles = array_map('trim', explode(',', $role_text));
            
            foreach ($roles as $role) {
                $slug = sanitize_title($role);
                if ($slug) {
                    // Add to the card's CSS classes for JS filtering
                    $role_classes .= ' ' . $slug;
                    // Add to the unique list of filter buttons at the top
                    $role_filters[$slug] = $role; 
                }
            }
        }

        $image_url = (string) get_post_meta($post_id, '_crm_avatar_url', true);
        if ($image_url === '' && has_post_thumbnail($post_id)) {
            $image_url = (string) get_the_post_thumbnail_url($post_id, 'large');
        }

        $therapist_cards[] = [
            'title' => get_the_title(),
            'permalink' => get_permalink(),
            'image_url' => $image_url,
            'role_display' => $role_text,
            'experience' => (string) get_post_meta($post_id, '_crm_years_of_experience', true),
            'client_focus' => (string) get_post_meta($post_id, '_crm_client_focus', true),
            'email' => (string) get_post_meta($post_id, '_crm_email', true),
            'phone' => (string) get_post_meta($post_id, '_crm_phone', true),
            'spec_classes' => $role_classes,
            'specializations' => $role_text,
        ];
    }
    wp_reset_postdata();
}

if (!empty($role_filters)) {
    asort($role_filters, SORT_NATURAL | SORT_FLAG_CASE);
}
?>

<div class="page-container-am">
    <header class="page-header-am">
        <div class="container-am">
            <h1><?php echo esc_html($hero_title); ?></h1>
            <p><?php echo esc_html($hero_desc); ?></p>

            <div class="team-filters-am">
                <button class="filter-btn-am active-am" data-filter="all">All Therapists</button>
                <?php if (!empty($role_filters)) : ?>
                    <?php foreach ($role_filters as $slug => $label) : ?>
                        <button class="filter-btn-am" data-filter="<?php echo esc_attr($slug); ?>">
                            <?php echo esc_html($label); ?>
                        </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <section class="team-directory-section-am">
        <div class="container-am">
            <div class="team-directory-grid-am">
                <?php if (!empty($therapist_cards)) : ?>
                    <?php foreach ($therapist_cards as $card) : ?>
                        <div class="team-card-am<?php echo esc_attr($card['spec_classes']); ?>" style="position:relative; cursor:pointer;" onclick="window.location='<?php echo esc_url($card['permalink']); ?>';">
                            <div class="team-card-image-am">
                                <?php if ($card['image_url'] !== '') : ?>
                                    <img src="<?php echo esc_url($card['image_url']); ?>" alt="<?php echo esc_attr($card['title']); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="team-card-content-am">
                                <h3><a href="<?php echo esc_url($card['permalink']); ?>" style="text-decoration:none; color:inherit;"><?php echo esc_html($card['title']); ?></a></h3>

                                <?php if ($card['role_display'] !== '') : ?>
                                    <div class="team-card-role-am"><?php echo esc_html($card['role_display']); ?></div>
                                <?php endif; ?>

                                <div class="team-card-divider-am"></div>

                                <div class="team-card-meta-am">
                                    <?php if ($card['experience'] !== '') : ?>
                                        <span>
                                            <iconify-icon icon="lucide:briefcase"></iconify-icon>
                                            <?php echo esc_html($card['experience']); ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php if ($card['client_focus'] !== '') : ?>
                                        <span>
                                            <iconify-icon icon="lucide:users"></iconify-icon>
                                            <?php echo esc_html($card['client_focus']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="team-card-contact-am" onclick="event.stopPropagation();">
                                    <?php if ($card['email'] !== '') : ?>
                                        <a href="mailto:<?php echo esc_attr($card['email']); ?>">
                                            <iconify-icon icon="lucide:mail"></iconify-icon>
                                            <?php echo esc_html($card['email']); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($card['phone'] !== '') : ?>
                                        <a href="tel:<?php echo esc_attr($card['phone']); ?>">
                                            <iconify-icon icon="lucide:phone"></iconify-icon>
                                            <?php echo esc_html($card['phone']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <a href="<?php echo esc_url($card['permalink']); ?>" class="btn-am btn-outline-am" style="width:100%">
                                    View Profile
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No therapists found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
