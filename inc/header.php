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

$topbar_hours = $hp2_get_option('topbar_hours', 'Mon - Fri, 11:00 AM - 7:00');
$topbar_address = $hp2_get_option('topbar_address', '111 Waterloo St Unit 406, London, ON');
$topbar_phone = $hp2_get_option('topbar_phone', '+1 (548) 866-0366');
$topbar_email = $hp2_get_option('topbar_email', 'mail@resiliencec.com');
$topbar_phone_href = preg_replace('/[^0-9\+]/', '', (string) $topbar_phone);
$topbar_email_href = sanitize_email((string) $topbar_email);

$appointment_url = $hp2_get_option('appointment_url', $hp2_get_option('appointment_urll', '#'));
$appointment_label = $hp2_get_option('appointment_label', 'Book an Appointment');
$login_url = $hp2_get_option('clinician_login_url', '#');
$login_label = $hp2_get_option('clinician_login_label', 'Login');

$nav_links = [
    ['href' => home_url('/'), 'label' => 'Home'],
    ['href' => '#', 'label' => 'About Us'],
    ['href' => '#', 'label' => 'Services'],
    ['href' => '#', 'label' => 'Team'],
    ['href' => '#', 'label' => 'Blog'],
    ['href' => '#', 'label' => 'Contact'],
];
$locations = get_nav_menu_locations();
if (!empty($locations['primary'])) {
    $menu_items = wp_get_nav_menu_items($locations['primary']);
    if (!empty($menu_items)) {
        $tmp_links = [];
        foreach ($menu_items as $item) {
            if ((int) $item->menu_item_parent !== 0) {
                continue;
            }
            $tmp_links[] = ['href' => $item->url, 'label' => $item->title];
        }
        if (!empty($tmp_links)) {
            $nav_links = $tmp_links;
        }
    }
}

global $wp;
$current_url = home_url(add_query_arg([], $wp->request ?? ''));
$current_path = wp_parse_url($current_url, PHP_URL_PATH);
$current_path = untrailingslashit((string) $current_path);
if ($current_path === '') {
    $current_path = '/';
}
?>

<div class="hp2-topbar">
    <div class="hp2-container hp2-topbar-inner">
        <div class="hp2-topbar-group">
            <span><iconify-icon icon="lucide:clock"></iconify-icon> <?php echo esc_html($topbar_hours); ?></span>
            <span class="hp2-divider"></span>
            <span><iconify-icon icon="lucide:map-pin"></iconify-icon> <?php echo esc_html($topbar_address); ?></span>
        </div>
        <div class="hp2-topbar-group">
            <span><a href="<?php echo esc_url('tel:' . $topbar_phone_href); ?>"><iconify-icon icon="lucide:phone"></iconify-icon> <?php echo esc_html($topbar_phone); ?></a></span>
            <span class="hp2-divider"></span>
            <span><a href="<?php echo esc_url('mailto:' . $topbar_email_href); ?>"><iconify-icon icon="lucide:mail"></iconify-icon> Email: <?php echo esc_html($topbar_email); ?></a></span>
        </div>
    </div>
</div>

<header class="hp2-header">
    <div class="hp2-container">
        <div class="hp2-nav-shell">
            <div class="hp2-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span><?php bloginfo('name'); ?></span>
                <?php endif; ?>
            </div>

            <nav class="hp2-nav" aria-label="Primary Navigation">
                <?php foreach ($nav_links as $nav_link) : ?>
                    <?php
                    $link_path = wp_parse_url($nav_link['href'], PHP_URL_PATH);
                    $link_path = untrailingslashit((string) $link_path);
                    if ($link_path === '') {
                        $link_path = '/';
                    }
                    $is_active = ($link_path === $current_path);
                    ?>
                    <a href="<?php echo esc_url($nav_link['href']); ?>" class="<?php echo $is_active ? 'is-active' : ''; ?>"><?php echo esc_html($nav_link['label']); ?></a>
                <?php endforeach; ?>
            </nav>

            <div class="hp2-nav-actions">
                <a href="<?php echo esc_url($login_url); ?>" class="hp2-btn hp2-btn-light"><?php echo esc_html($login_label); ?></a>
                <a href="<?php echo esc_url($appointment_url); ?>" class="hp2-btn hp2-btn-primary"><?php echo esc_html($appointment_label); ?></a>
            </div>

            <button class="hp2-menu-toggle" aria-expanded="false" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>

        <div class="hp2-mobile-menu" aria-hidden="true">
            <?php foreach ($nav_links as $nav_link) : ?>
                <?php
                $mobile_link_path = wp_parse_url($nav_link['href'], PHP_URL_PATH);
                $mobile_link_path = untrailingslashit((string) $mobile_link_path);
                if ($mobile_link_path === '') {
                    $mobile_link_path = '/';
                }
                $mobile_is_active = ($mobile_link_path === $current_path);
                ?>
                <a href="<?php echo esc_url($nav_link['href']); ?>" class="<?php echo $mobile_is_active ? 'is-active' : ''; ?>"><?php echo esc_html($nav_link['label']); ?></a>
            <?php endforeach; ?>
            <a href="<?php echo esc_url($login_url); ?>" class="hp2-btn hp2-btn-light"><?php echo esc_html($login_label); ?></a>
            <a href="<?php echo esc_url($appointment_url); ?>" class="hp2-btn hp2-btn-primary"><?php echo esc_html($appointment_label); ?></a>
        </div>
    </div>
</header>
