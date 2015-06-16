<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */

get_header(); ?>

<div id="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="homepage">
		<div id="content" role="main">
            <div class="slider">
            	<?php if(wpmd_is_notdevice()) {
            		if ( dynamic_sidebar('Slider') ) : else : endif;
            	}
				else{?>
					<div id="homecarousel" class="owl-carousel">
						<?php 
						$homeposts= new WP_Query(array(
						'posts_per_page' => '5',
						'cat' => '20, 24',
						)); 
						while($homeposts->have_posts()) : $homeposts->the_post();
						$postid = get_the_ID();
						?>	
						<div>
							<div class="imageowlc"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
							<div class="titleowlc"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
						</div>
						<?php
						endwhile; 
						wp_reset_postdata();
						?>
			</div>	
				<?php }
            	?>
            </div>
            <div class="widgets">
                <div class="col-md-4">
                    <?php if ( dynamic_sidebar('Home Box 1') ) : else : endif; ?>
                </div>
                <div class="col-md-4">
                    <?php if ( dynamic_sidebar('Home Box 2') ) : else : endif; ?>
                </div>
                <div class="col-md-4">
                    <?php if ( dynamic_sidebar('Home Box 3') ) : else : endif; ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="content-body">
                <div class="content posts col-md-8">
                	

                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();

                        // Include the page content template.
                        get_template_part( 'content', 'custom' );
                    endwhile;
                    ?>
                    <?php if ( dynamic_sidebar('Content Bottom Widgets') ) : else : endif; ?>
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
                            <li class="active"><a href="#minister" data-toggle="tab"><?php echo (__('Follow MFA', 'foreignaffairs')) ?></a></li>
                            <?php /*<li><a href="#mfa" data-toggle="tab"><?php echo (__('Follow the Minister', 'foreignaffairs')) ?></a></li> */?>
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
                    <?php if ( is_active_sidebar( 'sidebar-bottom' ) ) {
                        dynamic_sidebar( 'sidebar-bottom' );
                    }?>
                </div>
            </div>
            <div class="clearfix"></div>
		</div><!-- #content -->
	</div><!-- #primary -->
    <div class="clearfix"></div>
</div><!-- #main-content -->

<?php
get_footer();
