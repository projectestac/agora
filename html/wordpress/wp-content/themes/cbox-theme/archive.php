<?php
/**
 * Infinity Theme: archive template
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
			do_action( 'open_archive' );
		?>
		<div class="page" id="blog-archive">
			<header>
			<h1 class="page-title">
				<?php printf( __( 'You are browsing the archive for %1$s.', infinity_text_domain ), wp_title( false, false ) ); ?>
			</h1>
			</header>
			<?php
				infinity_get_template_part( 'templates/loops/loop', 'excerpt' );
			?>
		</div>
		<?php
			do_action( 'close_archive' );
			do_action( 'close_content' );
		?>
	</div>
<?php
	infinity_get_sidebar();
	infinity_get_footer();
?>
