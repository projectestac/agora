<?php
/**
 * Template Name: Front Page
 *
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>

<?php // get the options
$slider_category = reactor_option('frontpage_slider_category', ''); ?>

<?php get_header(); ?>

	<div id="primary" class="site-content">
    
    	<?php reactor_content_before(); ?>
  
        <div id="content" role="main">

        	<div class="row">
        	<!-- jmeler Barra/s dreta si aplica -->
        	<?php 
        		$frontpage_layout = reactor_option('frontpage_layout');
        		
        		$columnes=9;
        		
        		switch ($frontpage_layout){
	        		case "1c":
	        			$columnes=12;
	        			break;
	        		case "2c-l":
	        			get_sidebar('frontpage'); 
	        			break;
	        		case "2c-r":
	        			break;
	        		case "3c-l":
	        			get_sidebar('frontpage');
	        			get_sidebar('frontpage-2');
						$columnes=6;
						break;
	        		case "3c-c":
	        			get_sidebar('frontpage'); 
	        			$columnes=6;
	        			break;
	        		case "3c-r":
	        			$columnes=6;
	        			break;
	        		default:
	        			$columnes=9;
	        		}
        		
        	?>
        	
			<!-- jmeler Contingut central -->

            	<div id="contingut_central_frontpage" class="<?php reactor_columns($columnes); ?>" > 
            
	            <?php reactor_inner_content_before(); ?>
				
				<?php // get the page
					if (  strlen(  trim(get_the_content()) ) > 0)  {
	                		get_template_part('loops/loop', 'page'); 
					} ?>
			<div class="row fila1">
				<?php	// get the row 1, fixed height cards
				 	get_template_part('loops/loop', 'frontpage-fila-1'); ?>
			</div>
						
			<div class="row fila2">	
				<?php	// get the row 2, fixed height cards
					get_template_part('loops/loop', 'frontpage-fila-2'); ?>
			</div>
			
			<!-- jmeler flexible grid (by masonry) -->
			<div id="graella" class="js-masonry">

				<!--<div class=tarjeta style="width:1px;"></div>-->

				<?php // get the main loop
				get_template_part('loops/loop', 'frontpage-fila-n'); ?>

			</div> <!-- #graella -->
	
	            <?php reactor_inner_content_after(); ?>

            </div><!-- .columns -->
            
		<!-- jmeler Barra/s esquerra si aplica -->

		<?php
			switch ($frontpage_layout){
				case "2c-r":
        			get_sidebar('frontpage'); 
        			break;
            			case "3c-c":
        			get_sidebar('frontpage-2'); 
        			break;
        			case "3c-r":
        			get_sidebar('frontpage');
        			get_sidebar('frontpage-2');
        			break;
        		}
        		
        	?>

		</div><!-- .row -->
        </div><!-- #content -->
        
        <?php reactor_content_after(); ?>
        
	</div><!-- #primary -->

<?php get_footer(); ?>

});
