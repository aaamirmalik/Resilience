<?php
/**
 * The template for displaying Category pages
 */

get_header();

// Get information about the current category being viewed
$current_category = get_queried_object();
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
            <a href="<?php echo get_permalink( get_page_by_path('blog') ); ?>" class="category-btn-am">All Articles</a>
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
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="blog-card-am">
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
                        <a href="<?php the_permalink(); ?>" class="read-more-link-am">Read Article →</a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination-am">
            <?php
            echo paginate_links(array(
                'prev_text' => '← Prev',
                'next_text' => 'Next →',
                'type'      => 'plain',
            ));
            ?>
        </div>

        <?php else : ?>
            <p style="text-align: center; padding: 40px;">No posts found in this category.</p>
        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>