<?php
/**
 * The sidebar template containing the front page widget area
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>

    <?php reactor_sidebar_before(); ?>
    
        <div id="sidebar-frontpage-2" class="sidebar <?php reactor_columns( 2 ); ?>" role="complementary">
    		<?php dynamic_sidebar('sidebar-frontpage-2'); ?>
        </div><!-- #sidebar-frontpage -->
        
    <?php reactor_sidebar_after(); ?>
    
    
