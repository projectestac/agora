<?php
/**
 * The template for displaying posts by category
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="site-content">
    
    	<?php reactor_content_before(); ?>
    
        <div id="content" role="main">
        	<div class="row">
		
		<?php get_sidebar("category"); ?>                    

        <div class="<?php reactor_columns(); ?>">
        
                <?php reactor_inner_content_before(); ?>
		
				
				<?php // show an optional category description 
				if ( category_description() ) : ?>
					 <header class="archive-header">
		                 <div class="archive-meta">
		                 <?php echo category_description(); ?>
		                 </div>
		             </header><!-- .archive-header -->
		
		         <?php endif; ?>
		         		         
		   		<?php if ( have_posts() ) : ?>
		
		         <?php endif; // end have_posts() check ?> 
		         
		         <?php // get the loop
		         get_template_part('loops/loop', 'category'); ?>
		
		         <?php reactor_inner_content_after(); ?>
                
                </div><!-- .columns -->
                                
            </div><!-- .row -->
            
        </div><!-- #content -->
        
        <?php reactor_content_after(); ?>
        
	</div><!-- #primary -->

<?php get_footer(); ?>
