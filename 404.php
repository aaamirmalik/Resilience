<?php
/**
 * The Template for displaying Page Not Found (404 error)
 */
get_header();
?>

<div id="page-not-found-am" class="page-not-found-am not-found-am">
    <div id="not-found-am" class="site-not-found-am max-width-container">

            <h1 class="page-title"><?php _e('404'); ?></h1>
            <p><?php _e('Not Found, Try to Search?'); ?>
            </p>
            <!-- serach form -->
             <?php get_search_form(); ?>

    </div><!-- #not-found-am -->
</div><!-- #page-not-found-am -->

<?php
// Include footer
get_footer();
?>
