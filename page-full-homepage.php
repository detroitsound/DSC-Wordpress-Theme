<?php
/*
Template Name: Fullscreen Homepage
*/
?>

<?php get_header(); ?>

	<div id="content" class="clearfix">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<section class="post_content clearfix" itemprop="articleBody">
					<?php the_content(); ?>

				</section> <!-- end article section -->

                <aside class="sidebar">
                    <?php get_sidebar('sidebar2'); // sidebar 2 ?>
                </aside>

			</article> <!-- end article -->


			<?php endwhile; ?>

		<?php else : ?>

			<article id="post-not-found">
			    <header>
			    	<h1>Not Found</h1>
			    </header>
			    <section class="post_content">
			    	<p>Sorry, but the requested resource was not found on this site.</p>
			    </section>
			    <footer>
			    </footer>
			</article>

		<?php endif; ?>


	</div> <!-- end #content -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/fullscreen-homepage.css" />
<?php get_footer(); ?>