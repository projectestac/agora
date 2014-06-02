 <?php $options = get_option('exray_custom_settings'); ?>

 <div class="span6 clearfix" id="header-widget-container">
	
	<?php if(is_active_sidebar('header-widget') || !$options['display_top_ad'] || $options['top_ad'] == '' ) : ?>
	
		<?php dynamic_sidebar( 'header-widget' );  else: ?>

	 	<aside id="header-widget" class="right-header-widget fr" role="complementary">

	        <figure class="banner">
	            <a href="<?php echo esc_url( $options['top_ad_link'] ); ?>"><img src="<?php echo esc_url( $options['top_ad'] ); ?>" class="centered" alt="Ad"></a>
	        </figure>

	   	</aside>        
	    <!-- End Header Widget   -->

	<?php endif ?>

</div>