<?php

/**
 * Template Name: About Template
 * @package WordPress
 * @subpackage motabaqah
 * @since motabaqah 1.0
 */
// Include header
get_header();
?>
<section>
    <div class="container  mx-auto">
        <h1 class="font-montserrat uppercase text-[#05060F] text-[30px] md:text-[40px] font-bold tracking-[4.8px] mt-[10px] mb-[40px]">
            <?php echo get_field("about_us_heading"); ?>
        </h1>
    </div>
</section>
<?php
if (get_field('company_overview_section')) {
    $company_overview_section = get_field('company_overview_section');
    $company_overview_heading = $company_overview_section['company_overview_heading'];
    $hero_section_image_1 = $company_overview_section['hero_section_image_1'];
    $hero_section_image_2 = $company_overview_section['hero_section_image_2'];
    $card_1 = $company_overview_section['card_1'];
    $card_2 = $company_overview_section['card_2'];

    ?>
    <section class="container mx-auto mb-[35px] md:mb-[70px]">
        <div class="about_us">
            <div class="mb-[24px]">
                <h1 class="font-montserrat uppercase text-[#05060F] text-[20px] md:text-[32px] font-bold tracking-[3.8px] mb-[24px]">
                    <?php echo $company_overview_heading; ?>
                </h1>
            </div>
            <div class="flex flex-col lg:flex-row gap-[20px]">
                <div class="cards_wrapper_ar lg:w-[calc(100%-432px)] w-[100%]">
                    <?php if ($card_1 && is_array($card_1)) {
                        ?>
                        <div class="overview w-full flex flex-col gap-[20px]">
                            <?php
                            foreach ($card_1 as $card) {
                                $card_heading = $card['card_heading'];
                                $card_discription = $card['card_discription'];

                                ?>
                                <div class="flex !flex-col lg:!flex-row items-start gap-[20px]">
                                    <div class="py-[40px] px-[32px] bg-white rounded-[20px]">
                                        <h1
                                            class="uppercase leading-[32px] uppercase roboto text-[20px] md:text-[24px] font-bold tracking-[1.2px]  mb-[20px] roboto">
                                            <?php echo $card_heading; ?>
                                        </h1>
                                        <p class="roboto text-[14px] text-black tracking-[0.84px] leading-[20px]">
                                            <?php echo $card_discription; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="imagesWrapper_ar lg:w-[412px] w-[100%] aboutoverlay_image relative">
                    <img src="<?php echo $hero_section_image_1; ?>"
                        class="w-[100%] h-[232px] object-cover rounded-[20px]" />
                    <img src="<?php echo $hero_section_image_2; ?>"
                        class="w-[100%] h-[363px] mt-[20px] object-cover rounded-[20px]" />
                </div>
            </div>
        </div>
        <!-- stats Section start -->
        <?php
        if ($card_2 && is_array($card_2)) {
            ?>

            <div class="flex flex-col md:flex-row items-center gap-[20px] mt-[20px]">
                <?php
                foreach ($card_2 as $card) {
                    $card_2_heading = $card['card_2_heading'];
                    $card_2_discription = $card['card_2_discription'];

                    ?>
                    <div class="rounded-[20px] project bg-white py-[20px] md:py-[40px] px-[32px]">
                        <h1 class="uppercase text-center text-[#05060F] text-[16px] md:text-[24px] font-bold mb-[20px] roboto">
                            <?php echo $card_2_heading; ?>+
                        </h1>
                        <p class="roboto text-center text-[14px] text-black tracking-[0.84px]">
                            <?php echo $card_2_discription; ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </section>
<?php } ?>

<!-- LeaderShip Team Section -->
<?php if (get_field('leadership_team_section')) {
    $leadership_team_section = get_field('leadership_team_section');
    $team_heading = $leadership_team_section['team_heading'];
    $team_description = $leadership_team_section['team_description'];
    $leadership_team = $leadership_team_section['leadership_team'];
    ?>

    <section class="py-[40px] md:py-[70px]">
        <div class="container mx-auto">
            <div class="!w-[100%] md:!w-[458px] mb-[40px]">
                <h1 class="font-montserrat uppercase text-[24px] md:text-[32px] font-bold tracking-[3.6px] mt-[10px] mb-[24px]">
                    <?php echo $team_heading; ?>
                </h1>
                <p class="roboto text-[14px] text-black tracking-[0.84px]">
                    <?php echo $team_description; ?>
                </p>
            </div>
            <?php
            if ($leadership_team && is_array($leadership_team)) {
                ?>
                <div class="allteam grid !grid-cols-1 lg:!grid-cols-4 gap-[20px] md:!grid-cols-2 rounded-[20px]">
                    <?php foreach ($leadership_team as $team) {
                        $member_image = $team['member_image'];
                        $member_name = $team['member_name'];
                        $sub_heading = $team['sub_heading'];
                        $member_discription = $team['member_discription'];
                        ?>

                        <div class="team bg-white rounded-[20px]">
                            <img src="<?php echo $member_image; ?>"
                                class="h-[276px] w-[100%] object-cover object-center rounded-t-[20px] mx-auto" />
                            <div class="location_text px-[32px] py-[40px]">
                                <h1
                                    class="uppercase roboto !w-[unset] md:!w-[209px] text-[20px] md:text-[24px] font-bold tracking-[1px] mt-[10px] leading-[32px] mb-[9px]">
                                    <?php echo $member_name; ?>
                                </h1>
                                <p class="roboto text-[14px] mb-[14px] text-black tracking-[0.84px]">
                                    <?php echo $sub_heading; ?>
                                </p>
                                <p class="roboto text-[14px] text-black tracking-[0.84px]">
                                    <?php echo $member_discription; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>

<!-- Partnerships Section -->
<?php if (get_field('partnerships_section')) {
    $partnerships_section = get_field('partnerships_section');
    $partnerships_section_heading = $partnerships_section['partnerships_section_heading'];
    $partnerships_section_discription = $partnerships_section['partnerships_section_discription'];
    $partners_images = $partnerships_section['partners_image'];
    ?>

    <section class="py-[40px] md:py-[70px]">
        <div class="container mx-auto">
            <div class="!w-[100%] md:!w-[458px] mb-[40px]">
                <h1 class="font-montserrat uppercase text-[24px] md:text-[32px] font-bold tracking-[3.6px] mt-[10px] mb-[24px]">
                    <?php echo $partnerships_section_heading; ?>
                </h1>
                <p class="roboto text-[14px] text-black tracking-[0.84px]">
                    <?php echo $partnerships_section_discription; ?>
                </p>
            </div>
            <?php
            if ($partners_images && is_array($partners_images)) {
                ?>
                <div class="allpartners grid !grid-cols-2 lg:!grid-cols-4 gap-[20px] md:!grid-cols-2">
                    <?php foreach ($partners_images as $partner) {
                        $partner_image = $partner['partner_image'];
                        ?>

                        <div class="partner bg-white rounded-[20px] p-[24px] h-[143px] flex items-center">
                            <img src="<?php echo $partner_image; ?>" class="m-auto w-[177px] h-[57px] object-contain" />
                        </div>

                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>

<!-- Certifications & Awards Section -->
<?php if (get_field('certifications_&_awards_section')) {
    $certifications_and_awards_section = get_field('certifications_&_awards_section');
    $certifications_and_awards_section_heading = $certifications_and_awards_section['certifications_&_awards_section_heading'];
    $certifications_and_awards_section_discription = $certifications_and_awards_section['certifications_&_awards_section_discription'];
    $certifications_cards = $certifications_and_awards_section['certifications_&_awards_section_card'];
    ?>
    <section class="py-[40px] md:py-[70px]">
        <div class="container mx-auto">
            <div class="!w-[100%] md:!w-[458px] mb-[40px]">
                <h1 class="font-montserrat uppercase text-[24px] md:text-[32px] font-bold tracking-[3.6px] mt-[10px] mb-[24px]">
                    <?php echo $certifications_and_awards_section_heading; ?>
                </h1>
                <p class="roboto text-[14px] text-black tracking-[0.84px]">
                    <?php echo $certifications_and_awards_section_discription; ?>
                </p>
            </div>
            <?php
            if ($certifications_cards && is_array($certifications_cards)) {
                ?>
                <div class="grid !grid-cols-1 lg:!grid-cols-4 gap-[20px] md:!grid-cols-2">
                    <?php foreach ($certifications_cards as $certifications_card) {
                        $certifications_card_image = $certifications_card['certifications_&_awards_icon'];
                        $certifications_card_title = $certifications_card['certifications_&_awards_heading'];
                        $certifications_card_discription = $certifications_card['certifications_&_awards_discription'];
                        ?>

                        <div class="bg-white rounded-[20px] p-[24px] h-[265px] flex flex-col justify-center items-center">
                            <img src="<?php echo $certifications_card_image; ?>" width="45" />
                            <h1
                                class="uppercase max-w-[240px] text-center roboto text-[20px] md:text-[24px] leading-[32px] font-bold tracking-[1px] mt-[16px] mb-[20px]">
                                <?php echo $certifications_card_title; ?>
                            </h1>
                            <p
                                class="roboto text-center text-[14px] text-[#000000] font-normal text-left text-black tracking-[0.84px]">
                                <?php echo $certifications_card_discription; ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>

<!-- Career Opportunities Section -->
<?php if (get_field('career_opportunities_section')) {
    $career_opportunities_section = get_field('career_opportunities_section');
    $career_opportunities_section_heading = $career_opportunities_section['career_opportunities_section_heading'];
    $career_opportunities_section_discription = $career_opportunities_section['career_opportunities_section_discription'];
    $career_opportunities_cards = $career_opportunities_section['career_opportunities_card'];

    ?>
    <section class="pt-[40px] md:pt-[70px] md:mb-[40px] mb-[20px]">
        <div class="container mx-auto">
            <div class="!w-[100%] md:!w-[458px] mb-[40px]">
                <h1 class="font-montserrat uppercase text-[24px] md:text-[32px] font-bold tracking-[3.6px] mt-[10px] mb-[24px]">
                    <?php echo $career_opportunities_section_heading; ?>
                </h1>
                <p class="roboto text-[14px] text-black tracking-[0.84px]">
                    <?php echo $career_opportunities_section_discription; ?>
                </p>
            </div>

            <?php
            if ($career_opportunities_cards && is_array($career_opportunities_cards)) {
                ?>
                <div class="grid !grid-cols-1 lg:!grid-cols-3 gap-[20px] md:!grid-cols-2">
                    <?php
                    foreach ($career_opportunities_cards as $career_opportunities_card) {
                        $career_opportunities_card_image = $career_opportunities_card['career_opportunities_icon'];
                        $career_opportunities_card_title = $career_opportunities_card['career_opportunities_card_heading'];
                        $career_opportunities_card_discription = $career_opportunities_card['career_opportunities_card_discription'];

                        ?>
                        <div class="bg-white rounded-[20px] p-[24px] h-[265px] flex flex-col justify-center items-center">
                            <img src="<?php echo $career_opportunities_card_image; ?>" width="45" />
                            <h1
                                class="uppercase text-center roboto text-[20px] md:text-[24px] leading-[32px] font-bold tracking-[1px] mt-[16px] mb-[20px]">
                                <?php echo $career_opportunities_card_title; ?>
                            </h1>
                            <p class="roboto text-[14px] text-center text-[#000000] px-[10px] font-normal text-left text-black tracking-[0.84px]">
                                <?php echo $career_opportunities_card_discription; ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php get_template_part('template-parts/job-content'); ?>


<?php } ?>
<div id="popupOverlayapplynow"
    class="applynowform h-[100vh] fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 hidden ">
    <div class="book_a_call flex flex-col w-[350px] sm:w-[584px] md:w-[684px]  lg:w-[884px] px-[20px] rounded-[20px] bg-white  relative">
        <img src="https://localdev.mi6.global/wp-content/uploads/2025/06/close.png" width="24" id="closePopup_apply"
            class="mt-[32px] ml-auto cursor-pointer" alt="Close">

        <h2
            class="font-montserrat uppercase text-[20px] md:text-[32px] font-bold leading-[40px] tracking-[3.8px] md:mb-[24px]">
            Apply now
        </h2>

        <div class="book_a_call apply_now">
            <?php echo do_shortcode('[wpforms id="863"]'); ?>
        </div>
    </div>
</div>
<!-- Job Content Section -->



<?php
get_footer();
?>