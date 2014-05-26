<?php
/**
 * Infinity Theme: sidebar template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

	do_action( 'before_sidebar' );
?>

<aside id="sidebar" role="complementary" class="<?php do_action( 'sidebar_class' ); ?>">
	<!-- sidebar -->
		<?php
			do_action( 'open_sidebar' );?>
			
		<?php	
			// Load Sidebars
			infinity_base_sidebars();
			do_action( 'close_sidebar' );
		?>
	
	<?php
		do_action( 'after_sidebar' );
	?>
</aside>
