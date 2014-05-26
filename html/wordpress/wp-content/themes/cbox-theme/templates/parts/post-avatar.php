<?php
/**
 * Infinity Theme: Author Avatar Template
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
?>
<?php if ( current_theme_supports( 'infinity-post-avatars' )):?>
<div class="author-avatar">
	<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="all posts by this author">
		<?php echo get_avatar( get_the_author_meta('ID'), 35 ); ?>
	</a>	
</div>
<?php endif;?>
