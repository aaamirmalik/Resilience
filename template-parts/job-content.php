<?php

$args = array(
    'post_type' => 'job',
    'posts_per_page' => 4, // Change as needed
    'post_status' => 'publish'
);
$jobs_query = new WP_Query($args);

if ($jobs_query->have_posts()):
?>
    <section class="pb-[70px]">
        <div class="container mx-auto">
            <div
                class="applyall grid !grid-cols-1 lg:!grid-cols-2 gap-[20px] md:!grid-cols-1">
                <?php
                while ($jobs_query->have_posts()): $jobs_query->the_post();
                    $title = get_the_title();
                    $id = get_the_ID();
                    $job_details = get_field("jobs_fields", $id);
                    $job_type = $job_details['job_type'];
                    $job_location = $job_details['job_location'];
                    $job_descriptions = $job_details['job_descriptions'];
                    $job_requirements = $job_details['job_requirements'];
                    $job_apply_url = $job_details['job_apply_url'];
                ?>
                    <div class="apply bg-white py-[40px] px-[32px] rounded-[20px]">
                        <h1
                            class="uppercase roboto text-[20px] md:text-[24px] font-bold tracking-[1.2px] mb-[20px]">
                            <?php echo $title; ?>
                        </h1>
                        <div class="applytext">
                            <div
                                class="flex flex-col md:flex-row gap-[5px] md:gap-[70px] mb-[12px]">
                                <p
                                    class="roboto font-[600] md:font-[400] text-[14px] w-[79px] text-[#05060F]  text-black tracking-[0.84px]">
                                    Location
                                </p>
                                <p
                                    class="roboto text-[14px] text-[#000000] font-normal text-black tracking-[0.84px]">
                                     <?php echo $job_location; ?>
                                </p>
                            </div>
                            <div
                                class="flex flex-col md:flex-row gap-[5px] md:gap-[70px] mb-[12px]">
                                <p
                                    class="roboto font-[600] md:font-[400] text-[14px] w-[79px] text-[#05060F] text-black tracking-[0.84px]">
                                    Job Type
                                </p>
                                <p
                                    class="roboto text-[14px] text-[#000000] font-normal text-black tracking-[0.84px]">
                                    <?php echo $job_type; ?>
                                </p>
                            </div>
                            <div
                                class="flex flex-col md:flex-row gap-[5px] md:gap-[70px] mb-[12px]">
                                <p
                                    class="roboto font-[600] md:font-[400] text-[14px] w-[79px] text-[#05060F]  text-black tracking-[0.84px]">
                                    Description
                                </p>
                                <div
                                    class="roboto text-[14px] text-[#000000] font-normal text-black tracking-[0.84px]">
                                   <?php echo $job_descriptions; ?>
                                </div>
                            </div>
                            <div
                                class="flex flex-col md:flex-row gap-[5px] md:gap-[70px] mb-[12px]">
                                <p
                                    class="roboto font-[600] md:font-[400] text-[14px] w-[79px] text-[#05060F] text-black tracking-[0.84px]">
                                    Requirements
                                </p>
                                <div
                                    class="custom-ul-ol list-disc roboto text-[14px] text-[#000000] font-normal text-left text-black tracking-[0.84px]">
                                    <?php echo $job_requirements; ?>
                                </div>
                            </div>
                        </div>
                        <a href=""
                            class="apply_now_btn roboto hover:bg-[var(--button-bg-red)] text-center mt-[20px] block  w-[130px] md:w-[195px] md:h-[56px] py-[16px] leading-[26px] bg-[#323334] rounded-[10px] roboto uppercase text-[14px] text-white font-bold tracking-[1.2px] shadow-lg">
                            Apply
                        </a>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </section>
<?php
endif;
?>