<?php
/**
 * Infinity Theme: author template
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
			do_action( 'open_author' );
		?>		
		<div class="page" id="blog-author">
			<?php
				if ( current_theme_supports( 'infinity-introduction-boxes' ) ) :
				infinity_get_template_part( 'templates/parts/introduction-boxes' );
				endif;
				infinity_get_template_part( 'templates/loops/loop', 'author' );
			?>		
		</div>
		<?php
			do_action( 'close_author' );
			do_action( 'close_content' );
		?>
	</div>
<?php
	infinity_get_sidebar();
	infinity_get_footer();
?>
