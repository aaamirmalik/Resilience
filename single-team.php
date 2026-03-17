<?php
get_header();

// Logic for Breadcrumbs & Archive Link
$archive_url = get_post_type_archive_link('team');
if (!$archive_url) {
    $archive_url = home_url('/our-team-psychotherapists/');
}

if (have_posts()) : while (have_posts()) : the_post(); 
    // Fetch ACF Fields
    $team_image       = get_field('team_image');
    $role             = get_field('team_role');
    $experience       = get_field('team_experience');
    $clients          = get_field('team_clients');
    $location         = get_field('team_location');
    $email            = get_field('email');
    $phone            = get_field('phone');
    $biography        = get_field('biography');
    $arabic_biography = get_field('arabic_biography');
	$turkish_biography= get_field('turkish_biography');
    $languages        = get_field('team_languages');  
    $credentials      = get_field('team_credentials');
?>

<div class="export-wrapper-am">
    <div class="page-container-am">
        <main class="container-am profile-main-am">
            
            <nav style="margin-top:30px;" class="breadcrumbs-am" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <iconify-icon icon="lucide:chevron-right"></iconify-icon>
                <a href="<?php echo esc_url($archive_url); ?>">Our Team</a>
                <iconify-icon icon="lucide:chevron-right"></iconify-icon>
                <span><?php the_title(); ?></span>
            </nav>

            <div class="profile-intro-am">
                <div class="profile-image-am">
                    <?php if ($team_image) : ?>
                        <img src="<?php echo esc_url($team_image['url']); ?>" alt="<?php echo esc_attr($team_image['alt'] ?: get_the_title()); ?>" />
                    <?php else: ?>
                        <div class="about-page-image-placeholder-am">
                            <iconify-icon icon="lucide:user"></iconify-icon>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="profile-info-am">
                    <div class="eyebrow-am">Team Member</div>
                    <h1 class="single-team-title-am"><?php the_title(); ?></h1>
                    
                    <?php if ($role) : ?>
                        <div class="profile-role-badge-am"><?php echo esc_html($role); ?></div>
                    <?php endif; ?>

                    <div class="profile-meta-grid-am">
                        <?php if ($credentials) : ?>
                        <div class="profile-meta-item-am">
                            <iconify-icon icon="lucide:award"></iconify-icon>
                            <div class="profile-meta-content-am">
                                <h5>Credentials</h5>
                                <p><?php echo esc_html($credentials); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($experience) : ?>
                        <div class="profile-meta-item-am">
                            <iconify-icon icon="lucide:briefcase"></iconify-icon>
                            <div class="profile-meta-content-am">
                                <h5>Experience</h5>
                                <p><?php echo esc_html($experience); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($clients) : ?>
                        <div class="profile-meta-item-am">
                            <iconify-icon icon="lucide:users"></iconify-icon>
                            <div class="profile-meta-content-am">
                                <h5>Client Focus</h5>
                                <p><?php echo esc_html($clients); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($languages)) : ?>
                        <div class="profile-meta-item-am">
                            <iconify-icon icon="lucide:globe"></iconify-icon>
                            <div class="profile-meta-content-am">
                                <h5>Languages</h5>
                                <p>
                                    <?php 
                                    if (is_array($languages)) {
                                        echo esc_html(implode(', ', $languages)); 
                                    } else {
                                        echo esc_html($languages); 
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="action-buttons-am">
                        <?php if ($email) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="btn-am btn-outline-am">
                                <iconify-icon icon="lucide:mail"></iconify-icon> Send Email
                            </a>
                        <?php endif; ?>
                        <?php if ($phone) : ?>
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="btn-am btn-outline-am">
                                <iconify-icon icon="lucide:phone"></iconify-icon> Call Clinic
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="profile-content-grid-am">
                <div class="profile-details-am">
                    
                    <?php if ($biography) : ?>
                    <section class="biography-section-am">
                        <h2>Biography</h2>
                        <div class="entry-content-am single-content-am">
                            <?php echo wp_kses_post($biography); ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <?php if ($arabic_biography) : ?>
                    <section class="biography-section-am" dir="rtl">
                        <h2 style="text-align: right;">السيرة الذاتية</h2>
                        <div class="entry-content-am single-content-am" style="text-align: right;">
                            <?php echo wp_kses_post($arabic_biography); ?>
                        </div>
                    </section>
                    <?php endif; ?>
					
					<?php if ($turkish_biography) : ?>
                    <section class="biography-section-am">
                        <h2>Türk Biyografisi</h2>
                        <div class="entry-content-am single-content-am">
                            <?php echo wp_kses_post($turkish_biography); ?>
                        </div>
                    </section>
                    <?php endif; ?>

<!--                     <section>
                        <h2>Professional Profile</h2>
                        <div class="entry-content-am single-content-am">
                            <?php the_content(); ?>
                        </div>
                    </section> -->

                   

                    <?php if (have_rows('team_education_list')) : ?>
                    <section class="education-section-am">
                        <h2>Education</h2>
                        <div class="education-cards-wrapper-am">
                            <?php while (have_rows('team_education_list')) : the_row(); 
                                $uni = get_sub_field('university_name');
                                $degree = get_sub_field('degree_title');
                                $date = get_sub_field('duration');
                            ?>
                                <div class="edu-card-am">
                                    <h3 class="edu-uni-am"><?php echo esc_html($uni); ?></h3>
                                    <p class="edu-degree-am"><?php echo esc_html($degree); ?></p>
                                    <span class="edu-date-am"><?php echo esc_html($date); ?></span>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </section>
                    <?php endif; ?>
					
					
					
					<?php if (have_rows('additional_team_education_list')) : ?>
                    <section class="education-section-am">
                        <h2>Additional Education</h2>
                        <div class="education-cards-wrapper-am">
                            <?php while (have_rows('additional_team_education_list')) : the_row(); 
                                $uni = get_sub_field('additional_university_name');
                                $degree = get_sub_field('additioonal_degree_title');
                                $date = get_sub_field('additional_duration');
                            ?>
                                <div class="edu-card-am">
                                    <h3 class="edu-uni-am"><?php echo esc_html($uni); ?></h3>
                                    <p class="edu-degree-am"><?php echo esc_html($degree); ?></p>
                                    <span class="edu-date-am"><?php echo esc_html($date); ?></span>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </section>
                    <?php endif; ?>
					
					 <?php 
                    $areas = get_the_terms(get_the_ID(), 'areas-of-practice');
                    if ($areas && !is_wp_error($areas)) : ?>
                    <section>
                        <h2>Areas of Practice</h2>
                        <div class="tags-container-am">
                            <?php foreach ($areas as $area) : ?>
                                <span class="badge-am"><?php echo esc_html($area->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </section>
					
					
					
					
					<?php 
$team_tags = get_the_terms(get_the_ID(), 'team-tag'); 
if ($team_tags && !is_wp_error($team_tags)) : ?>
<section>
    <h2>Therapeutic Approaches</h2>
    <div class="tags-container-am">
        <?php foreach ($team_tags as $tag) : ?>
            <span class="badge-am"><?php echo esc_html($tag->name); ?></span>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>
					
					
					
                    </section>
                    <?php endif; ?>
					
					
                </div>

                <aside>
                    <div class="booking-widget-am">
                        <div class="booking-header-am">
                            <h3>Book an Appointment</h3>
                            <p>Schedule a session with <?php the_title(); ?> quickly and easily.</p>
                        </div>
                        <a href="<?php echo esc_url(get_field('appointment_url', 'option') ?: '#'); ?>" class="btn-am btn-primary-am btn-lg-am btn-block-am">
                            <?php echo esc_html(get_field('appointment_label', 'option') ?: 'Continue Booking'); ?>
                        </a>
                        <p class="text-center-am cta-note-am" style="margin-top:15px;">Secure & Confidential Booking</p>
                    </div>
                </aside>
            </div>
        </main>

        <section style="margin-top:30px;" class="cta-section-am section-am">
            <div class="container-am text-center-am">
                <h2 style="margin-bottom: 12px;">Not sure who to see?</h2>
                <p style="margin-bottom: 24px; max-width: 600px; color: #374151; margin-left: auto; margin-right: auto;">
                    We offer a free brief consultation to help match you with the
                    right therapist based on your specific needs, background, and
                    availability.
                </p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-am btn-primary-am btn-lg-am">
                    Request Consultation
                </a>
            </div>
        </section>

    </div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>