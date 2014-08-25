<?php
/**
 * The loop for displaying posts on the front page template, fila 1 amb targetes fixes d'alçada
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */
?>

<?php

// Nombre de posts per la primera fila
$posts_per_fila1 = reactor_option('frontpage_posts_per_fila_1', 2);

// Array que conté el nombre i tipus de posts (segon amplada)
$aLayout=array();

switch ($posts_per_fila1) {
        case 1: array_push($aLayout,1);
         break;
        case 2: array_push($aLayout,2,2);
         break;
        case 3: array_push($aLayout,3,3,3);
         break;
        case 4: array_push($aLayout,4,4,4,4);
         break;
        case 33: array_push($aLayout,3,66);
         break;
        case 66: array_push($aLayout,66,3);
         break;
        default:
}
$aLayout=array_reverse($aLayout);

if ($posts_per_fila1==33 || $posts_per_fila1==66)
	$posts_per_fila1=2; 

$number_posts = reactor_option('frontpage_number_posts', 10);
//$post_columns = reactor_option('frontpage_post_columns', 3);
$page_links = reactor_option('frontpage_page_links', 0); 

global  $tipus_targeta;
$tipus_targeta="tarjeta-fixe";
global $layout;
$layout=array();
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

//Preparem la consulta
$args = array( 
	'post_type'           => 'post',
	'posts_per_page'      => $number_posts,
	'paged'               => $paged );
			
global $frontpage_query;  	
$frontpage_query = new WP_Query( $args ); 		
			
if ( $frontpage_query->have_posts() and count($aLayout>0)) : 
	reactor_loop_before(); 
	
	while ( $frontpage_query->have_posts() ) : 
	
	 	$layout=array_pop($aLayout); 
    	if (!$layout): 
    		break;
    	else: 		
	    	$frontpage_query->the_post(); 
	     	reactor_post_before();
			get_template_part('post-formats/format', "tac");
			reactor_post_after();
    	endif;
    	
	endwhile; 
	
	reactor_loop_after();
	echo "<div style='clear:both'></div>"; 
else : 
	reactor_loop_else(); 
endif; 

?>


