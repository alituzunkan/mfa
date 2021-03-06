<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area-detail">
		<div id="content" class="content-detail" role="main">
            <div class="content-body">
                <div class="content posts col-md-8 single_item">
                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the post format-specific template for the content. If you want to
                         * use this in a child theme, then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'content' );

                        // Previous/next post navigation.
                        //twentyfourteen_post_nav();

                        // If comments are open or we have at least one comment, load up the comment template.
                        /*if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }*/
                    endwhile;
                    ?>
                </div>
                <div class="col-md-4 sidebar-widgets">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
