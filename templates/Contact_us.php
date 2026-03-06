<?php
/**
 * Template Name: Contact Us
 */

get_header();

$contact_page_heading = get_field('contact_heading');
$contact_form = get_field('contact_form');
$contact_heading = $contact_form['heading'];
$contact_description = $contact_form['description'];
$contact_image = $contact_form['image'];
?>

<section class="pb-[50px] md:pb-[70px]">
    <div class="container mx-auto px-4">
        <h1 class="font-montserrat uppercase text-[30px] md:text-[40px] md:leading-[48px] font-bold tracking-[4.8px] mt-[16px] mb-[40px]">
            <?php echo esc_html($contact_page_heading); ?>
        </h1>
        <div class="contact_us">
            <div class="form_text mb-[40px]">
                <h2
                    class="font-montserrat uppercase text-[20px] md:text-[32px] font-bold leading-[40px] tracking-[3.8px] mb-[24px]">
                    <?php echo esc_html($contact_heading); ?>
                </h2>
                <p class="roboto text-[14px] text-[#000000]">
                    <?php echo esc_html($contact_description); ?>
                </p>
            </div>
            <div class="contact_form_main flex flex-col lg:flex-row items-start gap-[35px] md:gap-[20px]">
                <div class="contact_form !w-[100%] lg:!w-[37%]">
                    <?php echo do_shortcode('[wpforms id="869"]'); ?>
                </div>
                <?php if (!empty($contact_image['url'])): ?>
                    <div class="w-full lg:w-[63%] contactform_overlay relative" >
                    <img src="<?php echo esc_url($contact_image['url']); ?>" class="w-full rounded-[20px] md:h-[405px] object-cover"
                        alt="Contact Image" />
                        </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
$office_location = get_field('office_location');
$location_main_heading = $office_location['heading'];
$location_main_description = $office_location['description'];
$locations = $office_location['location'];
?>

<section class="py-[50px] md:py-[70px]">
    <div class="container mx-auto px-4">
        <div class="locations_text w-full md:w-[458px] mb-[40px]">
            <h2
                class="font-montserrat uppercase text-[24px] md:text-[32px] font-bold tracking-[3.6px] md:leading-[40px] mb-[27px]">
                <?php echo esc_html($location_main_heading); ?>
            </h2>
            <p class="roboto text-[14px] text-black tracking-[0.84px] leading-[20px]">
                <?php echo esc_html($location_main_description); ?>
            </p>
        </div>
        <div class="Locations grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[20px]">
            <?php foreach ($locations as $location): ?>
                <div class="location bg-white rounded-[20px]">
                    <div class="location_text px-[32px] py-[40px]">
                        <h3
                            class="uppercase roboto text-[20px] md:text-[24px] font-bold tracking-[1.2px]  mb-[20px]">
                            <?php echo esc_html($location['heading']); ?>
                        </h3>
                        <p class="roboto text-[14px] text-black tracking-[0.84px] leading-[20px]  md:h-[68px]">
                            <?php echo esc_html($location['description']); ?>
                        </p>
                    </div>
                    <img src="<?php echo esc_url($location['image']['url']); ?>" alt="Location Image"
                        class="rounded-b-[20px] w-full h-[224px] object-cover" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
$Phone_and_Email = get_field('Phone_and_Email');
$Phone_and_Email_heading = $Phone_and_Email['heading'];
$Phone_and_Email_description = $Phone_and_Email['description'];
$Phone_and_Email_info = $Phone_and_Email['info'];
$image_url1 = wp_get_attachment_image_url($Phone_and_Email['image1'], 'full');
$image_url2 = wp_get_attachment_image_url($Phone_and_Email['image2'], 'full');
?>

<section class="py-[50px] md:py-[70px]">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-[22px]">
            <div class="email_text w-full lg:w-[37%]">
                <h2
                    class="font-montserrat uppercase text-[#05060F] text-[22px] md:text-[32px] font-bold tracking-[3.6px]  mb-[24px] leading-[24px] md:leading-[40px]">
                    <?php echo esc_html($Phone_and_Email_heading); ?>
                </h2>
                <div class="custom_paragraph roboto mb-[40px] text-[14px] text-black tracking-[0.84px]">
                    <?php echo esc_html($Phone_and_Email_description); ?>
                </div>
                <div class="flex flex-col gap-[16px]">
                    <?php foreach ($Phone_and_Email_info as $info): ?>
                        <div class="email_link flex items-center gap-[12px]">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($info['icon'], 'full')); ?>" width="24"
                                alt="Icon">
                            <a class="roboto underline"><?php echo esc_html($info['text']); ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="images flex w-full lg:w-[63%] gap-2 md:gap-[20px]">
                <img src="<?php echo esc_url($image_url1); ?>" class="object-cover rounded-[20px] w-[50%]"
                    alt="Image 1" />
                <img src="<?php echo esc_url($image_url2); ?>" class="object-cover rounded-[20px] w-[50%]"
                    alt="Image 2" />
            </div>
        </div>
    </div>
</section>

<?php
$Social_media = get_field('Social_media');
$Social_media_heading = $Social_media['heading'];
$Social_media_description = $Social_media['description'];
$Social_media_info = $Social_media['Social_link'];
$Social_media_image1 = $Social_media['image1'];
$Social_media_image2 = $Social_media['image2'];
?>
<section class="py-[50px] md:py-[70px]">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-[22px]">
            <div class="email_text w-full lg:w-[37%]">
                <h2
                    class="font-montserrat uppercase text-[#05060F] text-[22px] md:text-[32px] font-bold tracking-[3.6px] mt-[20px] mb-[24px] leading-[24px] md:leading-[40px]">
                    <?php echo esc_html($Social_media_heading); ?>
                </h2>
                <div class="custom_paragraph roboto mb-[40px] text-[14px] text-black tracking-[0.84px]">
                    <?php echo esc_html($Social_media_description); ?>
                </div>
                <div class="flex gap-[16px] flex-wrap">
                    <?php foreach ($Social_media_info as $social): ?>
                        <a href="<?php echo $social['link']; ?>" target="_blank" rel="noopener">
                            <img src="<?php echo $social['icon']; ?>" width="24" alt="Social Icon" />
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="images flex w-full lg:w-[63%] gap-2 md:gap-4">
                <img src="<?php echo $Social_media_image1; ?>" class="object-cover rounded-[20px] w-[50%]"
                    alt="Social Image 1" />
                <img src="<?php echo $Social_media_image2; ?>" class="object-cover rounded-[20px] w-[50%]"
                    alt="Social Image 2" />
            </div>
        </div>
    </div>
</section>
<!-- footer -->
<?php
get_footer();
?>