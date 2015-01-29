<?php
/*
Template Name: Thank You Page
*/
?>

<?php get_header(); ?>

            <div id="content" class="clearfix">
                <div class="record-player">
                    <div class="top">
                        <div class="speed-adjust">
                            <div class="circle"></div>
                        </div>
                        <div class="record">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/record.png" alt="Thank You" />
                        </div>
                        <div class="tone-arm">
                            <div class="circle"></div>
                            <div class="arm"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tone-arm.png" alt="Tone-Arm" /></div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <div class="record-button"></div>
                        </div>
                        <div class="right">
                            <div class="record-button"></div>
                            <div class="record-button"></div>
                            <div class="record-button"></div>
                            <div class="record-button"></div>
                        </div>
                    </div>
                </div>
                <section class="post-content">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>
                </section>

            </div> <!-- end #content -->
            <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/thank-you.css" />
<?php get_footer(); ?>