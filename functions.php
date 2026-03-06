<?php
include get_template_directory() . '/inc/custom-menu.php';
function my_theme_enqueue_styles()
{
    // Enqueue Google Fonts
    //  Roboto and Montserrat
    wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap', array(), null);
    wp_enqueue_style('montserrat-font', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', array(), null);

    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css', array(), null);

    // Enqueue Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css', array(), null);

    // Enqueue your custom stylesheet
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/assets/style.css', array(), filemtime(get_template_directory() . '/assets/style.css'));
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function my_theme_enqueue_scripts()
{
    // Enqueue Slick Carousel
    wp_enqueue_script('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), null, true);

    // Enqueue custom script
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'slick-carousel'), filemtime(get_template_directory() . '/assets/js/script.js'), true);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

// Enable featured images for posts
add_theme_support('post-thumbnails');

// Enable custom logo support
add_theme_support('custom-logo');

// Allow SVG uploads
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


