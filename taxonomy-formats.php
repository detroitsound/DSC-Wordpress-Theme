<?php get_header(); ?>

<div id="content" class="clearfix post-type-archive-artifact">

    <div id="main" class="clearfix" role="main">

         <h1><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h1>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

            <aside>
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail( 'artifact-archive-thumb' ); ?>
                </a>
            </aside>

            <section class="post_content">

                <header>

                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                    <p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?></p>

                </header> <!-- end article header -->

                <?php the_excerpt(); ?>

            </section> <!-- end article section -->

        </article> <!-- end article -->

        <?php endwhile; ?>

        <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>

            <?php page_navi(); // use the page navi function ?>

        <?php } else { // if it is disabled, display regular wp prev & next links ?>
            <nav class="wp-prev-next">
                <ul class="clearfix">
                    <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
                    <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
                </ul>
            </nav>
        <?php } ?>


        <?php else : ?>

        <article id="post-not-found">
            <header>
                <h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
            </header>
            <section class="post_content">
                <p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
            </section>
            <footer>
            </footer>
        </article>

        <?php endif; ?>

    </div> <!-- end #main -->

    <?php get_sidebar('artifact-sidebar'); ?>

</div> <!-- end #content -->

<?php get_footer(); ?>