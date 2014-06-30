<?php  $default_options = array( 'display_logo' => true, 'exray_theme_logo' => THEME_IMAGES.'/logo.png' , 'display_top_ad' => '0', 'top_ad' => 'http://lorempixel.com/468/60', 'top_ad_link' => home_url(), 'top_menu_color' => '#f5f5f5', 'link_color' => '#0d72c7', 'header_color' => '#ffffff', 'main_menu_color' => '#f5f5f5', 'bg_color' => '#ffffff', 'footer_color' => '#f7f7f7', 'copyright_container_color' => '#ededed', );?>
<?php $options = get_option('exray_custom_settings', $default_options); ?>

 <div class="span6 clearfix" id="header-widget-container">
	
	<?php if(is_active_sidebar('header-widget') ) : ?>
	
		<?php dynamic_sidebar( 'header-widget' );  elseif ($options['display_top_ad'] !== false ): ?>

	 	<aside id="header-widget" class="right-header-widget fr" role="complementary">

	        <figure class="banner">
	            <a href="<?php echo esc_url( $options['top_ad_link'] ); ?>"><img src="<?php echo esc_url( $options['top_ad'] ); ?>" class="centered" alt="Ad"></a>
	        </figure>

	   	</aside>        
	    <!-- End Header Widget   -->

	<?php endif ?>

</div>