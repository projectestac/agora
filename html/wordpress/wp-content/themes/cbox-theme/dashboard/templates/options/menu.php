<?php
/**
 * Infinity Theme: Dashboard options screen, menu template
 *
 * Variables:
 *		$sections	Array of ICE_Section objects registered for options
 *
 * @package Infinity
 * @subpackage dashboard-templates
 */
?>
<div id="menu___root" class="infinity-cpanel-options-menu">
<?php
	// loop through fetched sections and render
	foreach ( $sections as $section ) {
		infinity_options_render_menu_section( $section );
	}
?>
</div>
