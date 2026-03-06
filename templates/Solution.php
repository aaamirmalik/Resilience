<?php
/**
 * Template Name: Solution Page
 */

?>
<?php get_header() ?>
<section class="bg-[#F8F8F8] pb-[50px] md:pb-[140px]">
    <?php
    $solution = get_field('solution');
    $solution_page_heading = $solution['page_heading'];
    $solution_categories = $solution['categories'];
    $solution_how_it_use = $solution['how_it_use'];
    $solution_bussiness_benifit = $solution['bussiness_benifit'];
    ?>
    <div class="container mx-auto px-4">
        <?php if (!empty($solution_page_heading)): ?>
            <h1
                class="font-montserrat uppercase text-[#05060F] text-[30px] md:text-[40px] md:leading-[48px] font-bold tracking-[4.8px] mt-[16px] mb-[40px]">
                <?php the_title(); ?>
            </h1>
        <?php endif; ?>

        <?php
        $solution_categories_heading = $solution_categories['heading'];
        $solution_categories_description = $solution_categories['description'];
        $solution_categories_category = $solution_categories['category'];

        if ($solution_categories):
            ?>
            <div class="about_us">
                <div class="mb-[40px] w-[100%] md:w-[717px]">
                    <?php if (!empty($solution_categories_heading)): ?>
                        <h1
                            class="font-montserrat uppercase text-[#05060F] text-[20px] md:text-[32px] leading-[20px] md:leading-[40px] font-bold tracking-[3.8px] mb-[24px]">
                            <?php echo esc_html($solution_categories_heading); ?>
                        </h1>
                    <?php endif; ?>
                    <?php if (!empty($solution_categories_description)): ?>
                        <p class="roboto text-[14px] text-[#05060F] leading-[20px] md:w-[477px]">
                            <?php echo esc_html($solution_categories_description); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <?php if($solution_categories_category){ ?>
                <div class="grid !grid-cols-1 lg:!grid-cols-3 gap-[20px] md:!grid-cols-2">
                    <?php foreach ($solution_categories_category as $category): ?>
                        <div class="bg-white rounded-[20px] px-[32px] h-[257px] flex flex-col justify-center items-center">
                            <?php if (!empty($category['icon']['url'])): ?>
                                <img src="<?php echo esc_url($category['icon']['url']); ?>" width="45">
                            <?php endif; ?>
                            <?php if (!empty($category['heading'])): ?>
                                <h1
                                    class="uppercase text-center roboto  text-[20px] md:text-[24px] leading-[32px] font-bold tracking-[1px] my-[20px]">
                                    <?php echo esc_html($category['heading']); ?>
                                </h1>
                            <?php endif; ?>
                            <?php if (!empty($category['descriptoin'])): ?>
                                <p class="roboto text-[14px] text-[#000000] font-normal text-center text-black tracking-[0.84px]">
                                    <?php echo esc_html($category['descriptoin']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php } ?>
            </div>
        <?php endif ?>
    </div>
</section>

<?php
$solution = get_field('solution');
$solution_how_it_use = $solution['how_it_use'];
$how_it_use_heading = $solution_how_it_use['heading'];
$how_it_use_description = $solution_how_it_use['description'];
$how_it_use_all = $solution_how_it_use['uses'];

if ($solution_how_it_use):
    ?>
    <section class="pb-[50px] md:pb-[140px]">
        <div class="container mx-auto px-4">
            <div class="!w-[100%] md:!w-[458px] mb-[40px] ">
                <?php if (!empty($solution_page_heading)): ?>
                    <h1
                        class="font-montserrat uppercase text-[24px] md:text-[32px] md:leading-[40px] font-bold tracking-[3.6px] mt-[10px] mb-[24px]">
                        <?php echo esc_html($how_it_use_heading); ?>
                    </h1>
                <?php endif; ?>
                <?php if (!empty($how_it_use_description)): ?>
                    <p class="roboto text-[#05060F] text-[14px] text-black tracking-[0.84px]">
                        <?php echo esc_html($how_it_use_description); ?>
                    </p>
                <?php endif; ?>
            </div>
            <?php if($how_it_use_all){ ?>
            <div class="solution_overlay usedall grid grid-col-1 lg:grid-cols-2 gap-[20px]">
                <?php foreach ($how_it_use_all as $uses): ?>
                    <div class="used relative">
                        <?php if (!empty($uses['image'])): ?>
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($uses['image'], 'full')); ?>"
                                class="h-[388px] rounded-t-[20px] w-full object-cover">
                        <?php endif; ?>

                        <div
                            class="bg-white rounded-b-[20px] px-[10px]  md:px-[32px] py-[20px] md:py-[40px] flex flex-col justify-center items-start">
                            <?php if (!empty($uses['heading'])): ?>
                                <h1
                                    class="uppercase text-center roboto  text-[20px] md:text-[24px] leading-[32px] font-bold tracking-[1px]  mb-[20px]">
                                    <?php echo esc_html($uses['heading']); ?>
                                </h1>
                            <?php endif; ?>
                            <?php if (!empty($uses['description'])): ?>
                                <p class="roboto text-[14px] text-[#05060F] leading-[20px] font-normal text-left text-black tracking-[0.84px]">
                                    <?php echo esc_html($uses['description']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <?php } ?>
        </div>
    </section>
<?php endif ?>

<?php
$solution_benefit = $solution['bussiness_benifit'];
$benefit_heading = $solution_benefit['heading'];
$benefit_description = $solution_benefit['description'];
$benefit_all = $solution_benefit['uses'];

if ($solution_benefit):
    ?>
    <section class="pb-[50px] md:pb-[70px]">
        <div class="container mx-auto px-4">
            <div class="about_us">
                <div class="mb-[40px] w-[100%] md:w-[520px]">
                    <?php if (!empty($benefit_heading)): ?>
                        <h1
                            class="font-montserrat uppercase text-[#05060F] text-[20px] md:text-[32px] leading-[20px] md:leading-[40px] font-bold tracking-[3.8px] mb-[24px]">
                            <?php echo esc_html($benefit_heading); ?>
                        </h1>
                    <?php endif; ?>
                    <?php if (!empty($benefit_description)): ?>
                        <p class="roboto text-[14px] text-[#05060F] leading-[20px]">
                            <?php echo esc_html($benefit_description); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <?php if($benefit_all){ ?>
                <div class="grid !grid-cols-1 lg:!grid-cols-3 gap-[20px] md:!grid-cols-2">
                    <?php foreach ($benefit_all as $benifit): ?>
                        <div class="bg-white rounded-[20px] px-[26px] h-[257px] flex flex-col justify-center items-center">
                            <?php if (!empty($benifit['image']['url'])): ?>
                                <img src="<?php echo esc_url($benifit['image']['url']) ?>" width="45">
                            <?php endif; ?>
                            <?php if (!empty($benifit['heading'])): ?>
                                <h1
                                    class="uppercase text-center roboto  text-[20px] md:text-[24px] leading-[32px] font-bold tracking-[1px] my-[20px]">
                                    <?php echo esc_html($benifit['heading']); ?>
                                </h1>
                            <?php endif; ?>
                            <?php if (!empty($benifit['description'])): ?>
                                <p class="roboto text-[14px] text-[#000000] font-normal text-center text-black tracking-[0.84px]">
                                    <?php echo esc_html($benifit['description']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php endif ?>

<?php get_footer() ?>