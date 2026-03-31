<?php
$hp2_get_option = static function ($field, $default = '') {
    if (!function_exists('get_field')) {
        return $default;
    }
    $value = get_field($field, 'option');
    if ($value === null || $value === '' || $value === []) {
        return $default;
    }
    return $value;
};

$asset_base = trailingslashit(get_template_directory_uri()) . 'assets/images/homepage2';
$footer_logo = $hp2_get_option('footer_logo', $asset_base . '/177e468f-5a67-4cb9-a050-4f719895ebd5.png');
if (is_array($footer_logo) && !empty($footer_logo['url'])) {
    $footer_logo = $footer_logo['url'];
}

$footer_address = $hp2_get_option('footer_address', '111 Waterloo St Unit 406 London, Ontario, Canada N6B 2M4');
$topbar_hours = $hp2_get_option('topbar_hours', 'Mon - Fri, 11:00 AM - 7:00');
$topbar_phone = $hp2_get_option('topbar_phone', '+1 (548) 866-0366');
$footer_cell_no = $hp2_get_option('footer_cell_no', '+1 (226) 210-4170');
$footer_fax = $hp2_get_option('footer_fax', '+1 (226) 916-0283');
$topbar_email = $hp2_get_option('topbar_email', 'mail@resiliencec.com');
$topbar_phone_href = preg_replace('/[^0-9\+]/', '', (string) $topbar_phone);
$footer_cell_no_href = preg_replace('/[^0-9\+]/', '', (string) $footer_cell_no);
$topbar_email_href = sanitize_email((string) $topbar_email);

$footer_services_heading = $hp2_get_option('footer_services_heading', 'Quick Links');
$footer_clinic_heading = $hp2_get_option('footer_clinic_heading', 'Clinic');
$footer_info_heading = $hp2_get_option('footer_info_heading', 'Practical Information');
$footer_copyright_suffix = $hp2_get_option('footer_copyright_suffix', 'All rights reserved.');

$footer_services_links = function_exists('get_field') ? get_field('footer_services_menu', 'option') : [];
$footer_clinic_links = function_exists('get_field') ? get_field('footer_clinic_menu', 'option') : [];
$footer_legal_links = function_exists('get_field') ? get_field('footer_legal_menu', 'option') : [];
$footer_social_links = function_exists('get_field') ? get_field('footer_social_links', 'option') : [];

if (empty($footer_social_links) || !is_array($footer_social_links)) {
    $footer_social_links = [
        [
            'label' => 'Facebook',
            'url'   => $hp2_get_option('facebook_url', '#'),
            'icon'  => $asset_base . '/3e294be2-74fc-48e9-9e4b-6c7c572ec188.svg',
        ],
        [
            'label' => 'Instagram',
            'url'   => $hp2_get_option('instagram_url', '#'),
            'icon'  => $asset_base . '/8bac3fb1-2f36-4f99-adb8-c5b9c7bf34ad.svg',
        ],
        [
            'label' => 'LinkedIn',
            'url'   => $hp2_get_option('linkedin_url', '#'),
            'icon'  => $asset_base . '/ca9e7d9f-2528-4a5c-83a5-e53d1b55f5ce.svg',
        ],
    ];
}
?>

<footer class="hp2-footer">
    <div class="hp2-container">
        <div class="hp2-footer-grid">
            <div class="hp2-footer-card">
                <div class="hp2-footer-logo">
                    <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php bloginfo('name'); ?>">
                </div>
                <h4>Address</h4>
                <p><?php echo nl2br(esc_html($footer_address)); ?></p>
                <h4>Business Hours</h4>
                <p><?php echo esc_html($topbar_hours); ?></p>

                <div class="hp2-footer-social">
                    <?php foreach ($footer_social_links as $social_item) : ?>
                        <?php
                        $social_label = $social_item['label'] ?? $social_item['icon_label'] ?? 'Social';
                        $social_url = $social_item['url'] ?? $social_item['link'] ?? '#';
                        $social_icon = $social_item['icon'] ?? '';
                        if (is_array($social_icon) && !empty($social_icon['url'])) {
                            $social_icon = $social_icon['url'];
                        } elseif (is_numeric($social_icon)) {
                            $social_icon = wp_get_attachment_image_url((int) $social_icon, 'full') ?: '';
                        }
                        ?>
                        <a href="<?php echo esc_url($social_url); ?>" aria-label="<?php echo esc_attr($social_label); ?>">
                            <?php if (!empty($social_icon)) : ?>
                                <img src="<?php echo esc_url($social_icon); ?>" alt="<?php echo esc_attr($social_label); ?>">
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="hp2-footer-col">
                <h5><?php echo esc_html($footer_info_heading); ?></h5>
                <ul class="hp2-footer-contact-list">
                    <li><strong>Email</strong><span><a href="<?php echo esc_url('mailto:' . $topbar_email_href); ?>"><?php echo esc_html($topbar_email); ?></a></span></li>
                    <li><strong>Phone</strong><span><a href="<?php echo esc_url('tel:' . $topbar_phone_href); ?>"><?php echo esc_html($topbar_phone); ?></a></span></li>
                    <li><strong>Cell No</strong><span><a href="<?php echo esc_url('tel:' . $footer_cell_no_href); ?>"><?php echo esc_html($footer_cell_no); ?></a></span></li>
                    <li><strong>Fax</strong><span><?php echo esc_html($footer_fax); ?></span></li>
                </ul>
            </div>

            <div class="hp2-footer-col hp2-footer-links">
                <h5><?php echo esc_html($footer_services_heading); ?></h5>

                <div class="hp2-footer-links-col hp2-footer-links-col-main">
                    <?php if (!empty($footer_services_links) && is_array($footer_services_links)) : ?>
                        <?php foreach ($footer_services_links as $item) : ?>
                            <a href="<?php echo esc_url($item['url'] ?? '#'); ?>"><?php echo esc_html($item['link_label'] ?? $item['label'] ?? 'Link'); ?></a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <a href="#">All Services</a>
                        <a href="#">Individual Counselling</a>
                        <a href="#">Anger management</a>
                        <a href="#">Family Counselling</a>
                        <a href="#">Refugee counselling</a>
                    <?php endif; ?>
                </div>

                <div class="hp2-footer-links-col hp2-footer-links-col-side">
                    <!-- <h5><?php echo esc_html($footer_clinic_heading); ?></h5> -->
                    <?php if (!empty($footer_clinic_links) && is_array($footer_clinic_links)) : ?>
                        <?php foreach ($footer_clinic_links as $item) : ?>
                            <a href="<?php echo esc_url($item['url'] ?? '#'); ?>"><?php echo esc_html($item['link_label'] ?? $item['label'] ?? 'Link'); ?></a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <a href="#">About Us</a>
                        <a href="#">Our Team</a>
                        <a href="#">Contact</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="hp2-footer-bottom">
            <div class="hp2-footer-bottom-inner">
                <span>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php echo esc_html($footer_copyright_suffix); ?></span>
                <div class="hp2-footer-bottom-links">
                    <?php if (!empty($footer_legal_links) && is_array($footer_legal_links)) : ?>
                        <?php foreach ($footer_legal_links as $legal_index => $legal_item) : ?>
                            <?php if ($legal_index > 0) : ?><span class="hp2-footer-dot" aria-hidden="true"></span><?php endif; ?>
                            <a href="<?php echo esc_url($legal_item['url'] ?? '#'); ?>"><?php echo esc_html($legal_item['label'] ?? $legal_item['link_label'] ?? 'Policy'); ?></a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <a href="#">Privacy Policy</a>
                        <span class="hp2-footer-dot" aria-hidden="true"></span>
                        <a href="#">Terms and Conditions</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
