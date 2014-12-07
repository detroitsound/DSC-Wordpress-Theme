        			<footer role="contentinfo" id="bottom-footer">

                        <a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>">
            			    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" />
            		    </a>

        				<nav class="main">
        					<?php bones_footer_links(); ?>
        				</nav>

                        <?php get_sidebar('footer-sidebar'); ?>

        			</footer> <!-- end footer -->
                </div>
            </section>
        </div>

		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->

		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>