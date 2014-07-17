<?php
/**
 * The main loop for displaying posts
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */
?>

	<?php if ( have_posts() ) : ?>
                        
        <?php reactor_loop_before(); ?>
                        
        <?php while ( have_posts() ) : the_post(); ?>
    
            <?php reactor_post_before(); ?>
                            
            <?php // get post format and display template for that format
            if ( !get_post_format() ) : get_template_part('post-formats/format', 'standard');
            else : get_template_part('post-formats/format', get_post_format()); endif; ?>
                            
            <?php reactor_post_after(); ?>
                            
        <?php endwhile; // end of the loop ?>
                        
        <?php reactor_loop_after(); ?>
                        
        <?php // if no posts are found
        else : reactor_loop_else(); ?>
    
    <?php endif; // end have_posts() check ?> 