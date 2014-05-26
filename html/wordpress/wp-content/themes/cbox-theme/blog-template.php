<?php
/**
 * Template Name: Blog Template
 * Infinity Theme: index template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

	infinity_get_header();
?>
	<div id="content" role="main" class="<?php do_action( 'content_class' ); ?>">
			<?php
			do_action( 'open_content' );
			do_action( 'open_blog' );
		?>
		<div id="home-page" role="main" <?php post_class(); ?>>
			<?php
				infinity_get_template_part( 'templates/parts/introduction-boxes', 'index' );
				infinity_get_template_part( 'templates/loops/loop-blog', 'index' );
			?>
		</div>
		<?php
			do_action( 'close_blog' );
			do_action( 'close_content' );
		?>
	</div>
<?php
	infinity_get_sidebar();
	infinity_get_footer();
?>