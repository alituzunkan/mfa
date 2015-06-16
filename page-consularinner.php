<?php
/*
Template Name: Consular Inner Page
*/

get_header("consular"); 

 while ( have_posts() ) : the_post();

$postid= get_the_ID();

$parentID = wp_get_post_parent_id( $postid );

$main_image = get_field("main_image",$parentID);

?>


<div class="consular_page">
<div class="entry-content">	
	<div class="consular_banner">
		<?php echo wp_get_attachment_image( $main_image, "full"); ?>
		<div class="consular_title">
			<h1><?php echo get_the_title( $parentID ) ?></h1>
		</div>
		
	</div>

<div class="consular_container">
		<div class="consular_content_item single_item" id="home">
		<h2><?php the_title() ?></h2>
		<?php the_content();?>
	</div>
</div>

	</div>

</div>

<?php

endwhile;
get_footer();

?>