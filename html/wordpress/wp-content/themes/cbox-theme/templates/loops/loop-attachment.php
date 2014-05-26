<?php
/**
 * Infinity Theme: loop attachment
 *
 * The loop that displays attachments
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
			<article class="post" id="post-<?php the_ID(); ?>">
				<div class="post-content">
					<header>
					<h1 class="post-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', infinity_text_domain ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h1>
					</header>
					<?php
					do_action( 'open_loop_single' );
					?>
					<?php
						infinity_get_template_part( 'templates/parts/post-meta-top');	
					?>
					<?php
						do_action( 'before_single_entry' )
					?>
					<div class="entry">
						<a href="#">
							<figure class="attachment-image">
								<?php echo wp_get_attachment_image( $post->ID, 'large', false, array( 'class' => 'size-large aligncenter' ) ); ?>
							</figure>
							</a>

						<div class="entry-caption">
							<?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?>
						</div>
								
						<?php the_content(); ?>		

						<footer class="post-meta-data post-bottom">
							<?php
								do_action( 'open_loop_post_meta_data_bottom' );
							?>
							<span class="post-tags">
									<?php
									if ( wp_attachment_is_image() ) :
										$metadata = wp_get_attachment_metadata();
										printf( __( 'Full size is %s pixels', infinity_text_domain ),
											sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
												wp_get_attachment_url(),
												esc_attr( __( 'Link to full size image', infinity_text_domain ) ),
												$metadata['width'],
												$metadata['height']
											)
										);
									endif;
								?>
							</span>
							<span class="post-comments">
							<?php 
								comments_popup_link(__('No Comments', infinity_text_domain), __('1 Comment', infinity_text_domain), __('% Comments', infinity_text_domain)); 
							?>				
							</span>
							<?php
							do_action( 'close_loop_post_meta_data_bottom' );
							?>
						</footer>
						<?php
						do_action( 'close_loop_single' );
						?>
						<?php
							wp_link_pages( array(
								'before' => __( '<p><strong>Pages:</strong> ', infinity_text_domain ),
								'after' => '</p>', 'next_or_number' => 'number')
							);
							infinity_get_template_part( 'templates/parts/author-box');	
						?>
					</div>
				</div>
				<?php
					do_action( 'close_loop_single' );
				?>
			</article>
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