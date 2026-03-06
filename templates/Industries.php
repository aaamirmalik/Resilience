<?php

/**
 * Template Name: Industries
 * @package WordPress
 * @subpackage motabaqah
 * @since motabaqah 1.0
 */
?>

<!-- get header -->
<?php get_header(); ?>

<!--Heading Section Start-->
<div class="lg:w-full w-full flex pt-4 justify-center bg-[#f9f9f9]">
    <div class="container mx-auto px-4 sm:px-5  mx-auto px-4 sm:px-5">
        <h1
            class="text-[#05060F] body lg:text-[40px] font-montserrat text-[35px] leading-[3rem] font-bold uppercase tracking-[4.8px]">
            <?php the_title(); ?>
        </h1>
    </div>
</div>
<!--Heading Section End-->

<!--Overview Section Start-->

<?php
if (get_field('hero_section')) {
    $hero_section = get_field('hero_section');
    $section_heading = $hero_section['section_heading'];
    $section_description = $hero_section['section_description'];
    $hero_image_1 = $hero_section['hero_image_1'];
    $hero_image_2 = $hero_section['hero_image_2'];

?>

    <div class="w-full flex justify-center lg:pt-[70px] pt-[35px] pb-[20px] bg-[#f9f9f9]">
        <div class="container mx-auto px-4 sm:px-5  w-full flex flex-col gap-[24px]">
            <h1
                class="text-[#05060F] body lg:text-[32px] font-montserrat text-[28px] max-w-[588px]  leading-[40px] font-bold uppercase tracking-[4.8px]">
                <?php echo $section_heading; ?>
            </h1>

            <div class="w-full pt-1 gap-5 flex lg:flex-row flex-col justify-between">
                <div class="flex flex-col gap-4 lg:w-[50%] rob leading-5 text-sm text-[#05060F] tracking-[0.84px] Industries_overviewP">
                    <?php echo $section_description; ?>
                </div>
                <div class="flex md:flex-row flex-col  gap-5 lg:w-[50%] ">
                    <img src="<?php echo $hero_image_1; ?>" class="md:w-[50%] h-[400px] rounded-[20px] md:h-[276px] object-cover" />
                    <img src="<?php echo $hero_image_2; ?>" class="md:w-[50%] h-[400px] rounded-[20px]  md:h-[276px] object-cover" />
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!--Overview Section End-->

<!-- Features and Optimization Section Start-->
<?php
if (get_field('features_and_optimization_sections')) {
    $features_and_optimization_sections = get_field('features_and_optimization_sections');
    $property__section_listings = $features_and_optimization_sections['property__section_listings'];
    $section_image = $features_and_optimization_sections['section_image'];

?>

    <div class="flex container mx-auto px-4 sm:px-5  mx-auto justify-center lg:pb-[70px] pb-[35px] lg:flex-row flex-col gap-[20px]">
        <div
            class="bg-white rounded-[20px] lg:w-[412px] md:h-[354px] flex flex-col  md:px-[36px] px-[15px] py-[25px] md:pt-[46px] gap-[30px]">
            <?php

            foreach ($property__section_listings as $property__section_listing) {
                $property_title = $property__section_listing['property_headings'];
                $property_list = $property__section_listing['property_list'];


            ?>
                <div class="flex flex-row md:w-[100%] lg:w-[340px] justify-between">
                    <p class="rob leading-5 text-sm text-[#05060F] tracking-[0.84px] w-[50%]">
                        <?php echo $property_title; ?>
                    </p>

                    <?php
                    if ($property_list) {
                    ?>
                        <ul class="w-[50%]">
                            <?php
                            foreach ($property_list as $property) {
                                echo "<li class='rob leading-5 text-sm list-none text-[#05060F] tracking-[0.84px] mb-[6px]'>" . $property['listing_title'] . "</li>";
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>

                </div>
            <?php
            }
            ?>
        </div>
<div class="industry_overlay lg:w-[calc(100%-412px)] lg:h-[354px] relative">
        <img src="<?php echo $section_image; ?>" class="h-[300px] rounded-[20px]  md:h-[354px] object-cover w-full" />
    </div>
    </div>
<?php
}
?>
<!-- Features and Optimization Section end-->

<!--Learn About Sections Start-->
<?php if (get_field('learn_about_everything')) {
    $learn_about_everything = get_field('learn_about_everything');
    $section_title = $learn_about_everything['section_title'];
    $section_description = $learn_about_everything['section_description'];
    $sections_list = $learn_about_everything['sections_list'];
?>

    <div class="w-full flex justify-center lg:py-[70px] py-[35px]  bg-[#f9f9f9]">
        <div class="flex flex-col container mx-auto px-4 sm:px-5 ">
            <h1
                class="font-montserrat text-[#05060F] body lg:text-[32px] text-[28px] max-w-[560px] leading-[40px] font-bold uppercase tracking-[4.8px]">
                <?php echo $section_title; ?>
            </h1>
            <div class="rob leading-5 text-sm text-[#05060F] tracking-[0.84px] md:w-[560px] pt-6">
                <?php echo $section_description; ?>
            </div>

            <?php if ($sections_list) { ?>
                <div class="grid md:grid-cols-2 grid-cols-1 gap-5 pt-[40px]">
                    <?php foreach ($sections_list as $section) {
                        $section_title = $section['section_title'];
                        $section_image = $section['section_image'];
                        $sections_details_list = $section['sections_details_list'];
                    ?>
                        <div class="flex flex-col rounded-[20px] bg-white">
                            <img src="<?php echo $section_image; ?>" class="w-full lg:h-[301px]  h-[250px]" />

                            <div
                                class="bg-white rounded-bl-[20px] rounded-br-[20px] md:py-[40px] md:px-[32px] px-[15px] py-[25px]">
                                <h3
                                    class="text-[#05060F] font-bold text-[24px] md:leading-[32px] tracking-[1.6px] uppercase">
                                    <?php echo $section_title; ?>
                                </h3>
                                <?php
                                if ($sections_details_list) {
                                    foreach ($sections_details_list as $index => $section_details) {
                                        $details_title = $section_details['details_title'];
                                        $details_descriptions = $section_details['details_descriptions'];
                                ?>
                                        <p
                                            class="rob leading-5 text-sm text-[#05060F] tracking-[0.84px] pt-[16px] w-100">
                                            <?php echo $index + 1 . ". " . $details_title; ?>
                                        </p>
                                        <div
                                            class="rob leading-5 text-sm text-[#05060F] tracking-[0.84px] w-100 pt-2">
                                            <?php echo $details_descriptions; ?>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
}
?>
<!--Learn About Sections End-->

<!--Studies Section Start-->
<?php
if (get_field('case_studies_section')) {
    $case_studies = get_field('case_studies_section');
    $section_title = $case_studies['section_title'];
    $section_description = $case_studies['section_description'];
    $case_studies_list = $case_studies['case_studies_list'];
?>

    <div class="w-full flex justify-center lg:py-[70px] py-[35px] bg-[#f9f9f9]">
        <div class="flex flex-col container mx-auto px-4 sm:px-5 ">
            <h2
                class="text-[#05060F] body lg:text-[32px] text-[28px] leading-[40px] font-montserrat font-bold uppercase tracking-[4.8px]">
                <?php echo $section_title; ?>
            </h2>
            <div
                class="rob leading-5 text-sm text-[#05060F] tracking-[0.84px] md:w-[672px] pt-[40px] w-100">
                <?php echo $section_description; ?>
            </div>

            <?php
            if ($case_studies_list) {
                foreach ($case_studies_list as $case_studies) {
                    $case_studies_title = $case_studies['case_study_title'];
                    $case_study_properties = $case_studies['case_study_properties'];
                    $case_studies_image = $case_studies['case_study_image'];
            ?>

                    <div class="flex lg:flex-row flex-col pt-[20px] ">
                        <div
                            class="bg-white md:min-w-[500px] lg:rounded-bl-[20px] lg:rounded-br-[0px] lg:rounded-tl-[20px] lg:rounded-tr-[0px] rounded-tl-[20px] rounded-tr-[20px] md:py-[40px] px-[15px] py-[25px] md:px-[32px] lg:w-[55%]">
                            <h3
                                class="text-[#05060F] font-bold tracking-[1.6px] uppercase text-[24px] md:leading-[32px] mb-[6px]">
                                <?php echo $case_studies_title; ?>
                            </h3>
                            <?php
                            if ($case_study_properties) {
                                foreach ($case_study_properties as $property) {
                                    $property_title = $property['property_name'];
                                    $property_list = $property['property_description'];
                            ?>
                                    <div class="flex flex-row gap-[30px] pt-[12px]">
                                        <div class="w-[70px] min-w-[69px]">
                                            <p
                                                class="w-full rob leading-5 text-sm text-[#05060F] tracking-[0.84px]">
                                                <?php echo $property_title; ?>
                                            </p>
                                        </div>

                                        <div class="list_style_ar rob leading-5 text-sm text-[#05060F] tracking-[0.84px]">
                                            <?php echo $property_list; ?>
                                        </div>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>

                        <img src="<?php echo $case_studies_image; ?>" class="lg:w-[45%] md:h-[400px] lg:h-auto h-[400px] object-cover lg:rounded-tr-[20px] lg:rounded-br-[20px] lg:rounded-tl-[0px] lg:rounded-bl-[0px] rounded-br-[20px] rounded-bl-[20px]" />
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
<?php
}
?>
<!-- get Footer -->
<?php get_footer(); ?>