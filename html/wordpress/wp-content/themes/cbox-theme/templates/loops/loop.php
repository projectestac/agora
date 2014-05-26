<?php
/**
 * Infinity Theme: loop template
 *
 * The loop that displays posts
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
	<div class="post-content">
		<!-- post -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				do_action( 'open_loop_post' );
			?>
				<header>
				<h2 class="post-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', infinity_text_domain ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<?php edit_post_link(' ✍','',' ');?>
				</h2>
				</header>
				<?php
					do_action( 'open_loop_post_content' );
				?>
				<?php
				infinity_get_template_part( 'templates/parts/post-meta-top');	
				?>				
				<?php
				do_action( 'before_post_thumb' );
				?>
				<!-- show the avatar? -->
				<div class="entry">
				<?php
					infinity_get_template_part( 'templates/parts/post-thumbnail');	
				?>	
					<?php
						do_action( 'before_loop_content' );
						if ( is_search() || is_category() || is_tag() || is_archive()  ) : // Display excerpts for archives and search results
						the_excerpt();
						else : 
						the_content( __( 'Read More', infinity_text_domain ) );
						endif;
						do_action( 'after_loop_content' );
					?>
				</div>
				<?php
					do_action( 'close_loop_post_content' );
				?>
				<?php
					infinity_get_template_part( 'templates/parts/post-meta-bottom');	
				?>
			<?php
				do_action( 'close_loop_post' );
			?>
		</article><!-- post -->
	</div><!-- post-content -->
	<?php
		do_action( 'close_loop' );
	endwhile;
   		infinity_base_paginate();
	else:
?>
		<h2 class="center">
			<?php _e( 'Not Found', infinity_text_domain ) ?>
		</h2>
<?php
		infinity_get_search_form();
		do_action( 'loop_not_found' );
	endif;
?>
