<?php
/**
 * Template Name: Homepage 2 (Dynamic)
 * @package WordPress
 * @subpackage resilience
 */

get_header();

$hp2_get = static function ($field, $default = '', $scope = null) {
    if (!function_exists('get_field')) {
        return $default;
    }
    $value = $scope !== null ? get_field($field, $scope) : get_field($field);
    if ($value === null || $value === '' || $value === []) {
        return $default;
    }
    return $value;
};

$asset_base = trailingslashit(get_template_directory_uri()) . 'assets/images/homepage2';

$topbar_hours = $hp2_get('topbar_hours', 'Mon - Fri, 11:00 AM - 7:00', 'option');
$topbar_address = $hp2_get('topbar_address', '111 Waterloo St Unit 406, London, ON', 'option');
$topbar_phone = $hp2_get('topbar_phone', '+1 (548) 866-0366', 'option');
$topbar_email = $hp2_get('topbar_email', 'mail@resiliencec.com', 'option');
$footer_cell_no = $hp2_get('footer_cell_no', '+1 (226) 210-4170', 'option');
$footer_fax = $hp2_get('footer_fax', '+1 (226) 916-0283', 'option');
$topbar_phone_href = preg_replace('/[^0-9\+]/', '', (string) $topbar_phone);
$topbar_email_href = sanitize_email((string) $topbar_email);

$appointment_url = $hp2_get('appointment_url', $hp2_get('appointment_urll', '#', 'option'), 'option');
$appointment_label = $hp2_get('appointment_label', 'Book an Appointment', 'option');
$login_url = $hp2_get('clinician_login_url', '#', 'option');
$login_label = $hp2_get('clinician_login_label', 'Login', 'option');

$hero = $hp2_get('hero_group', []);
$sidebar = $hp2_get('sidebar_group', []);
$services_group = $hp2_get('services_group', []);
$about = $hp2_get('about_group', []);
$therapies = $hp2_get('therapies_and_counsellors', []);
$stories = $hp2_get('stories_section', []);
$training = $hp2_get('training_group', []);
$online = $hp2_get('hp2_online_group', []);
$contact_group = $hp2_get('hp2_contact_group', []);

$hero_meta_items = [];

if (!empty($hero['stats_repeater']) && is_array($hero['stats_repeater'])) {
    foreach ($hero['stats_repeater'] as $row) {
        if (!empty($row['label']) || !empty($row['value'])) {
            $hero_meta_items[] = [
                'label'     => $row['label'] ?? '',
                'value'     => $row['value'] ?? '',
                'hero_icon' => $row['hero_icon'] ?? '',
            ];
        }
    }
}

if (!$hero_meta_items) {
    $hero_meta_items = [
        [
            'label' => 'Experience',
            'value' => '17 Years+ Years Clinical Experience',
            'hero_icon' => '',
        ],
        [
            'label' => 'Clients',
            'value' => 'Adults, children & families',
            'hero_icon' => '',
        ],
        [
            'label' => 'Languages',
            'value' => 'Support in 5 languages',
            'hero_icon' => '',
        ],
    ];
}

$service_cards = !empty($services_group['services_list']) && is_array($services_group['services_list']) ? $services_group['services_list'] : [];
if (!$service_cards) {
    $service_cards = [
        ['title' => 'Counseling for adults', 'bullet_points' => [['point' => 'University student adjustment'], ['point' => 'Anxiety and depression'], ['point' => 'Refugee and newcomers transition'], ['point' => 'Family challenges and mental health'], ['point' => 'MVA counseling and psychotherapy'], ['point' => 'Anger management.']]],
        ['title' => 'Counseling for children', 'bullet_points' => [['point' => 'ADHD'], ['point' => 'Aspergers and Autism'], ['point' => 'Depression'], ['point' => 'Anxiety Disorder'], ['point' => 'MVA counseling and psychotherapy'], ['point' => 'A-Z of Issues']]],
        ['title' => 'Training and Workshops', 'bullet_points' => [['point' => 'Positive parenting training'], ['point' => 'Islamophobia and mental health'], ['point' => 'Bullying prevention']]],
    ];
}

$footer_services_links = $hp2_get('footer_services_menu', [], 'option');
$footer_clinic_links = $hp2_get('footer_clinic_menu', [], 'option');
$footer_legal_links = $hp2_get('footer_legal_menu', [], 'option');
$footer_logo = $hp2_get('footer_logo', $asset_base . '/177e468f-5a67-4cb9-a050-4f719895ebd5.png', 'option');
if (is_array($footer_logo) && !empty($footer_logo['url'])) {
    $footer_logo = $footer_logo['url'];
}
$footer_address = $hp2_get('footer_address', '111 Waterloo St Unit 406 London, Ontario, Canada N6B 2M4', 'option');

$hp2_image_url = static function ($value, $fallback = '') {
    if (is_array($value)) {
        if (!empty($value['url'])) {
            return $value['url'];
        }
        if (!empty($value['sizes']['large'])) {
            return $value['sizes']['large'];
        }
        return $fallback;
    }
    if (is_string($value) && $value !== '') {
        return $value;
    }
    return $fallback;
};

$hp2_link = static function ($value, $fallback_url = '#', $fallback_label = '') {
    if (!is_array($value)) {
        return ['url' => $fallback_url, 'label' => $fallback_label];
    }
    return [
        'url' => !empty($value['url']) ? $value['url'] : $fallback_url,
        'label' => !empty($value['title']) ? $value['title'] : $fallback_label,
    ];
};

$services_eyebrow = !empty($services_group['eyebrow']) ? $services_group['eyebrow'] : 'Psychotherapy Services';
$services_heading = !empty($services_group['heading']) ? $services_group['heading'] : 'Counselling services tailored to every stage of life.';
$services_description = !empty($services_group['description']) ? $services_group['description'] : 'Our therapists support adults, children, families, and newcomers with practical, compassionate care.';
$services_button_url = !empty($services_group['button_url']) ? $services_group['button_url'] : $appointment_url;
$services_button_label = !empty($services_group['button_label']) ? $services_group['button_label'] : 'Book an Appointment';

$hero_eyebrow = !empty($hero['eyebrow']) ? $hero['eyebrow'] : $hp2_get('hp2_hero_pill', 'Culturally Informed Psyhotherapy in London, Ontario');

$about_eyebrow = !empty($about['eyebrow']) ? $about['eyebrow'] : 'Who we are';
$about_heading = !empty($about['heading']) ? $about['heading'] : 'Care grounded in culture, compassion, and clinical expertise.';
$about_paragraph = !empty($about['paragraph']) ? $about['paragraph'] : 'We help clients move through stress, trauma, and transitions with personalized psychotherapy rooted in evidence-based methods.';
$about_button_url = !empty($about['about_button_url']) ? $about['about_button_url'] : $appointment_url;
$about_button_label = !empty($about['about_button_label']) ? $about['about_button_label'] : 'Learn More';
$about_image = $hp2_image_url($about['image'] ?? '', $asset_base . '/f600fd28-fd3e-41df-a372-60209ea15e45.png');
$about_caption = !empty($about['caption']) ? $about['caption'] : 'Culturally informed and trauma-aware support.';
$about_trust_items = !empty($about['trust_items']) && is_array($about['trust_items']) ? $about['trust_items'] : [
    ['title' => 'Registered professionals', 'description' => 'Experienced psychotherapists and counsellors.', 'icon' => $asset_base . '/aeabdde2-7c19-4cb0-9c67-339e0e6a01d2.svg'],
    ['title' => 'Inclusive care', 'description' => 'Services for refugees, newcomers, and diverse families.', 'icon' => $asset_base . '/b8348d65-8140-4663-b5de-2ac563d19a09.svg'],
    ['title' => 'Flexible formats', 'description' => 'In-person in London and secure online across Ontario.', 'icon' => $asset_base . '/c5a8bc9d-a3ec-4031-b53f-dd7305e64b3d.svg'],
    ['title' => 'Confidential process', 'description' => 'Private, respectful, and client-centered at every step.', 'icon' => $asset_base . '/d154db5b-252c-4001-87e7-bdae5bb45d49.svg'],
];

$therapies_eyebrow = !empty($therapies['eye_brow']) ? $therapies['eye_brow'] : 'What we offer for you';
$therapies_heading = !empty($therapies['heading']) ? $therapies['heading'] : 'Therapies & Counsellors';

$hp2_showcase_cards = [];

$service_showcase_query = new WP_Query([
    'post_type'      => 'crm_services',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'title',
]);

if ($service_showcase_query->have_posts()) {
    while ($service_showcase_query->have_posts()) {
        $service_showcase_query->the_post();

        $post_id = get_the_ID();

        $service_image = get_field('service_image', $post_id);
        $service_desc  = get_field('service_description', $post_id);

        $crm_service_id   = (string) get_post_meta($post_id, '_crm_service_id', true);
        $service_code     = (string) get_post_meta($post_id, '_crm_service_code', true);
        $duration         = (string) get_post_meta($post_id, '_crm_service_duration', true);
        $base_rate        = (string) get_post_meta($post_id, '_crm_base_rate', true);
        $category         = (string) get_post_meta($post_id, '_crm_category', true);
        $categories       = (array) get_post_meta($post_id, '_crm_categories', true);
        $tags             = (array) get_post_meta($post_id, '_crm_tags', true);
        $short_desc_meta  = (string) get_post_meta($post_id, '_crm_short_description', true);
        $crm_image_url    = (string) get_post_meta($post_id, '_crm_service_image_url', true);
        $crm_icon_url     = (string) get_post_meta($post_id, '_crm_service_icon_url', true);
        $featured         = (bool) get_post_meta($post_id, '_crm_featured', true);

        $image_url = $hp2_image_url($service_image, '');

        if ($image_url === '' && $crm_image_url !== '') {
            $image_url = $crm_image_url;
        }
        if ($image_url === '' && $crm_icon_url !== '') {
            $image_url = $crm_icon_url;
        }
        if ($image_url === '' && has_post_thumbnail($post_id)) {
            $thumb_id  = get_post_thumbnail_id($post_id);
            $thumb_src = wp_get_attachment_image_src($thumb_id, 'large');
            $image_url = !empty($thumb_src[0]) ? $thumb_src[0] : '';
        }
        if ($image_url === '') {
            $image_url = $asset_base . '/f600fd28-fd3e-41df-a372-60209ea15e45.png';
        }

        $desc_text = '';

        if (is_string($service_desc) && $service_desc !== '') {
            $desc_text = wp_trim_words(wp_strip_all_tags($service_desc), 12);
        } elseif ($short_desc_meta !== '') {
            $desc_text = wp_trim_words(wp_strip_all_tags($short_desc_meta), 12);
        } else {
            $desc_text = wp_trim_words(get_the_excerpt(), 12);
        }

        $hp2_showcase_cards[] = [
            'id'             => $crm_service_id !== '' ? $crm_service_id : (string) $post_id,
            'title'          => get_the_title($post_id),
            'description'    => $desc_text,
            'image'          => $image_url,
            'icon'           => $crm_icon_url,
            'url'            => get_permalink($post_id),
            'serviceCode'    => $service_code,
            'duration'       => $duration,
            'baseRate'       => $base_rate,
            'category'       => $category,
            'categories'     => $categories,
            'tags'           => $tags,
            'featured'       => $featured,
        ];
    }
    wp_reset_postdata();
}

if (!$hp2_showcase_cards) {
    $hp2_showcase_cards = [
        ['title' => 'Individual Counselling', 'description' => 'Support for anxiety, stress, and life transitions.', 'image' => $asset_base . '/e63e346c-2cd4-4b62-9b1f-eb78e4695136.png', 'url' => '#'],
        ['title' => 'Anger management', 'description' => 'Practical strategies for emotional regulation.', 'image' => $asset_base . '/d231120f-c14e-4a1e-a850-f68ac11baf0d.png', 'url' => '#'],
        ['title' => 'Refugee counselling', 'description' => 'Trauma-informed care for newcomers and refugees.', 'image' => $asset_base . '/0d13b849-155a-4e3d-9520-53236dff6843.png', 'url' => '#'],
    ];
}

$hp2_stats_items = $hp2_get('hp2_stats_items', []);
if (empty($hp2_stats_items) || !is_array($hp2_stats_items)) {
    $hp2_stats_items = [
        ['number' => '17', 'suffix' => '+', 'label' => 'Years experience'],
        ['number' => '1500', 'suffix' => '+', 'label' => 'Clients supported'],
        ['number' => '5', 'suffix' => '+', 'label' => 'Languages'],
        ['number' => '48', 'suffix' => 'h', 'label' => 'Response window'],
    ];
}

$online_eyebrow = !empty($online['eyebrow']) ? $online['eyebrow'] : (!empty($training['eyebrow']) ? $training['eyebrow'] : 'Online Psychotherapists');
$online_heading = !empty($online['heading']) ? $online['heading'] : 'Support from home, with secure online therapy sessions.';
$online_description = !empty($online['description']) ? $online['description'] : 'Access care from anywhere in Ontario with private virtual sessions designed around your schedule.';
$online_button = $hp2_link($online['button'] ?? [], $appointment_url, 'Book an Appointment');
$online_image = $hp2_image_url($online['image'] ?? '', $asset_base . '/e23e060d-5266-42f3-8194-80e6c655b012.jpg');

$testimonials = !empty($stories['testimonials']) && is_array($stories['testimonials']) ? $stories['testimonials'] : [
    ['desc' => 'The team helped me feel understood and supported from day one. The process felt respectful and practical.', 'name' => 'Verified Client'],
    ['desc' => 'I appreciated how culturally aware the sessions were. I felt seen and heard without having to explain everything.', 'name' => 'Client Review'],
    ['desc' => 'Online sessions were easy to join and still deeply personal. I noticed meaningful progress in a few weeks.', 'name' => 'Happy Client'],
];

$news_posts = get_posts([
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
]);
$team_page = get_page_by_path('therapist');
$team_page_url = $team_page ? get_permalink($team_page) : '#';
$service_page = get_page_by_path('our-services');
$service_page_url = $service_page ? get_permalink($service_page) : '#';
$posts_page_id = (int) get_option('page_for_posts');
$posts_page_url = $posts_page_id ? get_permalink($posts_page_id) : '#';
$newsletter_heading = $hp2_get('hp2_newsletter_heading', 'Stay Connected');
$newsletter_description = $hp2_get('hp2_newsletter_description', "If you'd like, you can receive occasional reflections, resources, and updates from us.");
$newsletter_email_placeholder = $hp2_get('hp2_newsletter_email_placeholder', 'Email Address');
$newsletter_name_placeholder = $hp2_get('hp2_newsletter_name_placeholder', 'First Name (Option)');
$newsletter_button_label = $hp2_get('hp2_newsletter_button_label', 'Subscribe');
$newsletter_note = $hp2_get('hp2_newsletter_note', 'You can unsubscribe anytime. Your information is kept private and respected.');
$newsletter_facebook_url = $hp2_get('social_facebook', '#', 'option');
$newsletter_instagram_url = $hp2_get('social_instagram', '#', 'option');

$contact_eyebrow = !empty($contact_group['eyebrow']) ? $contact_group['eyebrow'] : 'Find us on map';
$contact_heading = !empty($contact_group['heading']) ? $contact_group['heading'] : 'Visit our London clinic or connect online.';
$contact_description = !empty($contact_group['description']) ? $contact_group['description'] : 'We provide in-person appointments in London, Ontario, and secure online sessions across the province.';
$map_image = $hp2_image_url($contact_group['map_image'] ?? '', $asset_base . '/628be850-de5f-4f79-95b8-fa16319778d0.png');

$footer_services_heading = $hp2_get('footer_services_heading', 'Quick Links', 'option');
$footer_clinic_heading = $hp2_get('footer_clinic_heading', 'Clinic', 'option');
$footer_info_heading = $hp2_get('footer_info_heading', 'Practical Information', 'option');
$footer_copyright_suffix = $hp2_get('footer_copyright_suffix', 'All rights reserved.', 'option');
?>

<div class="hp2-page">

    <section class="hp2-hero">
        <div class="hp2-container hp2-hero-grid">
            <div class="hp2-hero-copy">
                <div class="hp2-pill"><?php echo esc_html($hero_eyebrow); ?></div>
                <h1><?php echo wp_kses_post(!empty($hero['heading']) ? $hero['heading'] : 'Therapy that respects your journey, heritage, and rhythm.'); ?></h1>
                <p><?php echo esc_html(!empty($hero['lead']) ? $hero['lead'] : 'Resilience Counselling offers evidence-based, trauma-informed psychotherapy for adults, children, families, refugees, and newcomers-available in-person in London and online across Ontario.'); ?></p>
                <div class="hp2-hero-highlights">
                    <?php foreach ($hero_meta_items as $meta_item) : ?>
                        <div class="hp2-hero-highlight">
                            <img src="<?php echo esc_attr(!empty($meta_item['hero_icon']) ? $meta_item['hero_icon'] : 'lucide:heart-handshake'); ?>" alt="icon">
                            <p><?php echo esc_html($meta_item['value']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="hp2-hero-actions">
                    <a href="<?php echo esc_url($appointment_url); ?>" class="hp2-btn hp2-btn-primary"><?php echo esc_html(!empty($hero['primary_button_label']) ? $hero['primary_button_label'] : $appointment_label); ?></a>
                    <a href="<?php echo esc_url($hp2_get('consultation_url', '#', 'option')); ?>" class="hp2-btn hp2-btn-ghost"><?php echo esc_html(!empty($hero['secondary_button_label']) ? $hero['secondary_button_label'] : 'Request a Free Consultation'); ?></a>
                </div>
                <!-- <p class="hp2-hero-note"></p> -->
            </div>

            <aside class="hp2-consult-card">
                <div class="hp2-consult-head">
                    <h2><?php echo esc_html(!empty($sidebar['card_heading']) ? $sidebar['card_heading'] : 'Start with a confidential consult'); ?></h2>
                    <span class="hp2-consult-badge"><?php echo esc_html(!empty($sidebar['card_badge']) ? $sidebar['card_badge'] : 'Accepting new clients'); ?></span>
                </div>
                <div class="hp2-consult-row"><span><iconify-icon icon="lucide:clock-3"></iconify-icon> Session length</span><strong><?php echo esc_html(!empty($sidebar['session_length']) ? $sidebar['session_length'] : '50-60 minutes'); ?></strong></div>
                <div class="hp2-consult-row"><span><iconify-icon icon="lucide:monitor"></iconify-icon> Format</span><strong><?php echo esc_html(!empty($sidebar['format']) ? $sidebar['format'] : 'In-person & secure online'); ?></strong></div>
                <div class="hp2-consult-row"><span><iconify-icon icon="lucide:map-pin"></iconify-icon> Location</span><strong><?php echo esc_html($topbar_address); ?></strong></div>
                <div class="hp2-consult-note"><iconify-icon icon="lucide:globe"></iconify-icon> <p><?php echo esc_html(!empty($sidebar['languages_note']) ? $sidebar['languages_note'] : 'We provide services in multiple languages to better support diverse communities.'); ?></p></div>
                <div class="hp2-consult-languages">
                    <select id="language-select">
                        <option value="english">English</option>
                        <option value="turkish">Turkish</option>
                        <option value="arabic">Arabic</option>
                        <option value="spanish">Spanish</option>
                        <option value="kurmanji">Kurmanji</option>
                        <option value="urdu">Urdu</option>
                    </select>
                </div>
                <a href="<?php echo esc_url($sidebar['hero_card_consultaion_button_url']); ?>" class="hp2-btn hp2-btn-primary hp2-btn-block"><?php echo esc_html($sidebar['hero_card_consultaion_button']); ?></a>
                <div class="hp2-consult-links">
                    <div class="hp2-consult-links-row">
                        <span><?php echo !empty($hero['note']) ? $hero['note'] : 'We respond within 48 hours during office hours. All conversations are confidential.'; ?></span>
                        <!-- <span class="hp2-divider"></span>
                        <span><a href="<?php echo esc_url('mailto:' . $topbar_email_href); ?>"><iconify-icon icon="lucide:mail"></iconify-icon> Email: <?php echo esc_html($topbar_email); ?></a></span> -->
                    </div>
                    <!-- <div class="hp2-consult-links-row hp2-consult-links-row-single">
                        <span><iconify-icon icon="lucide:printer"></iconify-icon> <?php echo esc_html($footer_fax); ?></span>
                    </div> -->
                </div>
            </aside>
        </div>
    </section>

    <!-- <section class="hp2-hero-meta" aria-label="Clinic quick facts">
        <div class="hp2-container hp2-hero-meta-inner">
            <?php foreach ($hero_meta_items as $idx => $meta_item) : ?>
                <div class="hp2-hero-meta-item">
                    <span><?php echo esc_html($meta_item['label']); ?></span>
                    <p><?php echo esc_html($meta_item['value']); ?></p>
                </div>
                <?php if ($idx < count($hero_meta_items) - 1) : ?><span class="hp2-hero-meta-divider" aria-hidden="true"></span><?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section> -->

    <!-- <section class="hp2-services" id="services">
        <div class="hp2-container">
            <div class="hp2-section-head">
                <span class="hp2-pill"><?php echo esc_html($services_eyebrow); ?></span>
                <h2><?php echo $services_heading; ?></h2>
                <p><?php echo esc_html($services_description); ?></p>
            </div>

            <div class="hp2-service-grid">
                <?php foreach ($service_cards as $index => $service_card) : ?>
                    <?php
                    $service_title = !empty($service_card['title']) ? $service_card['title'] : 'Counselling service';
                    $service_desc = !empty($service_card['desc']) ? $service_card['desc'] : '';
                    $service_points = !empty($service_card['bullet_points']) && is_array($service_card['bullet_points']) ? $service_card['bullet_points'] : [];
                    ?>
                    <article class="hp2-service-card">
                        <span class="hp2-service-icon" aria-hidden="true">
                            <img src="<?php echo esc_attr(!empty($service_card['icon']) ? $service_card['icon'] : 'lucide:heart-handshake'); ?>" alt="icon">
                        </span>
                        <h3><?php echo esc_html($service_title); ?></h3>
                        <?php if ($service_desc !== '') : ?>
                            <p><?php echo esc_html($service_desc); ?></p>
                        <?php endif; ?>
                        <ul>
                            <?php if ($service_points) : ?>
                                <?php foreach ($service_points as $point_row) : ?>
                                    <li><?php echo esc_html(!empty($point_row['point']) ? $point_row['point'] : 'Supportive psychotherapy option'); ?></li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <li>Supportive psychotherapy option</li>
                            <?php endif; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="hp2-services-action">
                <a href="<?php echo esc_url($services_button_url); ?>" class="hp2-btn hp2-btn-primary"><?php echo esc_html($services_button_label); ?></a>
            </div>
        </div>
    </section> -->

      <section class="hp2-therapy-showcase">
        <div class="hp2-container">
            <div class="hp2-section-head hp2-section-head-sm">
                <span class="hp2-pill"><?php echo esc_html($therapies_eyebrow); ?></span>
                <h2><?php echo $therapies_heading; ?></h2>
                <p><?php echo esc_html($services_description); ?></p>
            </div>

            <?php
            $showcase_cards = array_values($hp2_showcase_cards);
            $showcase_is_slider = count($showcase_cards) > 1;
            ?>
            <div class="hp2-slider hp2-showcase-slider" data-slider="showcase">
                <?php if ($showcase_is_slider) : ?>
                    <button class="hp2-slider-btn hp2-prev" type="button" aria-label="Previous therapy card"><iconify-icon icon="lucide:chevron-right"></iconify-icon></button>
                <?php endif; ?>
                <div class="hp2-slider-viewport">
                    <div class="hp2-slider-track hp2-showcase-grid">
                        <?php foreach ($showcase_cards as $showcase_card) : ?>
                            <?php
                            $show_title = !empty($showcase_card['title']) ? $showcase_card['title'] : 'Counselling service';
                            $show_desc = !empty($showcase_card['description']) ? $showcase_card['description'] : 'Evidence-based support tailored to your needs.';
                            $show_image = !empty($showcase_card['icon']) ? $showcase_card['icon'] : $asset_base . '/f600fd28-fd3e-41df-a372-60209ea15e45.png';
                            $show_url = !empty($showcase_card['url']) ? $showcase_card['url'] : '#';
                            ?>
                            <article class="hp2-showcase-card">
                                <div class="hp2-showcase-head">
                                    <div class="hp2-showcase-caption">
                                        <span class="hp2-showcase-icon">
                                            <img src="<?php echo esc_url($show_image); ?>" alt="<?php echo esc_attr($show_title . ' icon'); ?>">
                                        </span>
                                        <h3><?php echo esc_html($show_title); ?></h3>
                                    </div>
                                    <a class="hp2-showcase-link" href="<?php echo esc_url($show_url); ?>" aria-label="<?php echo esc_attr('Open ' . $show_title); ?>">
                                        <iconify-icon icon="lucide:arrow-up-right"></iconify-icon>
                                    </a>
                                </div>
                                <p><?php echo esc_html($show_desc); ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if ($showcase_is_slider) : ?>
                    <button class="hp2-slider-btn hp2-next" type="button" aria-label="Next therapy card"><iconify-icon icon="lucide:chevron-right"></iconify-icon></button>
                <?php endif; ?>
            </div>
            <?php if ($showcase_is_slider) : ?>
                <div class="hp2-dots" data-slider-dots="showcase"></div>
            <?php endif; ?>

             <!-- <div class="hp2-showcasee-actions">
                <a href="<?php echo esc_url($service_page_url); ?>" class="hp2-btn hp2-btn-ghost"><?php echo esc_html($hp2_get('service_button_text', 'View All Services')); ?></a>
            </div> -->
        </div>
    </section>

    <section class="hp2-about2" id="about">
        <div class="hp2-container">
            <div class="hp2-about2-grid">
                <div class="hp2-about2-copy">
                    <span class="hp2-pill"><?php echo esc_html($about_eyebrow); ?></span>
                    <h2><?php echo wp_kses_post($about_heading); ?></h2>
                    <p><?php echo wp_kses_post($about_paragraph); ?></p>
                    <a href="<?php echo esc_url($about_button_url); ?>" class="hp2-btn hp2-btn-primary"><?php echo esc_html($about_button_label); ?></a>
                </div>

                <div class="hp2-about2-media">
                    <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($about_heading)); ?>">
                    <!-- <span class="hp2-about2-chip"><span></span><?php echo esc_html($about_caption); ?></span> -->
                </div>
            </div>

            <div class="hp2-feature-row">
                <?php foreach ($about_trust_items as $trust_item) : ?>
                    <?php
                    $trust_icon = $hp2_image_url($trust_item['icon'] ?? '', $asset_base . '/aeabdde2-7c19-4cb0-9c67-339e0e6a01d2.svg');
                    $trust_title = !empty($trust_item['title']) ? $trust_item['title'] : 'Trusted care';
                    $trust_description = !empty($trust_item['description']) ? $trust_item['description'] : 'Client-centered support.';
                    ?>
                    <article>
                        <span class="hp2-feature-icon">
                            <img src="<?php echo esc_url($trust_icon); ?>" alt="<?php echo esc_attr($trust_title); ?> icon">
                        </span>
                        <h3><?php echo esc_html($trust_title); ?></h3>
                        <p><?php echo esc_html($trust_description); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

  

    <!-- <section class="hp2-stats" aria-label="Clinic statistics">
        <div class="hp2-container">
            <div class="hp2-stats-grid">
                <?php foreach (array_values($hp2_stats_items) as $stat_index => $stat_item) : ?>
                    <?php
                    $number = (string) (!empty($stat_item['number']) ? $stat_item['number'] : '0');
                    $suffix = (string) ($stat_item['suffix'] ?? '');
                    $label = (string) (!empty($stat_item['label']) ? $stat_item['label'] : 'Metric');
                    ?>
                    <div class="hp2-stat-item hp2-stat-<?php echo esc_attr(chr(97 + $stat_index)); ?>">
                        <h3 data-counter-target="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $number)); ?>" data-counter-suffix="<?php echo esc_attr($suffix); ?>"><?php echo esc_html($number . $suffix); ?></h3>
                        <p><?php echo esc_html($label); ?></p>
                    </div>
                    <?php if ($stat_index < count($hp2_stats_items) - 1) : ?>
                        <span class="hp2-stat-divider" aria-hidden="true"></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section> -->

    <!-- <section class="hp2-online-session">
        <div class="hp2-container hp2-online-grid">
            <div class="hp2-online-copy">
                <span class="hp2-pill"><?php echo esc_html($online_eyebrow); ?></span>
                <h2><?php echo wp_kses_post($online_heading); ?></h2>
                <p><?php echo wp_kses_post($online_description); ?></p>
                <a href="<?php echo esc_url($online_button['url']); ?>" class="hp2-btn hp2-btn-primary"><?php echo esc_html($online_button['label']); ?></a>
            </div>
            <div class="hp2-online-media">
                <img src="<?php echo esc_url($online_image); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($online_heading)); ?>">
            </div>
        </div>
    </section> -->

    <?php
        $team_cards = [];
        
        // 1. Updated query to use the 'crm_therapist' Custom Post Type
        $team_query = new WP_Query([
            'post_type' => 'crm_therapist',
            'posts_per_page' => 6, // Kept at 8 for the slider limit
            'post_status' => 'publish',
            'orderby' => 'title',  // Added ordering by title to match your directory
            'order' => 'ASC',
        ]);

        if ($team_query->have_posts()) {
            while ($team_query->have_posts()) {
                $team_query->the_post();
                $post_id = get_the_ID();

                // 2. Extracted the image logic from your directory template
                $image_url = (string) get_post_meta($post_id, '_crm_avatar_url', true);
                if ($image_url === '' && has_post_thumbnail($post_id)) {
                    $image_url = (string) get_the_post_thumbnail_url($post_id, 'large');
                }

                // 3. Mapped the crm_therapist meta data into the slider's array structure
                $team_cards[] = [
                    'name' => get_the_title(),
                    'role' => (string) get_post_meta($post_id, '_crm_role', true),
                    // Still passing it through your existing $hp2_image_url function for fallback
                    'image' => isset($hp2_image_url) ? $hp2_image_url($image_url, $asset_base . '/637a1352-8ca9-4499-b686-94f7caf650d2.png') : $image_url,
                    'url' => get_permalink(),
                ];
            }
            wp_reset_postdata();
        }

        // Fallback static cards if no therapists exist yet
        if (!$team_cards) {
            $team_cards = [
                ['name' => 'Clinical Therapist', 'role' => 'Registered Psychotherapist', 'image' => $asset_base . '/637a1352-8ca9-4499-b686-94f7caf650d2.png', 'url' => '#'],
                ['name' => 'Child Counsellor', 'role' => 'Child & Youth Specialist', 'image' => $asset_base . '/a58675df-c5d2-4ebd-89eb-56dd7b817051.png', 'url' => '#'],
                ['name' => 'Family Therapist', 'role' => 'Family Counselling', 'image' => $asset_base . '/3ec05e04-a119-4ede-b7eb-268ddd848496.png', 'url' => '#'],
                ['name' => 'Trauma Specialist', 'role' => 'Trauma-informed Care', 'image' => $asset_base . '/f600fd28-fd3e-41df-a372-60209ea15e45.png', 'url' => '#'],
            ];
        }
    ?>
    
    <section class="hp2-specialists" id="specialists">
        <div class="hp2-container">
            <div class="hp2-specialists-head">
                <div>
                    <span class="hp2-pill"><?php echo esc_html($hp2_get('team_section_eyebrow', 'Our Specialists')); ?></span>
                    <h2><?php echo $hp2_get('team_section_heading', 'Meet Our Therapists'); ?></h2>
                </div>
                <p><?php echo esc_html($hp2_get('team_section_description', 'Our team includes experienced clinicians offering supportive care for adults, children, and families.')); ?></p>
            </div>

            <div class="hp2-slider" data-slider="team" data-slider-offset="80">
                <button class="hp2-slider-btn hp2-prev" type="button" aria-label="Previous specialists slide"><iconify-icon icon="lucide:chevron-right"></iconify-icon></button>
                <div class="hp2-slider-viewport">
                    <div class="hp2-slider-track">
                        <?php foreach ($team_cards as $team_card) : ?>
                            <a class="hp2-team-card" href="<?php echo esc_url($team_card['url']); ?>">
                                <?php if (!empty($team_card['image'])) : ?>
                                    <img src="<?php echo esc_url($team_card['image']); ?>" alt="<?php echo esc_attr($team_card['name']); ?>">
                                <?php endif; ?>
                                <h3><?php echo esc_html($team_card['name']); ?></h3>
                                <p><?php echo esc_html(str_replace(',', ' |', $team_card['role'])); ?></p>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="hp2-slider-btn hp2-next" type="button" aria-label="Next specialists slide"><iconify-icon icon="lucide:chevron-right"></iconify-icon></button>
            </div>
            <div class="hp2-dots" data-slider-dots="team"></div>

            <div class="hp2-specialists-actions">
                <a href="<?php echo esc_url($team_page_url); ?>" class="hp2-btn hp2-btn-ghost"><?php echo esc_html($hp2_get('team_button_text', 'View All Team Member')); ?></a>
            </div>
        </div>
    </section>

    <!-- <section class="hp2-testimonials">
        <div class="hp2-container">
            <div class="hp2-section-head hp2-section-head-sm">
                <span class="hp2-pill"><?php echo esc_html($stories['eyebrow'] ? $stories['eyebrow'] : 'Testimonials'); ?></span>
                <h2><?php echo !empty($stories['heading']) ? $stories['heading'] : 'What our clients say'; ?></h2>
            </div>
            <div class="hp2-slider hp2-testimonial-slider" data-slider="testimonial">
                <button class="hp2-slider-btn hp2-prev" type="button" aria-label="Previous testimonial"><iconify-icon icon="lucide:chevron-right"></iconify-icon></button>
                <div class="hp2-slider-viewport">
                    <div class="hp2-slider-track">
                        <?php foreach ($testimonials as $testimonial) : ?>
                            <article class="hp2-testimonial-card">
                                <div class="hp2-testimonial-quote">
                                    <img src="<?php echo esc_url($asset_base . '/25c0cf4a-49a3-4cd0-9d2f-5c9677db6a27.svg'); ?>" alt="">
                                </div>
                                <p><?php echo esc_html(!empty($testimonial['desc']) ? $testimonial['desc'] : 'Great support and compassionate care.'); ?></p>
                                <div class="hp2-testimonial-meta">
                                    <img class="hp2-testimonial-avatar" src="<?php echo esc_url($asset_base . '/053f7543-f11b-47b3-bc61-f09eb90e11a9.png'); ?>" alt="">
                                    <div class="hp2-testimonial-meta-text">
                                        <h3><?php echo esc_html(!empty($testimonial['name']) ? $testimonial['name'] : 'Verified Client'); ?></h3>
                                        <span class="hp2-testimonial-stars">
                                            <img src="<?php echo esc_url($asset_base . '/28f9e8cc-246b-4397-af23-0874cd6dab7c.svg'); ?>" alt="">
                                            <img src="<?php echo esc_url($asset_base . '/28f9e8cc-246b-4397-af23-0874cd6dab7c.svg'); ?>" alt="">
                                            <img src="<?php echo esc_url($asset_base . '/28f9e8cc-246b-4397-af23-0874cd6dab7c.svg'); ?>" alt="">
                                            <img src="<?php echo esc_url($asset_base . '/28f9e8cc-246b-4397-af23-0874cd6dab7c.svg'); ?>" alt="">
                                            <img src="<?php echo esc_url($asset_base . '/28f9e8cc-246b-4397-af23-0874cd6dab7c.svg'); ?>" alt="">
                                        </span>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="hp2-slider-btn hp2-next" type="button" aria-label="Next testimonial"><iconify-icon icon="lucide:chevron-right"></iconify-icon></button>
            </div>
            <div class="hp2-dots" data-slider-dots="testimonial"></div>
        </div>
    </section> -->

    <section class="hp2-news" id="news">
        <div class="hp2-container">
            <div class="hp2-section-head">
                <span class="hp2-pill"><?php echo esc_html($hp2_get('hp2_news_eyebrow', 'Latest Insights')); ?></span>
                <h2><?php echo esc_html($hp2_get('hp2_news_heading', 'Recent articles and updates')); ?></h2>
            </div>

            <div class="hp2-news-grid">
                <?php if ($news_posts) : ?>
                    <?php foreach ($news_posts as $news_post) : ?>
                        <?php
                        $news_image = get_the_post_thumbnail_url($news_post, 'large');
                        if (!$news_image) {
                            $news_image = $asset_base . '/e63e346c-2cd4-4b62-9b1f-eb78e4695136.png';
                        }
                        ?>
                        <article class="hp2-news-card">
                            <img src="<?php echo esc_url($news_image); ?>" alt="<?php echo esc_attr(get_the_title($news_post)); ?>">

                            <div class="hp2-news-tags">
                                    <?php 
                                    // Fetch all categories for the current post
                                    $categories = get_the_category($news_post->ID);

                                    if (!empty($categories)) : 
                                        // Loop through each category and wrap it in a div
                                        foreach ($categories as $category) : 
                                    ?>
                                    <span><?php echo esc_html($category->name); ?></span>
                                    <?php 
                                        endforeach; 
                                    endif; 
                                    ?>
                            </div>
                        
                            <h3><?php echo esc_html(get_the_title($news_post)); ?></h3>
                            <a href="<?php echo esc_url(get_permalink($news_post)); ?>">
                                Read More
                                <iconify-icon icon="lucide:arrow-up-right"></iconify-icon>
                            </a>
                        </article>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php for ($i = 0; $i < 3; $i++) : ?>
                        <article class="hp2-news-card">
                            <img src="<?php echo esc_url($asset_base . '/f600fd28-fd3e-41df-a372-60209ea15e45.png'); ?>" alt="News item">
                            <div class="hp2-news-tags"><span>Update</span></div>
                            <h3>New mental health resource update</h3>
                            <a href="#">Read More <iconify-icon icon="lucide:arrow-up-right"></iconify-icon></a>
                        </article>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>

            <div class="hp2-news-actions">
                <a href="<?php echo esc_url($posts_page_url); ?>" class="hp2-btn hp2-btn-ghost"><?php echo esc_html($hp2_get('hp2_news_button_label', 'View all updates')); ?></a>
            </div>
        </div>
    </section>

    <section class="hp2-newsletter" id="newsletter">
        <div class="hp2-container-newsletter">
            <div class="hp2-newsletter-card">
                <div class="hp2-newsletter-grid">
                    <div class="hp2-newsletter-copy">
                        <h2><?php echo esc_html($newsletter_heading); ?></h2>
                        <p><?php echo esc_html($newsletter_description); ?></p>
                    </div>

                    <form class="hp2-newsletter-form" action="" method="post" novalidate>
                        <label class="screen-reader-text" for="hp2-newsletter-email">Email Address</label>
                        <input id="hp2-newsletter-email" type="email" name="hp2_newsletter_email" placeholder="<?php echo esc_attr($newsletter_email_placeholder); ?>">

                        <label class="screen-reader-text" for="hp2-newsletter-name">First Name</label>
                        <input id="hp2-newsletter-name" type="text" name="hp2_newsletter_name" placeholder="<?php echo esc_attr($newsletter_name_placeholder); ?>">

                        <button type="submit" class="hp2-btn hp2-btn-primary"><?php echo esc_html($newsletter_button_label); ?></button>
                    </form>
                </div>

                <div class="hp2-newsletter-foot">
                    <p><?php echo esc_html($newsletter_note); ?></p>
                    <div class="hp2-newsletter-social">
                        <a href="<?php echo esc_url($newsletter_facebook_url); ?>" aria-label="Facebook">
                            <iconify-icon icon="lucide:facebook"></iconify-icon>
                        </a>
                        <a href="<?php echo esc_url($newsletter_instagram_url); ?>" aria-label="Instagram">
                            <iconify-icon icon="lucide:instagram"></iconify-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="hp2-contact-map" id="contact">
        <div class="hp2-container hp2-contact-grid">
            <div class="hp2-contact-copy">
                <span class="hp2-pill"><?php echo esc_html($contact_eyebrow); ?></span>
                <h2><?php echo esc_html($contact_heading); ?></h2>
                <p><?php echo esc_html($contact_description); ?></p>

                <div class="hp2-contact-cards">
                    <div class="hp2-contact-card">
                        <iconify-icon icon="lucide:map-pin"></iconify-icon>
                        <div>
                            <small>Address</small>
                            <strong><?php echo esc_html($footer_address); ?></strong>
                        </div>
                    </div>
                    <div class="hp2-contact-card">
                        <iconify-icon icon="lucide:phone"></iconify-icon>
                        <div>
                            <small>Phone</small>
                            <strong><a href="<?php echo esc_url('tel:' . $topbar_phone_href); ?>"><?php echo esc_html($topbar_phone); ?></a></strong>
                        </div>
                    </div>
                    <div class="hp2-contact-card">
                        <iconify-icon icon="lucide:mail"></iconify-icon>
                        <div>
                            <small>Email</small>
                            <strong><a href="<?php echo esc_url('mailto:' . $topbar_email_href); ?>"><?php echo esc_html($topbar_email); ?></a></strong>
                        </div>
                    </div>
                    <div class="hp2-contact-card">
                        <iconify-icon icon="lucide:clock-3"></iconify-icon>
                        <div>
                            <small>Hours</small>
                            <strong><?php echo esc_html($topbar_hours); ?></strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hp2-map-wrap">
                <img src="<?php echo esc_url($map_image); ?>" alt="Clinic map">
                <span class="hp2-map-pin" aria-hidden="true">
                    <img class="hp2-map-pin-bg" src="<?php echo esc_url($asset_base . '/6fe327d8-26e6-4f2a-b5e8-61f532482b1e.svg'); ?>" alt="">
                    <img class="hp2-map-pin-icon" src="<?php echo esc_url($asset_base . '/cf801acf-e691-438a-9426-3a1beeb4d4c0.svg'); ?>" alt="">
                </span>
            </div>
        </div>
    </section> -->

</div>

<?php get_footer(); ?>
