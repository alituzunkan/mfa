<?php
/*
Template Name: Feed Template
*/
?>
 <rss version="2.0">
    <channel>
        <title>BRT NEWS RSS</title>
        <description>BRT HABER</description>
        <link><?php echo get_site_url(); ?></link>
        <lastBuildDate><?php echo get_the_time(); ?></lastBuildDate>
		<generator>LatisFeedCreator 1.0</generator>

<?php
$args = array(
'posts_per_page'=>'5',
);
$gh_query = new WP_Query( $args );
while ( $gh_query->have_posts() ) : $gh_query->the_post();
$postid = get_the_id();
$category = get_the_category(); 
if(has_post_thumbnail( $postid )){
$thumb_id = get_post_thumbnail_id($postid);
$thumb_url_array = wp_get_attachment_image_src($thumb_id,'foreignaffairs-full-width', true);
$thumb_url=$thumb_url_array[0];
}
else{
$thumb_url= get_template_directory_uri().'/images/placeholder_logo.jpg';
}
?>
        <item>
            <title><![CDATA[<?php the_title(); ?>]]></title>
            <summary>get_the_excerpt()</summary>
            <description><![CDATA[<?php the_content(); ?>]]></description>
            <link><?php the_permalink(); ?></link>
            <pubDate><![CDATA[<?php echo (get_the_date('d F Y'));?>]]></pubDate>
            <photos><![CDATA[<?php echo($thumb_url); ?>]]></photos>
            <guid><![CDATA[<?php echo ($postid) ?>]]></guid>
        </item>
<?php
endwhile;
wp_reset_postdata();
?>	
		
    </channel>
</rss>