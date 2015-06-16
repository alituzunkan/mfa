<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */
?>

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
    	<li class="active"><a href="#cons" data-toggle="tab"><?php echo (__('Temsilcilik', 'foreignaffairs')) ?></a></li>
        <li><a href="#mfa" data-toggle="tab"><?php echo (__('Bakanlık', 'foreignaffairs')) ?></a></li>
        <?php /*<li><a href="#mfa" data-toggle="tab"><?php echo (__('Follow the Minister', 'foreignaffairs')) ?></a></li> */?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="cons">
            <?php dynamic_sidebar("twitter-1"); ?>
        </div>
        <div class="tab-pane" id="mfa">
            <?php dynamic_sidebar("twitter-2"); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="clearfix"></div>


<aside id="category-posts-3" class="widget cat-post-widget">
	<h1 class="widget-title">Güncel Haberler</h1>
	<ul>
	<?php 
		$xml=simplexml_load_file("http://mfa.gov.ct.tr/tr/enf-feed-tr/") or die("Error: Cannot create object");
			$items = $xml->channel->items;
				foreach ($items->item as $item) {
		?>
		
		<li class="cat-post-item">
			<a class="post-title" href="<?php echo $item->permalink ?>" rel="bookmark" title="<?php echo $item->title ?>"><?php echo $item->title ?></a>
		</li>
		<?php } ?>
	</ul>
</aside>
		





<div class="clearfix"></div>
<?php if ( is_active_sidebar( 'sidebar-bottom' ) ) {
    dynamic_sidebar( 'sidebar-bottom' );
}?>