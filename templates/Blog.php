<?php
/**
 * Template Name: Blogs Page
 */

get_header();
?>

<div class="page-container-am">
    <main class="container-am">
        <header class="blog-header-am">
            <h1><?php the_title(); ?></h1>
            <p>Explore our latest insights and professional resources.</p>
        </header>

        <nav class="category-filter-am">
            <a href="<?php echo get_permalink(); ?>" class="category-btn-am active-am">All Articles</a>
            <?php
            $categories = get_categories();
            foreach($categories as $category) {
                echo '<a href="' . get_category_link($category->term_id) . '" class="category-btn-am">' . $category->name . '</a>';
            }
            ?>
        </nav>

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if ($paged == 1) {
            $posts_per_page = 10;
            $offset = 0;
        } else {
            $posts_per_page = 9;
            $offset = 1 + (($paged - 2) * 9);
        }
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_per_page,
            'paged' => $paged,
            'offset' => $offset
        );
        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) : 
            $count = 0;
            while ($wp_query->have_posts()) : $wp_query->the_post(); 
                if ($count == 0 && $paged == 1) : // First post is Featured
        ?>
        <article class="featured-post-am">
            <div class="featured-post-image-am">
                <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); else : ?>
                <img src="https://via.placeholder.com/1200x800" alt="Placeholder">
                <?php endif; ?>
            </div>
            <div class="featured-post-content-am">
                <div style="margin-bottom: 15px;">
                    <span class="badge-am"><?php the_category(', '); ?></span>
                    <small><?php echo get_the_date(); ?></small>
                </div>
                <h2><?php the_title(); ?></h2>
                <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                <a href="<?php the_permalink(); ?>" class="read-more-link-am">Read Full Article →</a>
            </div>
        </article>
        <div class="blog-grid-am">
            <?php else : // All other posts in Grid ?>
            <article class="blog-card-am">
                <div class="blog-card-image-am">
                    <?php if (has_post_thumbnail()) : the_post_thumbnail('medium_large'); endif; ?>
                </div>
                <div class="blog-card-content-am">
                    <small style="margin-bottom: 10px; display: block;"><?php echo get_the_date(); ?></small>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    <a href="<?php the_permalink(); ?>" class="read-more-link-am">Read Article →</a>
                </div>
            </article>
            <?php 
                endif;
                $count++;
            endwhile; 
            echo '</div>'; // Close blog-grid-am

            // Pagination
            echo '<div class="pagination-am" style="margin: 50px 0px 80px 0px; text-align: center;">';
            echo paginate_links(array(
                'total' => $wp_query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'prev_text' => '<iconify-icon icon="lucide:chevron-left" style="font-size:16px"></iconify-icon>',
                'next_text' => '<iconify-icon icon="lucide:chevron-right" style="font-size:16px"></iconify-icon>',
                'type' => 'list'
            ));

            echo '</div>';

            wp_reset_postdata();
        else : 
            echo '<p>No posts found.</p>';
        endif; 
        ?>
    </main>
</div>

<?php get_footer(); ?>