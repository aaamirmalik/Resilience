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

    wp_localize_script('custom-script', 'resilienceAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('resilience_contact_nonce'),
        'sendingText' => 'Sending...',
        'successText' => 'Thank you. Your message has been sent successfully.',
        'errorText' => 'Something went wrong. Please try again.',
    ));
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

function resilience_enqueue_homepage2_assets()
{
    wp_enqueue_style(
        'homepage2-style',
        get_template_directory_uri() . '/assets/css/homepage2.css',
        array('stylesheet'),
        filemtime(get_template_directory() . '/assets/css/homepage2.css')
    );

    wp_enqueue_script(
        'homepage2-script',
        get_template_directory_uri() . '/assets/js/homepage2.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/homepage2.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'resilience_enqueue_homepage2_assets', 20);

function resilience_add_hp2_body_class($classes)
{
    $classes[] = 'homepage2-template';
    return $classes;
}
add_filter('body_class', 'resilience_add_hp2_body_class');

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

function resilience_contact_form_submit()
{
    if (!check_ajax_referer('resilience_contact_nonce', 'nonce', false)) {
        wp_send_json_error(array('message' => 'Security check failed.'), 403);
    }

    if (!empty($_POST['website'])) {
        wp_send_json_success(array('message' => 'Thank you. Your message has been sent.'));
    }

    $first_name = sanitize_text_field($_POST['first_name'] ?? '');
    $last_name = sanitize_text_field($_POST['last_name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $client_type = sanitize_text_field($_POST['client_type'] ?? 'New Client');
    $reason = sanitize_text_field($_POST['reason'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    $page_id = absint($_POST['page_id'] ?? 0);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($reason)) {
        wp_send_json_error(array('message' => 'Please complete all required fields.'), 422);
    }

    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'), 422);
    }

    $to = get_option('admin_email');

    if ($page_id > 0 && function_exists('get_field')) {
        $recipient = get_field('contact_form_recipient_email', $page_id);
        if (!empty($recipient) && is_email($recipient)) {
            $to = $recipient;
        }
    }

    $subject = 'New Contact Form Submission';
    if ($page_id > 0 && function_exists('get_field')) {
        $custom_subject = get_field('contact_form_email_subject', $page_id);
        if (!empty($custom_subject)) {
            $subject = sanitize_text_field($custom_subject);
        }
    }

    $body_lines = array(
        'First Name: ' . $first_name,
        'Last Name: ' . $last_name,
        'Email: ' . $email,
        'Phone: ' . $phone,
        'Client Type: ' . $client_type,
        'Reason: ' . $reason,
        'Message:',
        $message,
    );

    $body = implode(PHP_EOL, $body_lines);

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $first_name . ' ' . $last_name . ' <' . $email . '>',
    );

    $sent = wp_mail($to, $subject, $body, $headers);

    if (!$sent) {
        wp_send_json_error(array('message' => 'Unable to send your message right now.'), 500);
    }

    wp_send_json_success(array('message' => 'Thank you. Your message has been sent successfully.'));
}
add_action('wp_ajax_resilience_contact_form_submit', 'resilience_contact_form_submit');
add_action('wp_ajax_nopriv_resilience_contact_form_submit', 'resilience_contact_form_submit');
