<?php
/**
 * The loop for displaying posts on the front page template
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */
?>

<?php

global $card_colors;
global $posts_per_fila1;
global $posts_per_fila2;
global $posts_per_filan;
global $number_posts;
global $frontpage_query;   
global $layout;  

$layout=array();
$aLayout=array();

for ($i=0;$i<=$number_posts;$i++){
        array_push($aLayout,$posts_per_filan);
}

$aLayout=array_reverse($aLayout);

if ( $number_posts and $frontpage_query->have_posts() ) : 
	reactor_loop_before();  
	
	$num_fila=3; // Fila inicial 
	$loop_posts=0; 
	$nova_fila=true;               
	
	while ( $frontpage_query->have_posts() ) : 	
		if ($nova_fila){
			echo "<div class='row fila".$num_fila."'>";
			$nova_fila=false;
		}
		$frontpage_query->the_post();  
		$layout=array_pop($aLayout); 
		reactor_post_before();
		get_template_part('post-formats/format', "tac"); 
		reactor_post_after(); 
		$loop_posts++;
		
		$nova_fila=($loop_posts>=$posts_per_filan)?true:false;
		
		if ($nova_fila) {
			echo "</div>";
			$loop_posts=0;
			$num_fila++;
		}	
	endwhile; 
	
	reactor_loop_after(); 
	
	echo "<div style='clear:both'></div>"; 
else : 
	reactor_loop_else(); 
endif; 
?>