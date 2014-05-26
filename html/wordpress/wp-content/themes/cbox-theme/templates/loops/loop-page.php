<?php
/**
 * Infinity Theme: loop page template
 *
 * The loop that displays a page
 * 
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

	if ( have_posts() ):
		while ( have_posts() ):
			the_post();
			do_action( 'open_loop' );
?>
	<article id="page" class="page-<?php the_ID(); ?> post" <?php post_class(); ?>>
		<header>
		<h1 class="page-title">
			<?php
				the_title();
				edit_post_link(' ✍','',' ');
			?>
		</h1>
		</header>
		<?php
				do_action( 'open_loop_page' );
		?>
		<!-- show page thumb -->
		<?php
		infinity_get_template_part( 'templates/parts/post-thumbnail');	
		?>	
			<div class="entry">
				<?php
					the_content( __( '<p class="serif">Read the rest of this page &rarr;</p>', infinity_text_domain ) );
				?>
			<div style="clear: both;"></div>
				<?php
				wp_link_pages( array( 'before' => __( '<p><strong>Pages:</strong> ', infinity_text_domain ), 'after' => '</p>', 'next_or_number' => 'number'));
				edit_post_link( __( 'Edit this entry.', infinity_text_domain ), '<p>', '</p>');
				?>
			</div>
			<?php
				do_action( 'close_loop_page' );
			?>
<?php
		do_action( 'close_loop' );
		endwhile;
	endif;
?>
	</article>
