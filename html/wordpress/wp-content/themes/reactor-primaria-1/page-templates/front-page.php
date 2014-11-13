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
global $categoria;
global $posts_per_fila1;
global $posts_per_fila2;
global $posts_per_filan;

$categoria=reactor_option('frontpage_post_category', '1');
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
		<div id="contingut_central_frontpage" class="articles <?php reactor_columns($columnes); ?>" > 
		
         	<?php reactor_inner_content_before(); ?>
				
		<?php 
                 
		    // Consulta per obtenir el contingut de la pagina principal
                    $args = array( 
                        'post_type'           => 'page',
                        'page_id'             => reactor_option('frontpage_page'));

                    $wp_frontpage = new WP_Query( $args ); 	
		    $wp_frontpage ->the_post(); 			
                    
                    if (strlen(trim(get_the_content()))){
		    	get_template_part('post-formats/format', 'page');
		    }
                     wp_reset_postdata();
                                         
                    $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                    
                    //Es necessari utilitzar $wp_query per tenir paginació
                    $temp=$wp_query;
                    $wp_query=null;
                                       
                    // Articles
                    // No es pot establir la categoria directament perquè perdem els stickys
                    $args = array( 
                        'post_type'           => 'post',
                        'posts_per_page'      => $number_posts,
                        'paged'               => $paged );
	      	
                   
                    $wp_query = new WP_Query( $args ); 
                    
                    //action: filter_by_categoria
                    $posts_per_filan = reactor_option('frontpage_posts_per_fila_n', 2);
                    if ($paged==1){
                        $posts_per_fila1 = reactor_option('frontpage_posts_per_fila_1', 2);
                        $posts_per_fila2 = reactor_option('frontpage_posts_per_fila_2', 2);
                    } else{
                        $posts_per_fila1=$posts_per_fila2=$posts_per_filan;
                    }
                    
                    reactor_loop_before();
                    get_template_part('loops/loop', 'taxonomy'); 
                    reactor_loop_after();
                    wp_reset_postdata();
                    $wp_query=$temp;
                    
               ?>
                	
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
