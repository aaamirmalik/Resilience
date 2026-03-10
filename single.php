<?php
get_header();

$page_for_posts_id = (int) get_option('page_for_posts');
$blog_page_url = $page_for_posts_id ? get_permalink($page_for_posts_id) : home_url('/blog/');
?>

<div class="page-container-am single-page-am">
    <main class="single-main-am">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
            $author_id = (int) get_the_author_meta('ID');
            $author_bio = get_the_author_meta('description', $author_id);
            $reading_time = max(1, (int) ceil(str_word_count(wp_strip_all_tags(get_the_content())) / 200));
            $categories = get_the_category();
            $category_ids = !empty($categories) ? wp_list_pluck($categories, 'term_id') : [];

            $related_args = [
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => 3,
                'post__not_in'        => [get_the_ID()],
                'ignore_sticky_posts' => true,
            ];

            if (!empty($category_ids)) {
                $related_args['category__in'] = $category_ids;
            }

            $related_query = new WP_Query($related_args);
        ?>

        <article <?php post_class('single-article-am'); ?>>
            <div class="container-am single-container-am">
                <nav class="single-breadcrumb-am" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span>/</span>
                    <a href="<?php echo esc_url($blog_page_url); ?>">Blog</a>
                    <span>/</span>
                    <span class="single-breadcrumb-current-am"><?php the_title(); ?></span>
                </nav>

                <header class="single-hero-am">
                    <?php if (!empty($categories)) : ?>
                    <div class="single-tags-am">
                        <?php foreach ($categories as $category) : ?>
                        <a class="badge-am single-tag-am"
                            href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                            <?php echo esc_html($category->name); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <h1 class="single-title-am"><?php the_title(); ?></h1>

                    <div class="single-meta-am">
                        <div class="single-meta-avatar-am">
                            <?php echo get_avatar($author_id, 96, '', esc_attr(get_the_author())); ?>
                        </div>
                        <div class="single-meta-info-am">
                            <strong><?php the_author(); ?></strong>
                            <span>
                                <?php echo esc_html(get_the_date('M j, Y')); ?> •
                                <?php echo esc_html($reading_time); ?> min read
                            </span>
                        </div>
                    </div>
                </header>
            </div>

            <?php if (has_post_thumbnail()) : ?>
            <div class="container-am single-featured-wrap-am">
                <figure class="single-featured-image-am">
                    <?php the_post_thumbnail('large', ['alt' => esc_attr(get_the_title())]); ?>
                </figure>
            </div>
            <?php endif; ?>

            <div class="container-am single-content-wrap-am">
                <div class="single-content-am">
                    <?php the_content(); ?>
                </div>
            </div>

            <!-- <div class="container-am">
                <section class="single-author-box-am">
                    <div class="single-author-avatar-am">
                        <?php echo get_avatar($author_id, 160, '', esc_attr(get_the_author())); ?>
                    </div>
                    <div class="single-author-info-am">
                        <h3><?php the_author(); ?></h3>
                        <span><?php echo esc_html(get_the_author_meta('user_nicename', $author_id)); ?></span>
                        <?php if (!empty($author_bio)) : ?>
                        <p><?php echo esc_html($author_bio); ?></p>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="btn-am btn-outline-am">
                            View More Posts
                        </a>
                    </div>
                </section>
            </div> -->
        </article>

        <section class="single-related-am">
            <div class="container-am">
                <div class="single-related-header-am">
                    <h2>More from our blog</h2>
                    <a href="<?php echo esc_url($blog_page_url); ?>" class="btn-am btn-outline-am">View All Articles</a>
                </div>

                <?php if ($related_query->have_posts()) : ?>
                <div class="blog-grid-am">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <article <?php post_class('blog-card-am'); ?>>
                        <div class="blog-card-image-am">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['alt' => esc_attr(get_the_title())]); ?>
                            <?php endif; ?>
                        </div>
                        <div class="blog-card-content-am">
                            <small class="single-related-date-am"><?php echo esc_html(get_the_date('M j, Y')); ?></small>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more-link-am">Read Article →</a>
                        </div>
                    </article>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <?php wp_reset_postdata(); ?>
        <?php endwhile; else : ?>
        <div class="container-am">
            <p class="single-empty-am">This post could not be found.</p>
        </div>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
