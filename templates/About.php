<?php

/**
 * Template Name: About Template
 * @package WordPress
 * @subpackage resilience
 * @since resilience 1.0
 */
get_header();

$about_group = function_exists('get_field') ? get_field('about_page_group') : [];
$about_group = is_array($about_group) ? $about_group : [];

$intro_eyebrow = $about_group['intro_eyebrow'] ?? 'RESILIENCE COUNSELING - LONDON ONTARIO';
$intro_heading = $about_group['intro_heading'] ?? 'We help our clients to explore their resilience';

$intro_paragraphs = $about_group['intro_paragraphs'] ?? [];
$intro_paragraphs = is_array($intro_paragraphs) ? $intro_paragraphs : [];
if (empty($intro_paragraphs)) {
    $intro_paragraphs = [
        [
            'paragraph' => 'We provide counseling and psychotherapy services for the local community. We are available to support our clients while they are feeling emotionally intense or going through some life transition. We are trained in using different psychotherapy approaches to respond to our client\'s unique needs.',
        ],
        [
            'paragraph' => 'Our Resilience approach is to help our clients reduce the impact of adversity and refocus on the resources that can be utilized and optimized. Our Resilience approach is situated not just about bouncing back from adversity but also about thriving and growing.',
        ],
    ];
}

$intro_image = $about_group['intro_image'] ?? [];
$intro_image_url = '';
$intro_image_alt = 'Resilience Counseling office';
if (is_array($intro_image) && !empty($intro_image['url'])) {
    $intro_image_url = $intro_image['url'];
    $intro_image_alt = $intro_image['alt'] ?? $intro_image_alt;
} elseif (is_string($intro_image) && !empty($intro_image)) {
    $intro_image_url = $intro_image;
}

$psychotherapy_heading = $about_group['psychotherapy_heading'] ?? 'What is Psychotherapy and why it is important?';
// $about_video_embed_url = trim((string) ($about_group['psychotherapy_video_url'] ?? ''));

$video_file = $about_group['psychotherapy_video'] ?? null;

// 2. Extract the URL from the array
$video_url = '';
if ( is_array($video_file) && !empty($video_file['url']) ) {
    $video_url = $video_file['url'];
} elseif ( is_string($video_file) && !empty($video_file) ) {
    // Fallback in case ACF is returning just the ID or URL string
    $video_url = is_numeric($video_file) ? wp_get_attachment_url($video_file) : $video_file;
}

$trust_eyebrow = $about_group['trust_eyebrow'] ?? 'WHY PEOPLE TRUST US?';
$trust_heading = $about_group['trust_heading'] ?? 'People Trust Us';
$trust_description = $about_group['trust_description'] ?? 'We are a group of professional and experienced counselors and psychotherapists. Our team offers a range of psychotherapeutic approaches and techniques to address a variety of issues from depression and anxiety to trauma and relationship issues.';

$trust_items = $about_group['trust_items'] ?? [];
$trust_items = is_array($trust_items) ? $trust_items : [];
if (empty($trust_items)) {
    $trust_items = [
        [
            'icon' => 'lucide:globe',
            'title' => 'Culture-sensitive care',
            'description' => 'Our team brings cultural awareness to the assessment and treatment of mental health issues.',
        ],
        [
            'icon' => 'lucide:shield-check',
            'title' => 'Trauma-informed approach',
            'description' => 'Our team is aware of and understands the client\'s needs for safety, choice, collaboration, trustworthiness, and empowerment that allow the processing of painful emotions.',
        ],
        [
            'icon' => 'lucide:sparkles',
            'title' => 'Transformative',
            'description' => 'We strive to provide our clients with the resources and skills necessary to take charge of their own lives and initiate positive change.',
        ],
    ];
}
?>

<div class="page-container-am about-page-am">
    <main>
        <section class="section-am section-muted-am">
            <div class="container-am about-page-intro-grid-am">
                <div class="about-page-copy-am">
                    <div class="eyebrow-am"><?php echo esc_html($intro_eyebrow); ?></div>
                    <h1><?php echo esc_html($intro_heading); ?></h1>
                    <?php foreach ($intro_paragraphs as $intro_paragraph) : ?>
                        <?php if (!empty($intro_paragraph['paragraph'])) : ?>
                        <p><?php echo esc_html($intro_paragraph['paragraph']); ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="about-page-image-wrap-am">
                    <?php if (!empty($intro_image_url)) : ?>
                    <div class="about-page-image-frame-am">
                        <img src="<?php echo esc_url($intro_image_url); ?>" alt="<?php echo esc_attr($intro_image_alt); ?>">
                    </div>
                    <?php else : ?>
                    <div class="about-page-image-placeholder-am">
                        <iconify-icon icon="lucide:image" aria-hidden="true"></iconify-icon>
                        <span>Add ACF image field: <strong>about_page_group &gt; intro_image</strong></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="section-am">
            <div class="container-am">
                <div class="section-header-am text-center-am">
                    <h2><?php echo esc_html($psychotherapy_heading); ?></h2>
                </div>

<div class="about-video-shell-am">
    <?php if (!empty($video_url)) : ?>
        <video 
            controls 
            preload="metadata" 
            playsinline
            class="about-video-player-am"
            style="width:100%; height:auto; display: block; aspect-ratio: 16/9; background: #000;">
            <source src="<?php echo esc_url($video_url); ?>" type="video/webm">
            Your browser does not support the video tag.
        </video>
    <?php else : ?>
        <div class="about-video-placeholder-am">
            <iconify-icon icon="lucide:video" aria-hidden="true"></iconify-icon>
            <p><strong>Debug Info:</strong> No video URL found. Check if the field name <code>psychotherapy_video_file</code> is correct inside the <code>about_page_group</code>.</p>
        </div>
    <?php endif; ?>
</div>
            </div>
        </section>

        <section class="section-am section-muted-am">
            <div class="container-am">
                <div class="section-header-am text-center-am">
                    <div class="eyebrow-am"><?php echo esc_html($trust_eyebrow); ?></div>
                    <h2><?php echo esc_html($trust_heading); ?></h2>
                    <p><?php echo esc_html($trust_description); ?></p>
                </div>

                <div class="about-trust-grid-am">
                    <?php foreach ($trust_items as $trust_item) : ?>
                    <article class="about-trust-card-am">
                        <div class="about-trust-icon-am">
                            <iconify-icon icon="<?php echo esc_attr($trust_item['icon'] ?? 'lucide:shield-check'); ?>" aria-hidden="true"></iconify-icon>
                        </div>
                        <h3><?php echo esc_html($trust_item['title'] ?? ''); ?></h3>
                        <p><?php echo esc_html($trust_item['description'] ?? ''); ?></p>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
</div>

<?php
get_footer();
?>
