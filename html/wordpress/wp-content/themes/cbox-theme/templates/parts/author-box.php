<?php
/**
 * Infinity Theme: author box template part
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */
?>
<?php if ( get_the_author_meta('description') && current_theme_supports( 'infinity-author-box' ) ): ?>
	<div class="author-box">
		<?php
			do_action( 'open_author_box' );
		?>
		<div id="author-description">
			<h3>
				Something about <?php the_author_link(); ?> 
			</h3>
			<?php
				print get_avatar( get_the_author_meta( 'user_email' ), '50' );
				the_author_meta('description');
			?>
			<div id="author-link">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', infinity_text_domain ), get_the_author() ); ?>
					</a>
			</div>
		</div>
		<?php
			do_action( 'close_author_box' );
		?>
	</div>
<?php endif?>	