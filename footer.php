<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */
?>
        </div><!-- #main -->
    </div>

		<footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container">
			    <div class="footer-widgets footer-sidebar widget-area">
                    <div class="col-md-5">
                        <?php if ( is_active_sidebar( 'sidebar-3' ) ) {
                            dynamic_sidebar( 'sidebar-3' );
                        }?>
                    </div>
                    <div class="col-md-2">
                        <?php if ( is_active_sidebar( 'footer-1' ) ) {
                            dynamic_sidebar( 'footer-1' );
                        }?>
                    </div>
                    <div class="col-md-1">
                        <?php if ( is_active_sidebar( 'footer-2' ) ) {
                            dynamic_sidebar( 'footer-2' );
                        }?>
                    </div>
                    <div class="col-md-3">
                        <?php if ( is_active_sidebar( 'footer-3' ) ) {
                            dynamic_sidebar( 'footer-3' );
                        }?>
                    </div>
                    <div class="col-md-3 last">
                        <?php if ( is_active_sidebar( 'footer-4' ) ) {
                            dynamic_sidebar( 'footer-4' );
                        }?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

			<div class="site-info">
                <div class="container">
                    <div class="pull-left">
                        © 2011, Turkish Republic of Northern Cyprus, Ministry of Foreign Affairs
                    </div>
                    <div class="siteby">
                        <a href="http://www.innoviadigital.com" target="_blank" title="Site by Innovia">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sitebyinnovia.png" alt="Site by Innovia"/>
                        </a>
                    </div>
                </div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/hoverIntent.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/superfish.min.js"></script>
    <script type="text/javascript">
        (function($){ //create closure so we can safely use $ as alias for jQuery
            $(document).ready(function(){
                $('.menu-item-has-children').superfish({});
            });
        })(jQuery);
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-8822873-43', 'gov.ct.tr');
  ga('send', 'pageview');

</script>
</body>
</html>