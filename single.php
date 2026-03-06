<?php get_header(); ?>

<section class="bg-[#F8F8F8] py-16">
    <div class="container mx-auto px-4 sm:px-5 lg:px-6">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="max-w-4xl mx-auto overflow-hidden">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" class="rounded w-full h-64 object-cover object-center">
                <?php endif; ?>

                <div class="py-6">
                    <h1 class="font-montserrat text-3xl sm:text-4xl font-bold uppercase text-[#05060F] mb-4 tracking-wide">
                        <?php the_title(); ?>
                    </h1>

                    <div class="text-sm sm:text-base text-[#05060F] leading-7 tracking-wide">
                        <?php the_content(); ?>
                    </div>

                    <!-- <div class="mt-8">
                        <a href="<?php echo get_post_type_archive_link('featured_product'); ?>"
                            class="inline-block bg-[#323334] hover:bg-black-900 text-white text-xs sm:text-sm font-bold tracking-wider uppercase px-6 sm:px-10 py-3 sm:py-4 rounded-lg shadow-lg shadow-[#32333466] transition-all duration-200">
                            Back to Featured Products
                        </a>
                    </div> -->
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>
