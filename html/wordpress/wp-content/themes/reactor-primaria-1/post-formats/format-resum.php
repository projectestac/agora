<?php
/**
 * The template for displaying post content
 *
 * @package Reactor
 * @subpackage Post-Formats
 * @since 1.0.0
 */
?>
<div class="item">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-body">
            
            <header class="entry-header">
            	<?php reactor_post_header(); ?>
            </header><!-- .entry-header -->
    
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
    
            <footer class="entry-footer">
            	<?php reactor_post_footer(); ?>
            </footer><!-- .entry-footer -->
        </div><!-- .entry-body -->
	</article><!-- #post -->

</div>
