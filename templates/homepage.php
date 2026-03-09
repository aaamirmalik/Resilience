<?php

/**
 * Template Name: Home Page
 * @package WordPress
 * @subpackage resilience
 * @since resilience 1.0
 */
// Include header
get_header();
?>

<div class="page-container-am">

    <?php 
    // Load Groups
    $hero    = get_field('hero_group');
    $sidebar = get_field('sidebar_group');
    $service_sec = get_field('services_group');
    $about   = get_field('about_group');
    $train   = get_field('training_group');
    $story_sec   = get_field('stories_section');
    $steps_sec = get_field('steps_group');

    if($hero){
    ?>

    <section class="hero-am">
        <div class="container-am hero-inner-am">
            <div class="hero-main-am">
                <div class="hero-preheader-am">
                    <div class="hero-preheader-divider-am"></div>
                    <div class="eyebrow-am">
                        <?php echo esc_html($hero['eyebrow'] ?: 'Culturally informed psychotherapy'); ?>
                    </div>
                </div>

                <h1><?php echo wp_kses_post($hero['heading'] ?: 'Professional counselling...'); ?></h1>

                <p class="hero-lead-am"><?php echo esc_html($hero['lead'] ?: 'Resilience Counselling offers...'); ?></p>

                <div class="hero-actions-am">
                    <a href="<?php echo esc_url(get_field('appointment_url', 'option') ?: '#'); ?>"
                        class="btn-am btn-primary-am btn-lg-am">
                        <?php echo esc_html($hero['primary_button_label'] ?: 'Book an Appointment'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_field('consultation_url', 'option') ?: '#'); ?>"
                        class="btn-am btn-ghost-am btn-lg-am">
                        <?php echo esc_html($hero['secondary_button_label'] ?: 'Request a Free Consultation'); ?>
                    </a>
                </div>

                <?php if($hero['note']): ?>
                <div class="hero-note-am"><?php echo esc_html($hero['note']); ?></div>
                <?php endif; ?>

                <div class="hero-meta-row-am">
                    <?php if($hero['stats_repeater']): foreach($hero['stats_repeater'] as $stat): ?>
                    <div class="hero-meta-item-am">
                        <div class="hero-meta-label-am"><?php echo esc_html($stat['label']); ?></div>
                        <div class="hero-meta-value-am"><?php echo esc_html($stat['value']); ?></div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            <?php
if($sidebar){
?>
            <aside class="hero-side-card-am">
                <div class="hero-side-header-am">
                    <h3><?php echo esc_html($sidebar['card_heading'] ?: 'Start with a consult'); ?></h3>
                    <span
                        class="hero-side-badge-am"><?php echo esc_html($sidebar['card_badge'] ?: 'Accepting new clients'); ?></span>
                </div>
                <div class="hero-side-body-am">
                    <div class="hero-side-row-am"><span>Session length</span>
                        <strong><?php echo esc_html($sidebar['session_length']); ?></strong>
                    </div>
                    <div class="hero-side-row-am"><span>Format</span>
                        <span><?php echo esc_html($sidebar['format']); ?></span>
                    </div>
                    <div class="hero-side-row-am"><span>Location</span>
                        <span><?php echo esc_html(get_field('topbar_address', 'option')); ?></span>
                    </div>
                    <div class="hero-side-languages-am"><?php echo esc_html($sidebar['languages_note']); ?></div>
                </div>
                <div class="hero-side-contact-am">
                    <div class="hero-side-contact-item-am">
                        <a href="tel:<?php echo esc_attr(get_field('topbar_phone', 'option')); ?>">
                        <iconify-icon icon="lucide:phone"></iconify-icon>
                        <?php echo esc_html(get_field('topbar_phone', 'option')); ?>
                        </a>
                    </div>
                    <div class="hero-side-contact-item-am">
                        <a href="mailto:<?php echo esc_attr(get_field('topbar_email', 'option')); ?>">
                        <iconify-icon icon="lucide:mail"></iconify-icon>
                        <?php echo esc_html(get_field('topbar_email', 'option')); ?>
                        </a>
                    </div>
                    <a href="<?php echo esc_url(get_field('appointment_url', 'option') ?: '#'); ?>"
                        class="btn-am btn-primary-am btn-lg-am" style="width:100%; display:block; margin-top:8px;">
                        <?php echo esc_html(get_field('appointment_label', 'option') ?: 'Make an Appointment'); ?>
                    </a>
                </div>
            </aside>
            <?php } ?>
        </div>
    </section>
    <?php } 
if($service_sec){
?>
    <section class="section-am">
        <div class="container-am">
            <div class="section-header-am text-center-am">
                <div class="eyebrow-am"><?php echo esc_html($service_sec['eyebrow']); ?></div>
                <h2><?php echo esc_html($service_sec['heading']); ?></h2>
                <p><?php echo esc_html($service_sec['description']); ?></p>
            </div>
            <div class="services-grid-am">
                <?php if($service_sec['services_list']): foreach($service_sec['services_list'] as $svc): ?>
                <div class="service-card-am">
                    <div class="service-card-header-am">
                        <div class="service-icon-am">
                            <iconify-icon icon="lucide:<?php echo esc_attr($svc['icon']); ?>"></iconify-icon>
                        </div>
                        <div>
                            <h3><?php echo esc_html($svc['title']); ?></h3>
                            <p><?php echo esc_html($svc['desc']); ?></p>
                        </div>
                    </div>
                    <ul class="service-list-am">
                        <?php // Assuming nested repeater for bullet points
                        if($svc['bullet_points']): foreach($svc['bullet_points'] as $pt): ?>
                        <li><?php echo esc_html($pt['point']); ?></li>
                        <?php endforeach; endif; ?>
                    </ul>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </section>
    <?php } 
if($about){
?>
    <section class="section-am section-muted-am">
        <div class="container-am about-inner-am">
            <div class="about-copy-am">
                <div class="eyebrow-am"><?php echo esc_html($about['eyebrow']); ?></div>
                <h2><?php echo esc_html($about['heading']); ?></h2>
                <?php echo $about['paragraph']; ?>

                <div class="trust-grid-am">
                    <?php if($about['trust_items']): foreach($about['trust_items'] as $item): ?>
                    <div class="trust-item-am">
                        <div class="trust-icon-am">
                            <iconify-icon icon="<?php echo esc_attr($item['icon']); ?>"></iconify-icon>
                        </div>
                        <div>
                            <h4><?php echo esc_html($item['title']); ?></h4>
                            <p><?php echo esc_html($item['description']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>

            <div class="about-image-am">
                <div class="about-image-frame-am">
                    <?php $img = $about['image']; ?>
                    <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($img); ?>">
                    <div class="about-image-tag-am"><?php echo esc_html($about['caption']); ?></div>
                </div>
            </div>
        </div>
    </section>
    <?php } 
if($train){
?>
    <section class="section-am">
        <div class="container-am">
            <div class="training-inner-am">
                <div>
                    <div class="eyebrow-am"><?php echo esc_html($train['eyebrow']); ?></div>
                    <h2><?php echo esc_html($train['heading']); ?></h2>
                    <p><?php echo esc_html($train['description']); ?></p>
                    <div class="training-tags-am">
                        <?php if($train['tags']): foreach($train['tags'] as $tag): ?>
                        <span class="training-tag-am"><?php echo esc_html($tag['tag']); ?></span>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
                <div>
                    <p style="font-size:13px; margin-bottom:10px; color:var(--muted-foreground-am);">
                        <?php echo esc_html($train['side_note']); ?></p>
                    <a href="<?php echo esc_url($train['btn_url']); ?>"
                        class="btn-am btn-primary-am btn-lg-am"><?php echo esc_html($train['btn_label']); ?></a>
                    <div class="pill-list-am" style="margin-top:16px;">
                        <?php if($train['pills']): foreach($train['pills'] as $pill): ?>
                        <div class="pill-item-am"><?php echo esc_html($pill['pill']); ?></div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-am section-muted-am">
        <div class="container-am">

            <div class="section-header-am text-center-am">
                <div class="eyebrow-am">
                    <?php echo esc_html(get_field('team_section_eyebrow') ?: 'Clinical team'); ?>
                </div>

                <h2>
                    <?php echo esc_html(get_field('team_section_heading') ?: 'Meet some of our psychotherapists'); ?>
                </h2>

                <p>
                    <?php echo esc_html(get_field('team_section_description') ?: 'Our team includes registered psychotherapists and counsellors with experience working with both children and adults.'); ?>
                </p>
            </div>


            <div class="team-grid-am">

                <?php
            $team_query = new WP_Query([
                'post_type' => 'team',
                'posts_per_page' => 4,
                'order' => 'ASC'
            ]);

            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();

                    $image = get_field('team_image');
                    $role = get_field('team_role');
                    $experience = get_field('team_experience');
                    $clients = get_field('team_clients');
                    $location = get_field('team_location');
            ?>

                <div class="team-card-am" data-media-type="banani-button">

                    <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>

                    <div class="team-info-am">

                        <h3><?php the_title(); ?></h3>

                        <div class="team-role-am">
                            <?php echo esc_html($role); ?>
                        </div>

                        <div class="team-meta-am">

                            <?php if ($experience) : ?>
                            <span>
                                <iconify-icon icon="lucide:briefcase"></iconify-icon>
                                <?php echo esc_html($experience); ?>
                            </span>
                            <?php endif; ?>

                            <?php if ($clients) : ?>
                            <span>
                                <iconify-icon icon="lucide:users"></iconify-icon>
                                <?php echo esc_html($clients); ?>
                            </span>
                            <?php endif; ?>

                            <?php if ($location) : ?>
                            <span>
                                <iconify-icon icon="lucide:map-pin"></iconify-icon>
                                <?php echo esc_html($location); ?>
                            </span>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>

                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            </div>


            <div class="text-center-am" style="margin-top:20px">

                <a href="<?php echo get_permalink( get_page_by_path('our-team-psychotherapists') ); ?>" class="btn-am btn-outline-am"
                    data-media-type="banani-button">
                    <?php echo esc_html(get_field('team_button_text') ?: 'View full team'); ?>
                </a>

            </div>

        </div>
    </section>

    <?php } 
if($steps_sec){
?>
    <!-- Testimonials & Process $story_sec-->
    <section class="section-am">
        <div class="container-am insights-grid-am">
            <div>
                <div class="eyebrow-am"><?php echo esc_html($story_sec['eyebrow']); ?></div>
                <h2><?php echo esc_html($story_sec['heading']); ?></h2>
                <div class="testimonials-list-am">
                    <?php if($story_sec['testimonials']): foreach($story_sec['testimonials'] as $index => $story): ?>
                    <div class="testimonial-card-am">
                        <p>
                            <?php echo esc_html($story['desc']); ?>
                        </p>
                        <div class="testimonial-author-am">
                            <?php echo esc_html($story['name']); ?>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            <div>
                <!-- <div class="section-header-am"> -->
                <div class="eyebrow-am"><?php echo esc_html($steps_sec['eyebrow']); ?></div>
                <h2><?php echo esc_html($steps_sec['heading']); ?></h2>
                <!-- </div> -->
                <div class="steps-card-am">
                    <div class="steps-list-am">
                        <?php if($steps_sec['process_steps']): foreach($steps_sec['process_steps'] as $index => $step): ?>
                        <div class="step-item-am">
                            <div class="step-number-am"><?php echo $index + 1; ?></div>
                            <div class="step-body-am">
                                <h4><?php echo esc_html($step['title']); ?></h4>
                                <p><?php echo esc_html($step['desc']); ?></p>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php } 
?>
</div><!-- .page-container-am -->




<?php
// Include footer
get_footer();
?>