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
    
        <div id="sidebar-frontpage-2" class="sidebar <?php reactor_columns( '', true, true, 1 ); ?>" role="complementary">
            
		<?php //jmeler 		
		//add_logo_centre();
		/*add_menu_cerca();
		add_logo_corp(); */?>		 
		
		<?php dynamic_sidebar('sidebar-frontpage-2'); ?>
        </div><!-- #sidebar-frontpage -->
        
    <?php reactor_sidebar_after(); ?>
    
    
