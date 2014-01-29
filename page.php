<?php get_header(); ?>

<div id="pageContent">

	<?php while ( have_posts() ) : the_post(); ?>

        <?php if (has_post_thumbnail()) : ?>
            <?php
                $splash_src = wp_get_attachment_image_src( get_post_thumbnail_id(), $size='wpf-home-featured' );
            ?>
            <header class="header-image" style="background-image: url('<?php echo $splash_src[0] ?>');";
        <?php endif; ?>
        <header class="no-header-image">
            <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
        </header>

        <div id="pageMain" class="clearfix" role="main">

            <article id="post-<?php the_ID(); ?>" <?php post_class('eight columns'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<section class="post_content clearfix" itemprop="articleBody">
					<?php the_content(); ?>

				</section> <!-- end article section -->

				<footer>

					<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

				</footer> <!-- end article footer -->

            <?php comments_template(); ?>

            </article> <!-- end article -->

            <?php get_sidebar(); // sidebar 1 ?>

        </div> <!-- end #main -->



    <?php endwhile; ?>



</div> <!-- end #content -->

<?php get_footer(); ?>