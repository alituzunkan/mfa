<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */

get_header(); ?>

<div id="primary" class="content-area-detail homepage-content">
        <div id="content" class="content-detail" role="main">
            <div class="content-body">
                <div class="content posts col-md-8">
                
				<h1 class="entry-title"><?php printf( single_cat_title( '', false ) ); ?></h1>
                	
                	
                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the post format-specific template for the content. If you want to
                         * use this in a child theme, then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'content', 'home' );

                        // Previous/next post navigation.
                        //twentyfourteen_post_nav();

                        // If comments are open or we have at least one comment, load up the comment template.
                        /*if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }*/
                    endwhile;
					
					twentyfourteen_paging_nav(); 
                    ?>
                </div>
                <div class="col-md-4 sidebar-widgets">
                    <div class="sidebartop-widgets">
                        <?php if ( is_active_sidebar( 'sidebar-top' ) ) {
                            dynamic_sidebar( 'sidebar-top' );
                        }?>
                    </div>
                    <div class="clearfix"></div>
                    <?php if ( is_active_sidebar("twitter-1") || is_active_sidebar("twitter-2") ): ?>
                        <div class="twitter-widget">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#mfa" data-toggle="tab"><?php echo (__('Follow MFA', 'foreignaffairs')) ?></a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="minister">
                                    <?php dynamic_sidebar("twitter-1"); ?>
                                </div>
                                <div class="tab-pane" id="mfa">
                                    <?php dynamic_sidebar("twitter-2"); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <?php if ( is_active_sidebar( 'sidebar-content' ) ) {
                        dynamic_sidebar( 'sidebar-content' );
                    }?>
                    <?php if ( is_active_sidebar( 'sidebar-bottom' ) ) {
                        dynamic_sidebar( 'sidebar-bottom' );
                    }?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php
get_footer();	

