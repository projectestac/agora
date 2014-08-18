<?php
/**
 * The template for displaying post content
 *
 * @package Reactor
 * @subpackage Post-Formats
 * @since 1.0.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("large-3 tarjeta"); ?>>
        <div class="entry-body">
            
    
	<?php if (in_array(get_post_format(),array("video","image","audio","quote") ) ) { ?>

            <div class="entry-summary">
                <?php the_content(); ?>
            </div><!-- .entry-summary -->
	
	<?php } else { ?>
            <header class="entry-header">
            	<?php reactor_post_header(); ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        <?php } ?>
            <footer class="entry-footer">
            	<?php reactor_post_footer(); ?>
            </footer><!-- .entry-footer -->
        </div><!-- .entry-body -->
	</article><!-- #post -->

