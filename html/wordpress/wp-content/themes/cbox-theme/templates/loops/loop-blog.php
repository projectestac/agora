<?php
/**
 * Infinity Theme: loop blog template
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
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=5'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>
		<!-- post -->
		<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				do_action( 'open_loop_post' );
			?>
			<!-- post-content -->
			<div class="post-content">
				<!-- post title -->
				<h2 class="post-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', infinity_text_domain ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<?php edit_post_link(' ✍','',' ');?>
				</h2>
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
					<div class="post-author-box">
						<?php
							echo get_avatar( get_the_author_meta( 'user_email' ), '100' );
						?>
					</div>
					<?php
						do_action( 'before_loop_content' );
						the_excerpt( __( 'Read More', infinity_text_domain ) );
						do_action( 'after_loop_content' );
					?>
				</div>
				<?php
					infinity_get_template_part( 'templates/parts/post-meta-bottom');	
				?>
				<?php
					do_action( 'close_loop_post_content' );
				?>
			</div><!-- post-content -->
			<?php
				do_action( 'close_loop_post' );
			?>
		</article><!-- post -->
	<?php
		do_action( 'close_loop' );
		endwhile;
   		infinity_base_paginate();
		$wp_query = null; $wp_query = $temp;
?>