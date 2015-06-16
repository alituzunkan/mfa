<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" class="homepage-content">
	<div class="row">
    <div class="pull-left thumb col-md-6">
        <?php 
        $categories = get_the_category();        
        if ( has_post_thumbnail() ) {
        	 twentyfourteen_post_thumbnail(); 
        	}
			else{
				/*if($categories[0]->term_id==27||$categories[0]->term_id==14){*/
					echo ('<img src="'.get_template_directory_uri().'/images/placeholder_logo.jpg" width="340" height="180" alt="MFA Placeholder"/>');
				/*}
				else{
					echo ('<img src="'.get_template_directory_uri().'/images/placeholder_ministry.jpg" width="340" height="180" alt="MFA Placeholder"/>');
				}*/
			}
        	?>
		
    </div>
    <div class="col-md-6">
        <?php

        if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>'); else :
            the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>');
        endif;
        ?>

        <div class="pull-left date"><?php twentyfourteen_posted_on(); ?>&nbsp;-&nbsp;</div>

        <div class="entry-content">
            <?php
            the_excerpt();
            //the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'foreignaffairs'));
            wp_link_pages(array(
                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'foreignaffairs') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
            ));
            ?>
            
            
            
            
        </div>
    </div>
    <div class="clearfix"></div>
    </div>
</article>


