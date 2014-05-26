<?php
/**
 * Infinity Theme: top menu template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

if ( !has_nav_menu( 'footer-menu' ) ) {
	return;
}
?>
<nav id="footer-menu" role="navigation">
	<?php
		do_action('open_footer_menu');
		wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );
		do_action('close_footer_menu');
	?>
</nav>	