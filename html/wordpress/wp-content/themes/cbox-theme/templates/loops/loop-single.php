<?php
/**
 * Infinity Theme: loop single template
 *
 * The loop that displays single posts
 * 
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

	if ( have_posts()):
		while ( have_posts() ):
			the_post();
			do_action( 'open_loop' );
?>
			<!-- the post -->
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="post-content">
					<?php
						infinity_get_template_part( 'templates/parts/post-avatar');	
					?>			
					<h1 class="post-title">
						<?php the_title(); ?>
						<?php edit_post_link(' ✍','',' ');?>
					</h1>	
					<?php
					do_action( 'open_loop_single' );
					?>			
					<!-- show the post thumb? -->
					<?php
					infinity_get_template_part( 'templates/parts/post-thumbnail');	
					?>	
					<?php
					infinity_get_template_part( 'templates/parts/post-meta-top');	
					?>							
					<?php
						do_action( 'before_single_entry' )
					?>
					<div class="entry">
						<?php
							do_action( 'open_single_entry' );
							the_content( __( 'Read the rest of this entry &rarr;', infinity_text_domain ) ); 
					   	?>
						<div style="clear: both;"></div>
						<?php
							wp_link_pages( array(
								'before' => __( '<p><strong>Pages:</strong> ', infinity_text_domain ),
								'after' => '</p>', 'next_or_number' => 'number')
							);
							do_action( 'close_single_entry' );
						?>
					</div>
					<?php 
						do_action('after_single_entry');
					?>
					<?php
						infinity_get_template_part('templates/parts/post-meta-bottom'); 
						infinity_get_template_part( 'templates/parts/author-box');	
					?>
				</div>
				<?php
					do_action( 'close_loop_single' );
				?>
			</div>
<?php
			comments_template('', true);
			do_action( 'close_loop' );
		endwhile;
	else: ?>
		<h1>
			<?php _e( 'Sorry, no posts matched your criteria.', infinity_text_domain ) ?>
		</h1>
<?php
		do_action( 'loop_not_found' );
	endif;
?>