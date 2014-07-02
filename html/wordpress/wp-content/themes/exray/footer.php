<!--Footer-->
<?php global $exray_general_options; ?>

<div id="footer-container">
	<footer class="bottom-footer" role="contentinfo">
		<div class="footer-widget-area">
			<div class="container">
				
				<div class="row">
					
					<?php get_sidebar('first-footer') ?>

					<?php get_sidebar('second-footer') ?>

					<?php get_sidebar('third-footer') ?>

					<?php get_sidebar('fourth-footer') ?>
						
				</div> 
				<!--End row-->
			</div> 
			<!--End Container-->
		</div> 
		<!--End footer-widget-area-->
		<div class="copyright-container clearfix">
			
			<div class="container">
				<?php if($exray_general_options['go_to_top_navigation'] != 'on') : ?>
					<p class="top-link-footer"><a href="#top"><?php _e('Go to top','Exray Framework'); ?> &uarr;</a></p>
				<?php endif; ?>
				
				<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url()); ?>"><?php bloginfo('name') ?></a> - <?php _e('Powered by', 'exray-framework'); ?> <a href="http://www.wordpress.org">WordPress</a> and <a href="http://seotemplates.net/blog/wordpress-theme/exray-wordpress-theme/">Exray Theme</a>. </p>
			
			</div>
			<!--End Container-->
		</div> 
		<!--End copyright-container-->
	
	</footer> 
	<!--End Footer-->
</div> 
<!--End footer-container-->
</div> 
<!--End page wrap-->
<?php wp_footer(); ?>
<!-- Javascript -->
<?php
// XTEC ************ AFEGIT - Added for SQL debug. To use it, uncomment the code and set SAVEQUERIES to true in wp-config.php
// 2014.06.16 @aginard
/*
if ( current_user_can( 'administrator' ) ) {
    global $wpdb;
    echo "<pre>";
    print_r( $wpdb->queries );
    echo "</pre>";
}
*/
//************ FI
?>
</body>
</html>