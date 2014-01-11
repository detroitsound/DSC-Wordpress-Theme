<?php get_header(); ?>

			<div id="content" class="clearfix">

				<div id="main" class="eight columns clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/CreativeWork">

						<header>

							<?php the_post_thumbnail( 'wpbs-featured', array('itemprop' => 'image' ) ); ?>

							<h1 class="single-title" itemprop="name"><?php the_title(); ?></h1>

							<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>

						</header> <!-- end article header -->

						<section class="post_content clearfix" itemprop="about">
							<?php the_content(); ?>


						</section> <!-- end article section -->

                        <section class="meta">
                            <ul class="metadata">
                                <li>
                                    <?php
                                        $artifact_metadata_array = get_post_custom($post->ID);
                                        print_artifact_metadata('date', $artifact_metadata_array);
                                    ?>
                                </li>
                            </ul>
                        </section>

						<footer>

							<?php the_tags('<p class="tags" itemprop="keywords"><span class="tags-title">Tags:</span> ', ' ', '</p>'); ?>

						</footer> <!-- end article footer -->

					</article> <!-- end article -->

					<?php comments_template(); ?>

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

				</div> <!-- end #main -->

				<?php get_sidebar(); // sidebar 1 ?>

			</div> <!-- end #content -->

<?php get_footer(); ?>