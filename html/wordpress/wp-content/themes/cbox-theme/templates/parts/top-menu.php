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

if ( !has_nav_menu( 'over-menu' ) ) {
	return;
}
?>
<div id="top-menu-wrap" role="navigation">
	<nav class="base-menu top-menu">
		<?php
			do_action('open_top_menu');
			infinity_base_nav_menu( 'over-menu' );
			do_action('close_top_menu');
		?>
	</nav>
</div>