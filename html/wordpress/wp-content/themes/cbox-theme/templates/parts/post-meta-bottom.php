<?php
/**
 * Infinity Theme: Post Meta Bottom Template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 *
 * This template display the post tags attached to a post. You can hook into this section 
 * to add your own stuff as well!
 */
?>

<footer class="post-meta-data post-bottom">
	<?php
		do_action( 'open_loop_post_meta_data_bottom' );
	?>
	<?php if ( has_tag() ) {?>
		<span class="post-tags">
			<?php
				the_tags( __( 'Tags: ', infinity_text_domain ), ' ', '');
			?>
		</span>
	<?php } ?>	
<?php
	do_action( 'close_loop_post_meta_data_bottom' );
?>
</footer>
