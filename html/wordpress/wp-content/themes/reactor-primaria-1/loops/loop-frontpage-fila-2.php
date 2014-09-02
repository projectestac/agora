<?php
/**
 * The loop for displaying posts on the front page template
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */

global $posts_per_fila2;
global $frontpage_query;
global $layout;
global $card_colors;
global $card_bgcolor;

$card_colors=array("card_bgcolor3","card_bgcolor1","card_bgcolor2");
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
    	    
if ( $frontpage_query->have_posts() and count($aLayout>0)) : 
  	reactor_loop_before();                  
  	
  	while ( $frontpage_query->have_posts()  ) : 
   		$layout=array_pop($aLayout); 
		$card_bgcolor=current($card_colors);
		if (!$layout): 
			break;
		else:
   			$frontpage_query->the_post();
   			reactor_post_before(); 
			get_template_part('post-formats/format', "tac"); 
			reactor_post_after(); 	
		endif;
		if (!next($card_colors)){
			reset($card_colors);
			$card_colors=array_reverse($card_colors);
    	}

	endwhile;
	
	reactor_loop_after(); 
	echo "<div style='clear:both'></div>"; 
else : 
	reactor_loop_else();

endif

?>



