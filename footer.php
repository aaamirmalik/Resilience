<?php

// include file 
include get_template_directory() . '/inc/footer.php';
?>
</div><!-- .export-wrapper-am -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>


<script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>

<script>
(function() {
    // Mobile menu toggle
    const hamburger = document.querySelector('.nav-hamburger-am');
    const mobileMenu = document.getElementById('mobile-menu-am');
    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.toggle('is-open-am');
            hamburger.setAttribute('aria-expanded', isOpen);
            mobileMenu.setAttribute('aria-hidden', !isOpen);
        });
    }
})();
</script>
<?php wp_footer(); ?>
</body>
</html>

