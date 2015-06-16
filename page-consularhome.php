<?php
/*
Template Name: Home Template
*/

 while ( have_posts() ) : the_post();
 
 get_header();
 
 ?>

<div class="consular_page">
	
	<div class="consular_banner">
		<?php if ( dynamic_sidebar('Slider') ) : else : endif; ?>
		
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

	<div class="consular_container">
		<div class="consular_content_item" id="home">
			<div class="row">
				<div class="col-md-8">
					<div class="row">

						<div class="col-md-12 mfaanouncements">
						<h3><?php echo (__('Temsilcilik Haberleri', 'foreignaffairs')); ?></h3>
							<?php
							$args = array(
								'post_type' 		=> 'post',
								'posts_per_page' 	=> '3',
							);
							$mfa_announcements = new WP_Query( $args );
							if ( $mfa_announcements->have_posts() ) {
								while ( $mfa_announcements->have_posts() ) {
									$mfa_announcements->the_post();?>
									
										<article id="post-<?php the_ID(); ?>" class="homepage-content">
											<div class="row">
												<div class="pull-left thumb col-md-6">
													<?php 
													$categories = get_the_category();        
													if ( has_post_thumbnail() ) {
														 the_post_thumbnail( 'foreignaffairs-full-width' );
													}
													else{
														if($categories[0]->term_id==27||$categories[0]->term_id==14){
															echo ('<img src="'.get_template_directory_uri().'/images/placeholder_logo.jpg" width="340" height="180" alt="MFA Placeholder"/>');
														}
														else{
														echo ('<img src="'.get_template_directory_uri().'/images/placeholder_ministry.jpg" width="340" height="180" alt="MFA Placeholder"/>');
														}
													}
													?>
											 </div>
											 <div class="col-md-6">
												<?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>
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
            
            
            
            
        						</div>
        					</article>
									<?php		 
								}	
									
							}
							wp_reset_postdata(); 
							?>
							
							<p style="text-align: center;"><a class="btn btn-primary" title="<?php _e("All News","foreignaffairs") ?>" href="/tum-haberler/"><?php _e("All News","foreignaffairs") ?></a></p>
							
							
							<div class="col-md-12 mfaanouncements">
						<h3><?php _e("Ministry News","foreignaffairs") ?></h3>
						
						
							<?php
							$xml=simplexml_load_file("http://mfa.gov.ct.tr/tr/feedtr/") or die("Error: Cannot create object");
							$items = $xml->channel->items;
							$counter = 0;
								foreach ($items->item as $item) {
									?>
									<?php
									if($counter == 2){
										break;
									}
									$counter++; ?>
										<article class="homepage-content">
											<div class="row">
												<div class="pull-left thumb col-md-6">
													<?php         
													echo '<img src="'.$item->photos.'" width="340" height="180" alt=""/>';
													?>
											 	</div>
											 <div class="col-md-6">
												<?php echo '<h1 class="entry-title"><a href="'.$item->permalink.'" rel="bookmark">'.$item->title.'</a></h1>'; ?>
												<div class="pull-left date"><?php echo $item->pubDate ?>&nbsp;-&nbsp;</div>

												<div class="entry-content">
													<?php
													echo $item->summary;
													echo '<a href="'.$item->permalink.'" rel="bookmark">[...]</a>';
													?>
												</div>
											</div>
            
            
            
            
        						</div>
        					</article>
									<?php		 
								}	
									
							?>
							
							<p style="text-align: center;"><a class="btn btn-primary" title="<?php _e("All News","foreignaffairs") ?>" href="<?php echo $all_news_button_link ?>"><?php _e("All News","foreignaffairs") ?></a></p>
							
						</div>
							
							
							
							
							
						</div>
					</div>
					</div>
					<div class="col-md-4 sidebar-widgets">
						<?php get_sidebar(); ?>
	                    
	                </div>	
						
						
						
					</div>
				</div>
				

			</div>
			
		</div>


<?php
endwhile;
get_footer(); ?>