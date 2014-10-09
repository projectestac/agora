<?php
/**
 * Template Name: Portada
 *
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>

<?php // get the options

function barra_esquerra($frontpage_layout){

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
	return $columnes;
}

function barra_dreta($frontpage_layout){
	$frontpage_layout = reactor_option('frontpage_layout');
	(in_array($frontpage_layout,array("2c-r","3c-c"))) ? get_sidebar('frontpage-2'):''; 
}


global $number_posts;

$number_posts = reactor_option('frontpage_number_posts', 10);
$frontpage_layout = reactor_option('frontpage_layout');

get_header(); 

?>

	<div id="primary" class="site-content">
    
    	<?php reactor_content_before(); ?>
  
        <div id="content" role="main">

        	<div class="row">
		
        	<!-- Barra esquerra si aplica -->
		
        	<?php 
			if (wp_is_mobile()){
				echo "<div>";
				if (in_array($frontpage_layout,array("2c-l","3c-c"))){
					echo "<span style='float:left;margin:1em'><a href='#barra_esquerra'><span class='dashicons dashicons-arrow-down-alt2'></span> Ginys</a></span>";
				}
				if (in_array($frontpage_layout,array("2c-r","3c-c"))){
					echo "<span style='float:right;margin:1em'><a href='#barra_dreta'>Ginys<span class='dashicons dashicons-arrow-down-alt2'></a></span>";
				}
				echo "</div>";
			} else {
				$columnes=barra_esquerra($frontpage_layout);
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
		    
		<!-- Barra dreta si aplica -->
		<?php
		if (wp_is_mobile()){
			echo "<a id='barra_esquerra'></a>";		
			barra_esquerra($frontpage_layout);
		}
		echo "<a id='barra_dreta'></a>";
		barra_dreta($frontpage_layout);

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
