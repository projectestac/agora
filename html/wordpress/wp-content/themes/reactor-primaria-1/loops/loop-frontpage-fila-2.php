<?php
/**
 * The loop for displaying posts on the front page template
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */


/*jmeler*/

$posts_per_fila2 = reactor_option('frontpage_posts_per_fila_2', 2);

$aLayout=array();

switch ($posts_per_fila2) {
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

if ($posts_fila2==33 || $posts_fila2==66)
	$posts_fila2=2; 


// Determinem post inicial a partir del nombre de post de la primera fila
$posts_fila1 = reactor_option('frontpage_posts_per_fila_1', 2);
// 33 i 66 corresponen a configuracions d'amplada sempre amb 2 posts per fila
if ($posts_fila1==33 || $posts_fila1==66)
	$posts_fila1=2; 
$post_start=$posts_fila1;

$post_columns = reactor_option('frontpage_post_columns', 3);
$page_links = reactor_option('frontpage_page_links', 0); 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
//Conservem la consulta inicial
global $frontpage_query;
global $layout;
global $tipus_targeta;
$tipus_targeta="tarjeta-fixe";
      	    
if ( $frontpage_query->have_posts() and count($aLayout>0)) : 
  	reactor_loop_before();                  
  	
  	while ( $frontpage_query->have_posts()  ) : 
   		 
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

endif

?>



