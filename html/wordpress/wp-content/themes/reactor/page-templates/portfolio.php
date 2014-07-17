<?php
/**
 * Template Name: Portfolio
 *
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>

<?php // get the options
$filter_type = reactor_option('portfolio_filter_type', 'jquery');
$quicksand = ( 'jquery' != $filter_type ) ? false : true; ?>

<?php get_header(); ?>

	<div id="primary" class="site-content">
    
    	<?php reactor_content_before(); ?>
    
        <div id="content" role="main">
        	<div class="row">
                <div class="<?php reactor_columns(); ?>">
                
                <?php reactor_inner_content_before(); ?>
                
					<?php // get the page loop
                    get_template_part('loops/loop', 'page'); ?>
                    
                    <?php // category submenu function
					if ( current_theme_supports('reactor-taxonomy-subnav') ) {
						reactor_category_submenu( array('taxonomy' => 'portfolio-category', 'quicksand' => $quicksand) ); 
					} ?>
                
					<?php // get the portfolio loop
					get_template_part('loops/loop', 'portfolio'); ?>
                
                <?php reactor_inner_content_after(); ?>
                
                </div><!-- .columns -->
                
                <?php get_sidebar(); ?>
                
            </div><!-- .row -->
        </div><!-- #content -->
        
        <?php reactor_content_after(); ?>
        
	</div><!-- #primary -->

<?php get_footer(); ?>