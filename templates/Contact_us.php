<?php
/**
 * Template Name: Contact Us
 */

get_header();

$hero_group = get_field('contact_hero_group');
$info_group = get_field('contact_info_group');
$form_group = get_field('contact_form_group');

$hero_group = is_array($hero_group) ? $hero_group : [];
$info_group = is_array($info_group) ? $info_group : [];
$form_group = is_array($form_group) ? $form_group : [];

$hero_heading = $hero_group['heading'] ?? 'Get in Touch';
$hero_description = $hero_group['description'] ?? "Whether you're ready to start therapy or have a few questions, our team is here to support you.";

$default_info_items = [
    [
        'icon' => 'lucide:map-pin',
        'title' => 'Our Clinic Location',
        'line_1' => '111 Waterloo St Unit 406',
        'line_2' => 'London, ON N6B 2M4',
    ],
    [
        'icon' => 'lucide:phone',
        'title' => 'Phone and WhatsApp',
        'line_1' => 'Main: +1 (548) 866-0366',
        'line_2' => 'Fax: Available upon request',
    ],
    [
        'icon' => 'lucide:mail',
        'title' => 'Email Address',
        'line_1' => 'mail@resiliencec.com',
        'line_2' => 'Expect a response within 48 hours.',
    ],
    [
        'icon' => 'lucide:clock',
        'title' => 'Office Hours',
        'line_1' => 'Monday - Friday: 11:00 AM - 7:00 PM',
        'line_2' => 'Saturday - Sunday: Closed',
    ],
];

$info_heading = $info_group['heading'] ?? 'Contact Information';
$info_items = !empty($info_group['items']) && is_array($info_group['items']) ? $info_group['items'] : $default_info_items;

$map_embed = $info_group['map_embed'] ?? '';
$map_image = $info_group['map_image'] ?? '';
$map_alt = $info_group['map_alt'] ?? 'Map indicating office location';

$form_heading = $form_group['heading'] ?? 'Send us a message';
$form_description = $form_group['description'] ?? 'Fill out the form below and our intake coordinator will contact you shortly.';
$submit_label = $form_group['submit_label'] ?? 'Send Message';
$privacy_text = $form_group['privacy_text'] ?? 'Your privacy matters. The information you provide is confidential and encrypted.';
$service_options = !empty($form_group['service_options']) && is_array($form_group['service_options'])
    ? $form_group['service_options']
    : [
        ['label' => 'Individual Counselling'],
        ['label' => 'Child and Youth Counselling'],
        ['label' => 'Couples or Family Counselling'],
        ['label' => 'Motor Vehicle Accident (MVA) Counselling'],
        ['label' => 'General Inquiry'],
    ];
?>

<div class="page-container-am">
    <main>
        <section class="contact-hero-am">
            <div class="container-am">
                <h1><?php echo esc_html($hero_heading); ?></h1>
                <p><?php echo esc_html($hero_description); ?></p>
            </div>
        </section>

        <section class="contact-wrapper-am">
            <div class="container-am contact-grid-am">
                <div class="contact-info-section-am">
                    <h2><?php echo esc_html($info_heading); ?></h2>
                    <div class="contact-info-list-am">
                        <?php foreach ($info_items as $item) : ?>
                            <div class="contact-item-am">
                                <div class="contact-icon-am">
                                    <iconify-icon icon="<?php echo esc_attr($item['icon'] ?? 'lucide:circle'); ?>" style="font-size: 24px"></iconify-icon>
                                </div>
                                <div class="contact-text-am">
                                    <h3><?php echo esc_html($item['title'] ?? ''); ?></h3>
                                    <?php if (!empty($item['line_1'])) : ?>
                                        <p><?php echo esc_html($item['line_1']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($item['line_2'])) : ?>
                                        <p><?php echo esc_html($item['line_2']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="map-container-am">
                        <?php if (!empty($map_embed)) : ?>
                            <?php echo $map_embed; ?>
                        <?php else : ?>
                            <?php
                            $map_url = '';
                            if (is_array($map_image) && !empty($map_image['url'])) {
                                $map_url = $map_image['url'];
                                $map_alt = $map_image['alt'] ?? $map_alt;
                            } elseif (is_string($map_image) && !empty($map_image)) {
                                $map_url = $map_image;
                            }
                            ?>
                            <?php if (!empty($map_url)) : ?>
                                <img src="<?php echo esc_url($map_url); ?>" alt="<?php echo esc_attr($map_alt); ?>" />
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="contact-form-section-am">
                    <div class="contact-form-card-am">
                        <h3><?php echo esc_html($form_heading); ?></h3>
                        <p><?php echo esc_html($form_description); ?></p>

                        <form id="contact-form-am" class="contact-form-am" novalidate>
                            <?php wp_nonce_field('resilience_contact_nonce', 'resilience_contact_nonce_field'); ?>
                            <input type="hidden" name="action" value="resilience_contact_form_submit" />
                            <input type="hidden" name="page_id" value="<?php echo esc_attr(get_the_ID()); ?>" />

                            <!-- <div class="contact-hp-am" aria-hidden="true">
                                <label for="website-am">Website</label>
                                <input type="text" id="website-am" name="website" tabindex="-1" autocomplete="off" />
                            </div> -->

                            <div class="form-row-am">
                                <div>
                                    <label class="form-label-am" for="first-name-am">First Name *</label>
                                    <input id="first-name-am" name="first_name" type="text" class="form-control-am" placeholder="e.g. Jane" required />
                                </div>
                                <div>
                                    <label class="form-label-am" for="last-name-am">Last Name *</label>
                                    <input id="last-name-am" name="last_name" type="text" class="form-control-am" placeholder="e.g. Doe" required />
                                </div>
                            </div>

                            <div class="form-row-am">
                                <div>
                                    <label class="form-label-am" for="email-am">Email Address *</label>
                                    <input id="email-am" name="email" type="email" class="form-control-am" placeholder="jane@example.com" required />
                                </div>
                                <div>
                                    <label class="form-label-am" for="phone-am">Phone Number</label>
                                    <input id="phone-am" name="phone" type="tel" class="form-control-am" placeholder="(555) 000-0000" />
                                </div>
                            </div>

                            <div class="form-group-am">
                                <span class="form-label-am">Are you a new or existing client?</span>
                                <div class="radio-group-am">
                                    <label class="radio-option-am" for="client-new-am">
                                        <input id="client-new-am" type="radio" name="client_type" value="New Client" checked />
                                        New Client
                                    </label>
                                    <label class="radio-option-am" for="client-existing-am">
                                        <input id="client-existing-am" type="radio" name="client_type" value="Existing Client" />
                                        Existing Client
                                    </label>
                                </div>
                            </div>

                            <div class="form-group-am">
                                <label class="form-label-am" for="reason-am">How can we help you? *</label>
                                <select id="reason-am" class="form-control-am" name="reason" required>
                                    <option value="">Select a service or reason...</option>
                                    <?php foreach ($service_options as $service_option) : ?>
                                        <?php if (!empty($service_option['label'])) : ?>
                                            <option value="<?php echo esc_attr($service_option['label']); ?>"><?php echo esc_html($service_option['label']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group-am">
                                <label class="form-label-am" for="message-am">Your Message</label>
                                <textarea id="message-am" name="message" class="form-control-am" placeholder="Please briefly describe what you are looking for help with."></textarea>
                            </div>

                            <button type="submit" class="btn-am btn-primary-am contact-submit-am" data-default-label="<?php echo esc_attr($submit_label); ?>">
                                <?php echo esc_html($submit_label); ?>
                            </button>

                            <div id="contact-form-status-am" class="form-status-am" aria-live="polite"></div>

                            <div class="form-footer-am">
                                <div style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; color: var(--success-am); flex-shrink: 0;">
                                    <iconify-icon icon="lucide:shield-check" style="font-size: 20px"></iconify-icon>
                                </div>
                                <div>
                                    <?php echo esc_html($privacy_text); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php
get_footer();
?>
