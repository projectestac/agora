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

global $number_posts;
$number_posts = reactor_option('frontpage_number_posts', 10);

get_header(); 

?>

	<div id="primary" class="site-content">
    
    	<?php reactor_content_before(); ?>
  
        <div id="content" role="main">

        	<div class="row">
        	<!-- Barra dreta si aplica -->
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
					$columnes=10;
	        			break;
					case "3c-c":
	        			get_sidebar('frontpage'); 
	        			$columnes=7;
	        			break;
	    	        	default:
	        			$columnes=9;
	        		}
        		
        	?>
        	
			<!-- Contingut central -->
			<div id="contingut_central_frontpage" class="<?php reactor_columns($columnes); ?>" > 
			
	         	<?php reactor_inner_content_before(); ?>
					
				<?php 

				   // La pagina principal
				   $args = array( 
                                        'post_type'           => 'page',
                                        'page_id'             => reactor_option('frontpage_page'));

                                    global $frontpage_query;   			      	
                                    $frontpage_query = new WP_Query( $args ); 	
 				    $frontpage_query->the_post(); 			

                                    if (strlen(trim(get_the_content()))){
				    	get_template_part('post-formats/format', 'page');
				    }
				   
                                    // Preparem la consulta principal per obtenir els articles	

                                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                                    $args = array( 
                                        'post_type'           => 'post',
                                        //'cat'                 => reactor_option('frontpage_post_category', '1'), 
                                        //IMPORTANT: Aixo no permet stickys. Llastima. action associat al functions (categoria_portada())  
                                        'posts_per_page'      => $number_posts,
                                        'paged'               => $paged );
 			      	
                                    $frontpage_query = new WP_Query( $args ); 
                                    
						
				?>
			
				
				<?php get_template_part('loops/loop', 'frontpage'); ?>
				
		        <?php reactor_inner_content_after(); ?>
	        
	    	</div><!-- .columns --><!--Contingut central -->
		    
			  
		<!-- Barra esquerra si aplica -->
		<?php
			
			(in_array($frontpage_layout,array("2c-r","3c-c"))) ? get_sidebar('frontpage-2'):''; 
        		
        ?>

		</div><!-- .row -->
        </div><!-- #content -->
        
        <?php reactor_content_after(); ?>
        
	</div><!-- #primary -->
<script>
	//Mostra menu o no
	checkMenuCookie();
</script>
<?php get_footer(); ?>
