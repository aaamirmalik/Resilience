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

    <nav class="category-filter-am" >
        <a href="<?php echo get_permalink(); ?>" class="category-btn-am active-am">All Articles</a>
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            echo '<a href="' . get_category_link($category->term_id) . '" class="category-btn-am">' . $category->name . '</a>';
        }
        ?>
    </nav>

    <?php
    $paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
    $blog_page_url = trailingslashit(get_permalink(get_queried_object_id()));

    if ($paged == 1) {
        $posts_per_page = 10;
        $offset = 0;
    } else {
        $posts_per_page = 9;
        // Page 1 shows 10 posts (1 featured + 9 cards). Page 2+ should start after those 10.
        $offset = 10 + (($paged - 2) * 9);
    }

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $posts_per_page,
        'offset'         => $offset
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
        $count = 0;

        while ($custom_query->have_posts()) : $custom_query->the_post();
            $permalink = get_the_permalink();

            if ($paged == 1 && $count == 0) :
    ?>
                <article class="featured-post-am" style="cursor: pointer;" onclick="window.location='<?php echo $permalink; ?>';">
                    <div class="featured-post-image-am">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <img src="https://via.placeholder.com/1200x800" alt="Placeholder">
                        <?php endif; ?>
                    </div>

                    <div class="featured-post-content-am">
                        <div style="margin-bottom: 15px;" onclick="event.stopPropagation();">
                            <span class="badge-am"><?php the_category(', '); ?></span>
                            <small><?php echo get_the_date(); ?></small>
                        </div>
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                        <a href="<?php echo $permalink; ?>" class="read-more-link-am">Read Full Article →</a>
                    </div>
                </article>

                <div class="blog-grid-am">
            <?php
            elseif ($paged > 1 && $count == 0) :
            ?>
                <div class="blog-grid-am">

                <article class="blog-card-am" style="cursor: pointer;" onclick="window.location='<?php echo $permalink; ?>';">
                    <div class="blog-card-image-am">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="blog-card-content-am">
                        <small style="margin-bottom: 10px; display: block;"><?php echo get_the_date(); ?></small>
                        <h3 class="trimmed-title"><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <a href="<?php echo $permalink; ?>" class="read-more-link-am">Read Article →</a>
                    </div>
                </article>

            <?php else : ?>
                <article class="blog-card-am" style="cursor: pointer;" onclick="window.location='<?php echo $permalink; ?>';">
                    <div class="blog-card-image-am">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="blog-card-content-am">
                        <small style="margin-bottom: 10px; display: block;"><?php echo get_the_date(); ?></small>
                        <h3 class="trimmed-title"><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <a href="<?php echo $permalink; ?>" class="read-more-link-am">Read Article →</a>
                    </div>
                </article>
            <?php
            endif;

            $count++;
        endwhile;

        echo '</div>'; // close .blog-grid-am

        $total_posts = (int) wp_count_posts('post')->publish;
        $total_pages = max(1, (int) ceil(max(0, $total_posts - 1) / 9));

        echo '<div class="pagination-am" style="margin: 50px 0px 80px 0px; text-align: center;">';
        echo paginate_links(array(
            'base'      => $blog_page_url . '%_%',
            'format'    => 'page/%#%/',
            'total'     => $total_pages,
            'current'   => $paged,
            'prev_text' => '<iconify-icon icon="lucide:chevron-left" style="font-size:16px"></iconify-icon>',
            'next_text' => '<iconify-icon icon="lucide:chevron-right" style="font-size:16px"></iconify-icon>',
            'type'      => 'list'
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
