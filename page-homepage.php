<?php
/*
Template Name: Homepage

Make sure to have a custom field titled 'background-image'

*/
?>

<?php get_header(); ?>

    <div id="homepageContent">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> style="background-image: url('<?php echo $image[0]; ?>');">
            <?php else: ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix no-image'); ?>>
            <?php endif; ?>
                <section class="post_content" itemprop="articleBody">
                    <div class="align-content">
                        <?php the_content(); ?>
                    </div>
                </section>

            </article>


            <?php endwhile; ?>

        <?php endif; ?>

        <aside id="sidebar">
            <?php get_sidebar('sidebar2'); // sidebar 2 ?>
        </aside>

    </div>

    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/homepage.css" />
<?php get_footer(); ?>