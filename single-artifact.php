<?php get_header(); ?>

	<div id="content" class="clearfix">

		<div id="main" class="clearfix" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php

                    //Get Artifact metadata
                    $artifact_metadata_array = get_post_custom($post->ID);

                ?>

    			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/CreativeWork">

                    <h1 class="single-title" itemprop="name"><?php the_title(); ?></h1>

                    <section class="post_content" itemprop="about">
    					<?php the_content(); ?>

                        <footer>

                            <?php the_tags('<p class="tags" itemprop="keywords"><span class="tags-title">Tags:</span> ', ' ', '</p>'); ?>

                        </footer> <!-- end article footer -->

                    </section>

                    <aside class="metadata">
                        <?php the_post_thumbnail( 'artifact-archive-thumb', array('itemprop' => 'image' ) ); ?>

                        <?php print_all_artifact_metadata($artifact_metadata_array); ?>

                    </aside>

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

        <?php get_sidebar('artifact-sidebar'); ?>

	</div> <!-- end #content -->

<?php get_footer(); ?>