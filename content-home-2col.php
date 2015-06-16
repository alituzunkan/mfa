<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" class="homepage-content col2posts">

    <div class="col2post">
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

</article>


