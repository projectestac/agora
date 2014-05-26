<?php 
/**
 * Infinity Theme: Post Thumbnail
 *
 * The Post Thumbnail Template part
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
<?php
   $thumbheight = infinity_option_get( 'cbox-thumb-height' );
   $thumbwidth = infinity_option_get( 'cbox-thumb-width' );
?>	
<!-- show the post thumb? -->
<?php if ( has_post_thumbnail() && current_theme_supports( 'infinity-post-thumbnails' )):?>
<figure class="postthumb">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', infinity_text_domain ) ?> <?php the_title_attribute(); ?>"><?php the_post_thumbnail( array( 'width' => $thumbwidth, 'height' => $thumbheight, 'crop' => true ) ) ?></a>
</figure>
<?php endif;?>
