<?php
/**
 * The template for displaying Category pages
 */

get_header();

// Get information about the current category being viewed
$current_category = get_queried_object();

// Resolve the "All Articles" URL safely across environments.
$page_for_posts_id = (int) get_option('page_for_posts');
$blog_page_url = $page_for_posts_id ? get_permalink($page_for_posts_id) : '';

if (!$blog_page_url) {
    $blog_pages = get_pages(array(
        'meta_key'    => '_wp_page_template',
        'meta_value'  => 'templates/Blog.php',
        'number'      => 1,
    ));

    if (!empty($blog_pages)) {
        $blog_page_url = get_permalink($blog_pages[0]->ID);
    }
}

if (!$blog_page_url) {
    $blog_page_url = home_url('/blog/');
}
?>


<div class="page-container-am">
    <main class="container-am">
        
        <header class="blog-header-am">
            <span>Currently Viewing</span>
            <h1><?php single_cat_title(); ?></h1>
            <?php if ( category_description() ) : ?>
                <div class="category-description-am"><?php echo category_description(); ?></div>
            <?php endif; ?>
        </header>

        <nav class="category-filter-am">
            <a href="<?php echo esc_url($blog_page_url); ?>" class="category-btn-am">All Articles</a>
            <?php
            $categories = get_categories();
            foreach($categories as $category) {
                // Highlight the active category button
                $active_class = ($current_category->term_id == $category->term_id) ? 'active-am' : '';
                echo '<a href="' . get_category_link($category->term_id) . '" class="category-btn-am ' . $active_class . '">' . $category->name . '</a>';
            }
            ?>
        </nav>

        <div class="blog-grid-am">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
                $permalink = get_the_permalink();
            ?>
                <article class="blog-card-am" style="cursor: pointer;" onclick="window.location='<?php echo $permalink; ?>';">
                    <div class="blog-card-image-am">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php else : ?>
                            <img src="https://via.placeholder.com/600x400" alt="No image available">
                        <?php endif; ?>
                    </div>
                    <div class="blog-card-content-am">
                        <small style="margin-bottom: 8px; color: var(--muted-foreground-am); display: block;">
                            <?php echo get_the_date(); ?>
                        </small>
                        <h3 class="trimmed-title" style="font-size: 20px; margin-bottom: 12px; line-height: 1.4;">
                            <?php the_title(); ?>
                        </h3>
                        <p style="font-size: 14px; color: var(--muted-foreground-am); margin-bottom: 20px;">
                            <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                        </p>
                        <a href="<?php echo $permalink; ?>" class="read-more-link-am">Read Article →</a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination-am" style="margin: 50px 0px 80px 0px; text-align: center;">
            <?php
            echo paginate_links(array(
                'prev_text' => '<iconify-icon icon="lucide:chevron-left" style="font-size:16px"></iconify-icon>',
                'next_text' => '<iconify-icon icon="lucide:chevron-right" style="font-size:16px"></iconify-icon>',
                'type'      => 'list',
            ));
            ?>
        </div>

        <?php else : ?>
            <p style="text-align: center; padding: 40px;">No posts found in this category.</p>
        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>
