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


global $card_colors;
global $card_colors;
global $number_posts;
global $posts_per_fila1;
global $posts_per_fila2;
global $posts_per_filan;
global $frontpage_query;

$card_colors=array("card_bgcolor1","card_bgcolor2","card_bgcolor3");

$posts_per_fila1 = reactor_option('frontpage_posts_per_fila_1', 2);
$posts_per_fila2 = reactor_option('frontpage_posts_per_fila_2', 2);
$posts_per_filan = reactor_option('frontpage_posts_per_fila_n', 2);


//Fila 1 
if ($posts_per_fila1){
	getRowFrontPage($posts_per_fila1,1);
	if ($posts_per_fila1==33 || $posts_per_fila1==66){
		$posts_per_fila1=2; 
	}
}

//Fila 2
if ($posts_per_fila2 && ($frontpage_query->post_count>$posts_per_fila1)){
	getRowFrontPage($posts_per_fila2,2);
	if ($posts_per_fila2==33 || $posts_per_fila2==66)
		$posts_per_fila2=2; 
}

// Fila n
if ($posts_per_filan && ($frontpage_query->post_count>$posts_per_fila1+$posts_per_fila2)){
	$number_posts_filan=$number_posts-$posts_per_fila1-$posts_per_fila2;
	getRow_N_FrontPage ($posts_per_filan,$number_posts_filan);
}



?>


