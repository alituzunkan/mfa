<?php 

function innovia_representative_function($atts,$content=null) {
	extract(shortcode_atts(array('image' => '', 'city' => '', 'title' =>'','name' => ''), $atts));
	
	$content=do_shortcode($content);
	$output = '<div class="representative_container"><div class="gradient"></div><img src="'.$image.'" /><div class="content_container"><div class="city_title_container"><div class="title"></div><div class="city">'.$city.'</div></div><div class="contact_info"><div class="representative">'.$name.'<span class="pull-right">'.$title.'</span></div>'.$content.'</div></div></div>'; 
	
	return $output;
}

add_shortcode('representative', 'innovia_representative_function');


function gmap_handler($atts) {

	extract(shortcode_atts(array('lat' => '35.1951160', 'long' => '33.3497555',), $atts));
	return '<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script><script>
function initialize() {
  var myLatlng = new google.maps.LatLng('.$lat.','.$long.');
  var mapOptions = {
    zoom: 17,
    center: myLatlng,
	panControl: false,
	scaleControl: true,
	scrollwheel: false,
	streetViewControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById("mfa_map"), mapOptions);
  
   var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      });
}

google.maps.event.addDomListener(window, "load", initialize);

    </script>
		 <div class="res-map-player-cont">
				<div id="mfa_map" class="res-map-player"></div>
			</div>';
}

add_shortcode('gmap_placemark', 'gmap_handler');


function innovia_minister($atts,$content=null) {
	extract(shortcode_atts(array('image' => '', 'name' => '', 'date' =>'',), $atts));
	
	$content=do_shortcode($content);
	$output = '<div class="more_content_container row"><div class="col-md-3 more_content_image"><img src="'.$image.'" /></div><div class="col-md-9 more_content_text"><div class="more_content_date">'.$date.'</div><div class="more_content_name">'.$name.'</div><div class="more_content_content">'.$content.'<div class="more_content_bottom_gradient"></div></div><div class="more_content_button"><a href="#" data1="'.__('Less', 'foreignaffairs').'" data2="'.__('More', 'foreignaffairs').'" class="btn">'.__('More', 'foreignaffairs').'</a></div></div></div>'; 
	
	return $output;
}

add_shortcode('minister', 'innovia_minister');


function selected_post_loop($atts) {

	extract(shortcode_atts(array('type' => 'post', 'count' => '3','category'=>'',), $atts));

	$aType = explode(",",$type);

	$args = array(
				'post_type' => $aType,
				'posts_per_page'=>$count,);

	if($category)
	{
	$args = $args + array(
	'category_name' => $category,);
	}
	$post_query = new WP_Query( $args );
	$output='<div class="row post-loop homepage-content ">';
	while ( $post_query->have_posts() ) : $post_query->the_post();
		$postid = get_the_id();

	$output.='<div class="post-loop-column col-md-12">
	<article>
		<div class="date_container">'.get_the_date('j M Y').'</div>
		<a href="'.get_permalink().'"><h3 class="post_title">'.get_the_title().'</h3></a>
		<p><a href="'.get_permalink().'">'.trimmer(get_the_content(),200).'</a></p>
	</article></div>';
	endwhile;
	$output.='<div class="clearfix"></div></div>';
	wp_reset_postdata();
	return $output;
}

add_shortcode('selected_post', 'selected_post_loop');

?>