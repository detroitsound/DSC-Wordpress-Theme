<aside class="footer-sidebar" class="sidebar" role="complementary">
    <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>

        <?php dynamic_sidebar( 'footer-sidebar' ); ?>

    <?php else : ?>

        <!-- This content shows up if there are no widgets defined in the backend. -->

        <p>Please activate some Widgets.</p>

    <?php endif; ?>

</aside>