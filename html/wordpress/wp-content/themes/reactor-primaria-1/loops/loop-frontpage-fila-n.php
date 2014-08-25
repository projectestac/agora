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
$layout=array();
/*jmeler*/
$posts_per_fila_n = reactor_option('frontpage_posts_per_fila_n', 2);
$posts_per_fila1=reactor_option('frontpage_posts_per_fila_1', 2);
$posts_per_fila2=reactor_option('frontpage_posts_per_fila_2', 2);

$aLayout=array();

$number_posts = reactor_option('frontpage_number_posts', 8);

for ($i=0;$i<=$number_posts;$i++){
        array_push($aLayout,$posts_per_fila_n);
}

$aLayout=array_reverse($aLayout);

if ($posts_per_fila1==33 || $posts_per_fila1==66)
	$posts_per_fila1=2; 

if ($posts_per_fila2==33 || $posts_per_fila2==66)
	$posts_fila2=2; 

$post_start= $posts_per_fila1 + $posts_per_fila2;

$number_posts = reactor_option('frontpage_number_posts', 5);
$post_columns = reactor_option('frontpage_post_columns', 3);
$page_links = reactor_option('frontpage_page_links', 0); 

global $frontpage_query;
global $tipus_targeta;
$tipus_targeta="tarjeta";   
global $layout;  

if ( reactor_option('frontpage_number_posts') and $frontpage_query->have_posts() ) : 
	reactor_loop_before();                  
	while ( $frontpage_query->have_posts() ) : 
		$frontpage_query->the_post();  
		$layout=array_pop($aLayout); 
		reactor_post_before();
		get_template_part('post-formats/format', "tac"); 
		reactor_post_after(); 
	endwhile; 
	reactor_loop_after(); 
	echo "<div style='clear:both'></div>"; 
else : 
	reactor_loop_else(); 
endif; 

?>


