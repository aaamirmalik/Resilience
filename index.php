

<?php 
if ( ! defined( 'WPINC' ) ) {
    die();
};

get_header(); ?>
<div class="c-post">
    <main id="Main" class="c-main-content o-main" role="main">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="c-cms-content o-wrapper">
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </div>
                    <?php wp_link_pages(); ?>
                </article>
            <?php endwhile; 
            wp_reset_postdata();
            endif; ?>
    </main>
</div>
<?php get_footer(); ?>