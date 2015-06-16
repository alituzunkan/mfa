<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
            <?php
            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
            endif;
            ?>
            <div class="pull-left">
                <?php
                if ( 'post' == get_post_type() )
                    twentyfourteen_posted_on();
                ?>
            </div>
            <div class="clearfix"></div>
            <?php twentyfourteen_post_thumbnail(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'foreignaffairs' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'foreignaffairs' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	<div class="clearfix"></div>
	</div><!-- .entry-content -->
	 <div class="pull-right social-share">
        <?php if ( is_active_sidebar( 'social-links' ) ) {
            dynamic_sidebar( 'social-links' );
        }?>
     </div>
     <div class="clearfix"></div>
	<?php endif; ?>
</article><!-- #post-## -->
