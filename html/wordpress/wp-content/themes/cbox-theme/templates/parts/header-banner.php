<?php 
/**
 * Infinity Theme: Header Content
 *
 * This template contains the Header Content. Fork this in your Child THeme
 * if you want to change the markup but don't want to mess around doctypes/meta etc!
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */
?>
<div class="top-wrap row <?php do_action( 'top_wrap_class' ); ?>">
	<?php
		// Load Top Menu only if it's enabled
		if ( current_theme_supports( 'infinity-top-menu-setup' ) ) :
		infinity_get_template_part( 'templates/parts/top-menu', 'header' );
		endif;
	?>
	<!-- header -->
	<header id="header" role="banner">
		<div id="logo-menu-wrap">
			<?php
				do_action( 'open_header' );
				if ( !infinity_feature( 'infinity-header-logo' ) ):
			?>
			<?php
				$heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div';
			?>
			<<?php echo $heading_tag; ?> id="site-title">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>
				<span id="site-description"><?php bloginfo('description'); ?></span>
			</<?php echo $heading_tag; ?>>
			<?php
				endif;
				// Load Main Menu only if it's enabled
				if ( current_theme_supports( 'infinity-main-menu-setup' ) ) :
				infinity_get_template_part( 'templates/parts/main-menu', 'header' );
				endif;
				do_action( 'close_header' );
			?>
		</div>
	</header><!-- end header -->
	<?php
		// Load Sub Menu only if it's enabled
		if ( current_theme_supports( 'infinity-sub-menu-setup' ) ) :
			infinity_get_template_part( 'templates/parts/sub-menu', 'header' );
		endif;
	?>
</div><!-- end top wrap -->
